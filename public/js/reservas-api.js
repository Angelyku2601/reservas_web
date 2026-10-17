const ReservasAPI = {
    modoSimulacion: false,

    urlBase: 'http://localhost:8000/api',

    espacios: {
    'laboratorio-a': '01a13be8-2b20-73a5-80e4-e792d6727adc',
    'laboratorio-b': '01a13be8-49fa-71eb-a460-d41e704fb08c',
    'laboratorio-c': '01a13be8-5e93-73b7-8d93-d75ceba229f6',
    'auditorio-p2': '01a13be8-c7ed-72dd-8977-805ffe3df241',
    'auditorio-pb': '01a13be8-8ce2-7207-8fb3-0baea3215c49'
},

    reservasSimuladas: [
        {
            aula: 'laboratorio-a',
            fecha: '2026-10-20',
            inicio: '09:00',
            fin: '11:00'
        }
    ],


async obtenerReservas(aula, fecha) {
    const spaceId = this.espacios[aula];

    if (!spaceId) {
        throw new Error('El laboratorio seleccionado no existe.');
    }

    const parametros = new URLSearchParams({
        space_id: spaceId,
        date: fecha
    });

    const respuesta = await fetch(
        `${this.urlBase}/reservations?${parametros.toString()}`,
        {
            method: 'GET',
            credentials: 'include',
            headers: {
                'Accept': 'application/json'
            }
        }
    );

    if (!respuesta.ok) {
        throw new Error(
            `No se pudieron consultar las reservas. Código: ${respuesta.status}`
        );
    }

    const resultado = await respuesta.json();

    return resultado.reservations.map(reserva => ({
        aula: aula,
        fecha: fecha,
        inicio: reserva.start_date.substring(11, 16),
        fin: reserva.finish_date.substring(11, 16)
    }));
},


    async crearReserva(solicitud) {
        const spaceId = this.espacios[solicitud.aula];

        if (!spaceId) {
            throw new Error('El laboratorio seleccionado no existe.');
        }

        const [inicio, fin] = solicitud.horario.split(' - ');

        const datos = {
            space_id: spaceId,
            reason: solicitud.descripcion,
            start_date: `${solicitud.fecha} ${inicio}:00`,
            finish_date: `${solicitud.fecha} ${fin}:00`
        };

        if (this.modoSimulacion) {
            console.log('Reserva preparada para la API:', datos);

            return {
                simulacion: true,
                mensaje: 'Solicitud preparada correctamente. Todavía no se ha guardado en la base de datos.'
            };
        }


            const csrf = await fetch('http://localhost:8000/sanctum/csrf-cookie', {
                credentials: 'include',
                headers: {
                    'Accept': 'application/json'
                }
            });

            if (!csrf.ok) {
                throw new Error('No fue posible obtener la protección CSRF.');
            }


            const token = document.cookie
                .split('; ')
                .find(cookie => cookie.startsWith('XSRF-TOKEN='));

            if (!token) {
                throw new Error('No se encontró la cookie XSRF-TOKEN.');
            }

            // Enviar la reserva a la API
            const respuesta = await fetch(`${this.urlBase}/reservations`, {
                method: 'POST',
                credentials: 'include',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-XSRF-TOKEN': decodeURIComponent(token.split('=').slice(1).join(''))
                },
                body: JSON.stringify(datos)
            });

            const resultado = await respuesta.json();

            if (!respuesta.ok) {

            if (respuesta.status === 401) {
                throw new Error('Tu sesión no está activa. Inicia sesión nuevamente.');
            }

            if (respuesta.status === 419) {
                throw new Error('La sesión expiró o el token CSRF no es válido.');
            }

            const mensaje = resultado.errors
                ? Object.values(resultado.errors).flat().join(' ')
                : resultado.message || 'No fue posible registrar la reserva.';

            throw new Error(mensaje);
        }

            return {
                simulacion: false,
                mensaje: resultado.response || 'Reserva registrada correctamente.',
                datos: resultado
            };
    }
};