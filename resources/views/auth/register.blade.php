<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token">
    <title>Crear una cuenta</title>
    @vite(['resources/css/app.css', 'resources/css/custom.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container">
        <form id="register_form">
            <input type="email" name="email" id="" class="email">
            <input type="password" name="password" id="" class="text-input">
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>