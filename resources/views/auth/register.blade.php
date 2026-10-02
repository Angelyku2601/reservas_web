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
        <div class="left-panel">
            <div class="portrait">
                <div class="header-portrait">
                    <div class="logo-box">
                        <img src="{{ asset('img/logo_fic.png') }}" width="118" height="118" alt="" class="logo" alt="logo de la Facultad de informática de Culiacán">
                        <span class="system-name">Sistema de reservación de laboratorios</span>
                    </div>
                    <span class="action-text">Empieza a reservar</span>
                    <span class="instruction-text">Completa los siguientes campos para tu registro</span>
                </div>
                <div class="steps">

                </div>
            </div>
        </div>
        <div class="register">
            <div class="form-container">
                <div class="form-header">
                    <h1 class="form-title">
                        Crear una cuenta
                    </h1>
                    <span class="form-description">
                        Completa los siguientes campos para crear una cuenta
                    </span>
                </div>
                <form id="register_form" class="register-form">
                    <div class="inputs">

                        <div class="input-container">
                            <label for="name_input" class="input-label">Nombre completo</label>
                            <input type="text" id="name_input" name="name" class="text-input" placeholder="John doe Smith">
                        </div>
                        <div class="input-container">
                            <label for="username_input" class="input-label">Nombre de usuario</label>
                            <input type="text" name="username" id="username_input" class="text-input" placeholder="johnsmith">
                        </div>
                        <div class="input-container">
                            <label for="email_input" class="input-label">Correo</label>
                            <input type="email" name="email" id="" class="text-input" placeholder="example@gmail.com">
                        </div>
                        <div class="input-container">
                            <label for="password_input" class="input-label">Contraseña</label>
                            <input type="password" name="password" id="" class="text-input" placeholder="Ingrese su contraseña">
                            <span class="help-text">
                                La contraseña debe contener al menos 8 caracteres
                            </span>
                        </div>
                        <div class="input-container">
                            <label for="confirmation_input" class="input-label">Confirmar contraseña</label>
                            <input type="password" name="password_confirmation" id="confirmation_input" class="text-input" placeholder="Confirme su contraseña">
                        </div>
                    </div>
                    <button type="submit" class="submit-button primary-button">Registrarse</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>