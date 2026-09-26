<?php
// Plantilla base
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
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
            background: linear-gradient(135deg, #0f3570 0%, #194a91 100%);
            color: white;
            padding: 30px 40px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
            margin-bottom: 40px;
            box-sizing: border-box;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-izquierda h2 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }
}

        .header-derecha h3 {
            margin: 0;
            font-size: 18px;
            font-style: italic;
            font-weight: normal;
            color: #ffffff;
        }


        h1 {
            margin-bottom: 30px;
            text-align: center;
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
            
            width: 200px;
            height: 60px;
            box-sizing: border-box;
            
            font-size: 15px;
            font-weight: bold;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .boton:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }
        
        .boton:active {
            transform: translateY(1px);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }


        .btn-1 { background-color: #2f3cac; }
        .btn-2 { background-color: #2f3cac; }
        .btn-3 { background-color: #2f3cac; }
        .btn-4 { background-color: #2f3cac; }
        .btn-5 { background-color: #2f3cac; }
        .btn-6 { background-color: #2f3cac; }
        
    </style>
</head>
<body>

    <header class="encabezado">
        <div class="header-izquierda">
            <h2>Reserva de aulas de computo</h2>
        </div>
        <div class="header-derecha">
            <h3>Facultad de informatica</h3>
        </div>
    </header>

    <h1>¿Que aula buscar revisar hoy?</h1>
    
    <div class="contenedor-botones">
        <a href="#" class="boton btn-1">Aula de computo</a>
        <a href="#" class="boton btn-2">Aula de capacitacion A</a>
        <a href="#" class="boton btn-3">Aula de capacitacion B</a>
        <a href="#" class="boton btn-4">Aula de computo Posgrado</a>
    </div>

    <h1>¿En que horario?</h1>
    <div class="contenedor-botones">
        <a href="#" class="boton btn-5">Turno Matutino</a>
        <a href="#" class="boton btn-6">Turno Vespertino</a>
    </div>
</body>
</html>
