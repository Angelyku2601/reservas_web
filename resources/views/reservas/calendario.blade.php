
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario de Reservas - FIC</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            background: linear-gradient(135deg, #eaf2fa, #d3e4f5);
            color: #123e64;
            min-height: 100vh;
        }

        header {
            background: white;
            padding: 25px 35px;
            border-bottom: 5px solid #07518b;
        }

        main {
            max-width: 1050px;
            margin: 45px auto;
            padding: 0 20px;
        }

        .tarjeta {
            background: white;
            padding: 30px;
            border-radius: 14px;
            margin-bottom: 25px;
            box-shadow: 0 5px 18px rgba(0, 40, 80, 0.08);
        }

        .calendario-cabecera {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .calendario-cabecera button {
            background: #07518b;
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: 7px;
            cursor: pointer;
        }

        .dias {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 8px;
        }

        .dia-semana {
            text-align: center;
            font-weight: bold;
            padding: 12px 0;
        }

        .dia {
            border: none;
            padding: 15px 5px;
            border-radius: 8px;
            background: #e8f2fc;
            color: #123e64;
            cursor: pointer;
        }

        .dia:hover:not(:disabled) {
            background: #bfdcf3;
        }

        .dia.seleccionado {
            background: #07518b;
            color: white;
        }

        .dia:disabled {
            opacity: 0.35;
            cursor: not-allowed;
        }

        .horarios {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-top: 20px;
        }

        .horario {
            background: #e8f2fc;
            color: #123e64;
            border: 1px solid #c9dfef;
            padding: 14px;
            border-radius: 8px;
            cursor: pointer;
        }

        .horario.seleccionado {
            background: #07518b;
            color: white;
        }

        .horario.ocupado {
            background: #fce8e8;
            color: #a52a2a;
            border: 1px solid #e5a3a3;
            cursor: not-allowed;
            opacity: 0.8;
        }

        .confirmar {
            background: #07518b;
            color: white;
            border: none;
            padding: 14px 25px;
            border-radius: 8px;
            margin-top: 25px;
            cursor: pointer;
        }

        .confirmar:disabled {
            opacity: 0.45;
            cursor: not-allowed;
        }

        #guardarReserva {
            background-color: #07518b;
            color: white;
            border: none;
            padding: 14px 25px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.2s ease, transform 0.2s ease;
        }

        #guardarReserva:hover {
            background-color: #063b68;
            transform: translateY(-2px);
        }

        #guardarReserva:active {
            transform: translateY(0);
        }

        #guardarReserva:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .volver {
            display: inline-block;
            margin-bottom: 20px;
            color: #07518b;
            text-decoration: none;
            font-weight: bold;
        }

        @media (max-width: 650px) {
            .tarjeta {
                padding: 18px;
            }

            .horarios {
                grid-template-columns: repeat(2, 1fr);
            }

            .dia {
                padding: 12px 2px;
            }
        }
                    .formulario-reserva {
                display: none;
            }

            .formulario-reserva.visible {
                display: block;
            }

            .campo {
                margin-bottom: 20px;
            }

            .campo label {
                display: block;
                font-weight: bold;
                margin-bottom: 8px;
            }

            .campo input,
            .campo select,
            .campo textarea {
                width: 100%;
                padding: 12px;
                border: 1px solid #c9dfef;
                border-radius: 8px;
                font-size: 15px;
                background: #f7fbff;
            }

            .campo textarea {
                min-height: 90px;
                resize: vertical;
            }

            .resumen-reserva {
                background: #e8f2fc;
                padding: 18px;
                border-radius: 10px;
                margin-bottom: 25px;
                line-height: 1.8;
            }

            .prioridad {
                padding: 15px;
                border-radius: 8px;
                font-weight: bold;
                margin-bottom: 20px;
                background: #e8f2fc;
            }

            .prioridad.alta {
                background: #fce8e8;
                color: #9b2525;
            }

            .prioridad.media {
                background: #fff3d6;
                color: #895a00;
            }

            .prioridad.baja {
                background: #e1f3e8;
                color: #21633b;
            }

    .mensaje-formulario {
        margin-top: 15px;
        line-height: 1.6;
        color: #526c82;
    }

    </style>
</head>

<body>
    <header>
        <h2>Reserva de Laboratorios - FIC</h2>
    </header>

    <main>
        <a href="/pagina-principal" class="volver">
            ← Volver a la página principal
        </a>

        <section class="tarjeta">
            <h1>{{ $nombreAula }}</h1>
            <p>Selecciona la fecha en la que deseas reservar este espacio.</p>
        </section>

        <section class="tarjeta">
            <div class="calendario-cabecera">
                <button id="anterior" type="button">←</button>
                <h2 id="mesActual"></h2>
                <button id="siguiente" type="button">→</button>
            </div>

            <div class="dias" id="calendario"></div>
        </section>

        <section class="tarjeta">
            <h2>Selecciona un horario</h2>
            <p id="fechaSeleccionada">
                Primero selecciona una fecha en el calendario.
            </p>

            <div class="horarios" id="horarios"></div>

            <button class="confirmar" id="confirmar" type="button" disabled>
                Continuar con la reserva
            </button>
        </section>

<section class="tarjeta formulario-reserva" id="formularioReserva">

    <h2>Solicitud de reserva</h2>
    <p>Completa los datos de la actividad que deseas realizar.</p>

    <div class="resumen-reserva">
        <p><strong>Espacio:</strong> {{ $nombreAula }}</p>
        <p><strong>Fecha:</strong> <span id="resumenFecha"></span></p>
        <p><strong>Horario:</strong> <span id="resumenHorario"></span></p>
    </div>

    <form id="solicitudReserva">

        <div class="campo">
            <label for="actividad">Tipo de actividad</label>

            <select id="actividad" required>
                <option value="">Selecciona una actividad</option>
                <option value="examen">Examen</option>
                <option value="clase">Clase convencional</option>

                @if(in_array($aula, ['auditorio-p2', 'auditorio-pb']))
                    <option value="reunion">Reunión o conferencia</option>
                @endif
            </select>
        </div>

        <div class="campo">
            <label for="descripcion">Descripción de la actividad</label>

            <textarea
                id="descripcion"
                placeholder="Ejemplo: Examen parcial de programación"
                required
                maxlength="500"
            ></textarea>
        </div>

        <div class="prioridad" id="prioridad">
            Prioridad: Sin asignar
        </div>

        <button type="submit" class="confirmar">
            Revisar solicitud
        </button>
        <div id="confirmacionReserva" hidden>
            <p>
                Revisa los datos de tu solicitud antes de confirmar.
            </p>

            <button type="button" id="guardarReserva" class="confirmar">
                    Confirmar reserva
            </button>
        </div>

        <p class="mensaje-formulario" id="mensajeFormulario"></p>

    </form>
</section>

    </main>

    <script src="{{ asset('js/reservas-api.js') }}"></script>

    <script>
        const nombreAula = @json($nombreAula);
        const identificadorAula = @json($aula);
        const hoy = new Date();
        hoy.setHours(0, 0, 0, 0);

        let mesVisible = new Date(hoy.getFullYear(), hoy.getMonth(), 1);
        let fechaElegida = null;
        let horarioElegido = null;

        let solicitudRevisada = null;

        function invalidarSolicitud() {
            solicitudRevisada = null;
            document.getElementById('confirmacionReserva').hidden = true;
        }

        const calendario = document.getElementById('calendario');
        const horarios = document.getElementById('horarios');
        const confirmar = document.getElementById('confirmar');

        const opcionesHorario = [
            '08:00 - 09:00',
            '09:00 - 10:00',
            '10:00 - 11:00',
            '11:00 - 12:00',
            '12:00 - 13:00',
            '15:00 - 16:00',
            '16:00 - 17:00',
            '17:00 - 18:00'
        ];



                    let reservasDelDia = [];

            function horarioEstaOcupado(horario) {
                const [inicioHorario, finHorario] = horario.split(' - ');

                return reservasDelDia.some(reserva =>
                    inicioHorario < reserva.fin &&
                    finHorario > reserva.inicio
                );
            }

            async function cargarReservas() {
            reservasDelDia = [];
            horarioElegido = null;
            actualizarBoton();
            horarios.innerHTML = '';

            if (!fechaElegida) {
                return;
            }

            const fechaConsultada = fechaElegida;

            try {
                const reservas = await ReservasAPI.obtenerReservas(
                    identificadorAula,
                    fechaConsultada
                );

                // Evita mostrar datos de una fecha anterior
                // si el usuario cambia rápidamente de día.
                if (fechaElegida !== fechaConsultada) {
                    return;
                }

                reservasDelDia = reservas;
                dibujarHorarios();

            } catch (error) {
                console.error('Error al consultar reservas:', error);

                if (fechaElegida === fechaConsultada) {
                    horarios.textContent =
                        'No fue posible consultar la disponibilidad.';
                }
            }
        }




 function fechaLocal(anio, mes, dia) {
            return [
                anio,
                String(mes + 1).padStart(2, '0'),
                String(dia).padStart(2, '0')
            ].join('-');
        }

        function actualizarBoton() {
            confirmar.disabled = !(fechaElegida && horarioElegido);
        }

        function dibujarCalendario() {
    calendario.innerHTML = '';

    const anio = mesVisible.getFullYear();
    const mes = mesVisible.getMonth();

    document.getElementById('mesActual').textContent =
        mesVisible.toLocaleDateString('es-MX', {
            month: 'long',
            year: 'numeric'
        });

    const primerDia = new Date(anio, mes, 1);
    const cantidadDias = new Date(anio, mes + 1, 0).getDate();

    const inicio = (primerDia.getDay() + 6) % 7;

    // Obtener la fecha actual sin la hora
    const fechaActual = new Date();
    fechaActual.setHours(0, 0, 0, 0);

    // Encabezados de los días
    ['L', 'M', 'M', 'J', 'V', 'S', 'D'].forEach(dia => {
        const elemento = document.createElement('div');
        elemento.className = 'dia-semana';
        elemento.textContent = dia;
        calendario.appendChild(elemento);
    });

    // Espacios vacíos antes del primer día
    for (let i = 0; i < inicio; i++) {
        calendario.appendChild(document.createElement('div'));
    }

    // Generar todos los días del mes
    for (let dia = 1; dia <= cantidadDias; dia++) {

        const fecha = new Date(anio, mes, dia);
        const boton = document.createElement('button');

        boton.type = 'button';
        boton.className = 'dia';
        boton.textContent = dia;

        // Bloquear fechas anteriores a hoy
        boton.disabled = fecha < fechaActual;

        const fechaTexto = fechaLocal(anio, mes, dia);

        if (fechaTexto === fechaElegida) {
            boton.classList.add('seleccionado');
        }

        boton.addEventListener('click', () => {
            fechaElegida = fechaTexto;
            horarioElegido = null;

            document.getElementById('fechaSeleccionada')
                .textContent = 'Fecha seleccionada: ' + fechaElegida;

            dibujarCalendario();
            cargarReservas();
            invalidarSolicitud();
        });

        calendario.appendChild(boton);
    }

    // Deshabilitar navegación a meses anteriores
    const mesActual = new Date(
        fechaActual.getFullYear(),
        fechaActual.getMonth(),
        1
    );

    document.getElementById('anterior').disabled =
        mesVisible <= mesActual;
}

        function dibujarHorarios() {
                horarios.innerHTML = '';

    if (!fechaElegida) {
        return;
    }

    opcionesHorario.forEach(horario => {
        const boton = document.createElement('button');

        boton.type = 'button';
        boton.className = 'horario';

        const ocupado = horarioEstaOcupado(horario);

        if (ocupado) {
            boton.textContent = horario + ' - Ocupado';
            boton.disabled = true;
            boton.classList.add('ocupado');
        } else {
            boton.textContent = horario;

            if (horarioElegido === horario) {
                boton.classList.add('seleccionado');
            }

            boton.addEventListener('click', () => {
                horarioElegido = horario;
                invalidarSolicitud();
                dibujarHorarios();
                actualizarBoton();
            });
        }

        horarios.appendChild(boton);
    });
}

        document.getElementById('anterior').addEventListener('click', () => {
            mesVisible.setMonth(mesVisible.getMonth() - 1);
            dibujarCalendario();
        });

        document.getElementById('siguiente').addEventListener('click', () => {
            mesVisible = new Date(
                mesVisible.getFullYear(),
                mesVisible.getMonth() + 1,
                1
            );

            dibujarCalendario();
        });


            const formularioReserva = document.getElementById('formularioReserva');
            const actividad = document.getElementById('actividad');
            const prioridad = document.getElementById('prioridad');
            const mensajeFormulario = document.getElementById('mensajeFormulario');



            confirmar.addEventListener('click', () => {
                if (!fechaElegida || !horarioElegido) {
                    return;
                }

                document.getElementById('resumenFecha').textContent = fechaElegida;
                document.getElementById('resumenHorario').textContent = horarioElegido;

                formularioReserva.classList.add('visible');
                mensajeFormulario.textContent = '';
                invalidarSolicitud();
                actualizarPrioridad();

                formularioReserva.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            });

            document.getElementById('descripcion')
                .addEventListener('input', invalidarSolicitud);
            actividad.addEventListener('change', invalidarSolicitud);

            const prioridades = {
                examen: {
                    nombre: 'Alta',
                    clase: 'alta'
                },
                reunion: {
                    nombre: 'Media',
                    clase: 'media'
                },
                clase: {
                    nombre: 'Baja',
                    clase: 'baja'
                }
            };

                function obtenerPrioridad() {
                const tipo = actividad.value;

            if (
                tipo === 'reunion' &&
                !['auditorio-p2', 'auditorio-pb'].includes(identificadorAula)
            ) {
                return null;
        }

        return prioridades[tipo] || null;
    }

                function actualizarPrioridad() {
                 const resultado = obtenerPrioridad();

            prioridad.className = 'prioridad';

            if (!resultado) {
                prioridad.textContent = 'Prioridad: Sin asignar';
                return;
            }

            prioridad.textContent = 'Prioridad: ' + resultado.nombre;
            prioridad.classList.add(resultado.clase);
        }

        actividad.addEventListener('change', actualizarPrioridad);

        // Calcula la prioridad al cargar la página.
            actualizarPrioridad();

        document.getElementById('solicitudReserva')
            .addEventListener('submit', async (event) => {

                event.preventDefault();
                invalidarSolicitud();

                const resultado = obtenerPrioridad();

                if (!resultado || !fechaElegida || !horarioElegido) {
                    mensajeFormulario.textContent =
                        'Completa correctamente los datos de la reserva.';
                    return;
                }

                const descripcion =
                    document.getElementById('descripcion').value.trim();

                if (!descripcion) {
                    mensajeFormulario.textContent =
                        'Debes escribir una descripción de la actividad.';
                    return;
                }

                if (descripcion.length > 255) {
                    mensajeFormulario.textContent =
                        'La descripción no puede superar los 255 caracteres.';
                    return;
                }

                // Crear el objeto con los datos del formulario
                const solicitud = {
                    aula: identificadorAula,
                    fecha: fechaElegida,
                    horario: horarioElegido,
                    actividad: actividad.value,
                    descripcion: descripcion,
                    prioridad: resultado.nombre
                };


               try {
                // Guardar una copia de la solicitud revisada
                solicitudRevisada = { ...solicitud };

                mensajeFormulario.textContent =
                    'Solicitud revisada correctamente. Presiona Confirmar reserva para guardarla.';

                document.getElementById('confirmacionReserva').hidden = false;

                console.log('Solicitud revisada:', solicitudRevisada);

            } catch (error) {
                invalidarSolicitud();

                console.error('Error al revisar la solicitud:', error);

                mensajeFormulario.textContent =
                    'No fue posible revisar la solicitud.';
            }
            });

        dibujarCalendario();
        actualizarBoton();

        document.getElementById('guardarReserva')
        .addEventListener('click', async () => {

        if (!solicitudRevisada) {
            mensajeFormulario.textContent =
                'Primero debes revisar tu solicitud.';
            return;
        }

        const botonGuardar = document.getElementById('guardarReserva');

        botonGuardar.disabled = true;
        mensajeFormulario.textContent = 'Procesando reserva...';

        try {
            const respuesta = await ReservasAPI.crearReserva(solicitudRevisada);

            mensajeFormulario.textContent = respuesta.mensaje;

            if (!respuesta.simulacion) {
                invalidarSolicitud();
                mensajeFormulario.textContent =
                    '¡Reserva registrada correctamente!';
            }

        } catch (error) {
            console.error('Error al registrar reserva:', error);
            mensajeFormulario.textContent = error.message;
        } finally {
            botonGuardar.disabled = false;
        }
    });
    </script>
</body>
</html>