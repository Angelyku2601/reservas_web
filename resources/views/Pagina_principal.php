<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de aulas de computo</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        .encabezado {
            width: 100%;
            background-color: #194a91;
            color: white;
            padding: 20px 50px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            margin-bottom: 50px;
            box-sizing: border-box;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }

        .header-izquierda h2 {
            margin: 0;
            font-size: 22px;
            font-weight: bold;
        }

        .header-derecha h3 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
        }

        .boton-hamburguesa {
            display: none;
            font-size: 26px;
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            padding: 5px 10px;
        }

        .menu-navegacion {
            display: flex;
            gap: 25px;
            align-items: center;
        }

        .menu-navegacion a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            transition: opacity 0.2s;
        }

        .menu-navegacion a:hover {
            opacity: 0.8;
        }

        @media (max-width: 850px) {
            .boton-hamburguesa {
                display: block;
            }

            .header-derecha {
                display: none;
            }

            .menu-navegacion {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background-color: #194a91;
                padding: 15px 0;
                box-shadow: 0 6px 12px rgba(0,0,0,0.2);
                z-index: 100;
            }

            .menu-navegacion.activo {
                display: flex;
            }

            .menu-navegacion a {
                padding: 12px 30px;
                width: 100%;
                box-sizing: border-box;
                text-align: left;
                border-bottom: 1px solid rgba(255,255,255,0.1);
            }
        }

        h1 {
            margin-bottom: 25px;
            text-align: center;
            font-size: 26px;
            color: #222;
        }

        .contenedor-botones {
            display: flex;
            flex-wrap: wrap; 
            gap: 20px; 
            justify-content: center;
            max-width: 900px;
            padding: 0 20px 40px 20px;
        }

        .boton {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 210px;
            height: 55px;
            box-sizing: border-box;
            font-size: 14px;
            font-weight: bold;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            border: none;
            background-color: #2f3cac;
            box-shadow: 0 4px 6px rgba(0,0,0,0.15);
            transition: transform 0.2s ease;
        }

        .boton:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

    <header class="encabezado">
        <div class="header-izquierda">
            <h2>Reserva de aulas de computo</h2>
        </div>

        <button class="boton-hamburguesa" id="btnMenu" aria-label="Abrir menú">☰</button>

        <nav class="menu-navegacion" id="menuNavegacion">
            <a href="#">Inicio</a>
            <a href="#">Mis Reservas</a>
            <a href="#">Disponibilidad</a>
            <a href="#">Reglamento</a>
            <a href="#">Mi Perfil</a>
        </nav>

        <div class="header-derecha">
            <h3>Facultad de informatica</h3>
        </div>
    </header>

    <h1>¿Que aula buscar revisar hoy?</h1>
    
    <div class="contenedor-botones">
        <a href="#" class="boton">Aula de computo</a>
        <a href="#" class="boton">Aula de capacitacion A</a>
        <a href="#" class="boton">Aula de capacitacion B</a>
        <a href="#" class="boton">Aula de computo Posgrado</a>
    </div>

    <h1>¿En que horario?</h1>
    <div class="contenedor-botones">
        <a href="#" class="boton">Turno Matutino</a>
        <a href="#" class="boton">Turno Vespertino</a>
    </div>

    <script>
        const btnMenu = document.getElementById('btnMenu');
        const menuNavegacion = document.getElementById('menuNavegacion');

        btnMenu.addEventListener('click', () => {
            menuNavegacion.classList.toggle('activo');
        });
    </script>
</body>
</html>