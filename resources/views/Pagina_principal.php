<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Laboratorios de Cómputo - FIC</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f9;
            color: #333;
        }

        h1 {
            text-align: center;
            margin-top: 2rem;
            color: #002B49;
            font-size: 1.5rem;
        }

        .contenedor-botones {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;
            margin: 1.5rem auto;
            max-width: 800px;
            padding: 0 1rem;
        }

        .boton {
            background-color: #002B49;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.2s;
            text-align: center;
            min-width: 180px;
        }

        .boton:hover {
            background-color: #00A3E0;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

    <?php include __DIR__ . '/menu_hamburguesa.php'; ?>

    <main>
        <h1>¿Qué aula buscar revisar hoy?</h1>

        <div class="contenedor-botones">
            <a href="#" class="boton">Aula de cómputo</a>
            <a href="#" class="boton">Aula de capacitación A</a>
            <a href="#" class="boton">Aula de capacitación B</a>
            <a href="#" class="boton">Aula de cómputo Posgrado</a>
        </div>

        <h1>¿En qué horario?</h1>

        <div class="contenedor-botones">
            <a href="#" class="boton">Turno Matutino</a>
            <a href="#" class="boton">Turno Vespertino</a>
        </div>
    </main>

</body>
</html>