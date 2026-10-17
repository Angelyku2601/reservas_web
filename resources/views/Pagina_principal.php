
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Laboratorios - FIC</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #eaf2fa, #d3e4f5);
            color: #173b5e;
            min-height: 100vh;
        }

        .barra-superior {
            background: #ffffff;
            border-bottom: 5px solid #07518b;
            padding: 22px 35px;
            box-shadow: 0 3px 12px rgba(0, 40, 80, 0.08);
        }

        .barra-superior h2 {
            font-size: 22px;
            color: #07518b;
        }

        .barra-superior p {
            margin-top: 5px;
            color: #718096;
            font-size: 13px;
        }

        main {
            max-width: 1050px;
            margin: 55px auto;
            padding: 0 20px;
        }

        h1 {
            font-size: 27px;
            margin-bottom: 12px;
            color: #123e64;
        }

        .subtitulo {
            color: #607b91;
            margin-bottom: 28px;
        }

        .contenedor-botones {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 22px;
            margin-bottom: 45px;
        }

        .boton {
            display: flex;
            flex-direction: column;
            gap: 14px;
            background: #ffffff;
            color: #123e64;
            padding: 28px;
            border-radius: 14px;
            text-decoration: none;
            box-shadow: 0 5px 18px rgba(0, 40, 80, 0.08);
            transition: transform 0.2s, box-shadow 0.2s;
            border: 1px solid #e2edf7;
        }

        .boton:hover {
            transform: translateY(-4px);
            box-shadow: 0 9px 24px rgba(0, 40, 80, 0.15);
        }

        .icono {
            font-size: 28px;
        }

        .nombre-aula {
            font-weight: bold;
            font-size: 18px;
        }

        .ver-calendario {
            color: #07518b;
            font-size: 14px;
        }

        .seccion-horarios {
            background: #ffffff;
            padding: 28px;
            border-radius: 14px;
            box-shadow: 0 5px 18px rgba(0, 40, 80, 0.08);
        }

        .seccion-horarios h2 {
            margin-bottom: 20px;
        }

        .botones-horario {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .boton-horario {
            background: #e8f2fc;
            color: #07518b;
            border: 1px solid #c9dfef;
            padding: 14px 25px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }

        .boton-horario:hover,
        .boton-horario.activo {
            background: #07518b;
            color: white;
        }

        @media (max-width: 650px) {
            .contenedor-botones {
                grid-template-columns: 1fr;
            }

            main {
                margin-top: 30px;
            }

            h1 {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>

    <?php include __DIR__ . '/menu_hamburguesa.php'; ?>

    <header class="barra-superior">
        <h2>Reserva de Laboratorios</h2>
        <p>Facultad de Informática - Sistema de Reservaciones</p>
    </header>

    <main>
        <h1>¿Qué espacio deseas reservar?</h1>
        <p class="subtitulo">
            Selecciona un aula para consultar su disponibilidad.
        </p>

            <div class="contenedor-botones">

                <a href="/reservas/laboratorio-a" class="boton">
                    <span class="icono">💻</span>
                    <span class="nombre-aula">Laboratorio de cómputo A</span>
                    <span class="ver-calendario">Ver calendario →</span>
                </a>

                <a href="/reservas/laboratorio-b" class="boton">
                    <span class="icono">💻</span>
                    <span class="nombre-aula">Laboratorio de cómputo B</span>
                    <span class="ver-calendario">Ver calendario →</span>
                </a>

                <a href="/reservas/laboratorio-c" class="boton">
                    <span class="icono">💻</span>
                    <span class="nombre-aula">Laboratorio de cómputo C</span>
                    <span class="ver-calendario">Ver calendario →</span>
                </a>

                <a href="/reservas/auditorio-p2" class="boton">
                    <span class="icono">🎤</span>
                    <span class="nombre-aula">Auditorio P2</span>
                    <span class="ver-calendario">Ver calendario →</span>
                </a>

                <a href="/reservas/auditorio-pb" class="boton">
                    <span class="icono">🎤</span>
                    <span class="nombre-aula">Auditorio PB</span>
                    <span class="ver-calendario">Ver calendario →</span>
                </a>

            </div>

        </div>

        <section class="seccion-horarios">
            <h2>¿En qué horario?</h2>

            <div class="botones-horario">
                <button class="boton-horario" type="button">
                    Turno Matutino
                </button>

                <button class="boton-horario" type="button">
                    Turno Vespertino
                </button>
            </div>
        </section>
    </main>

</body>
</html>
