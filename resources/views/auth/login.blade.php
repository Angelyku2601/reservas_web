<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Iniciar sesión | Reserva de Laboratorios</title>

    @vite(['resources/js/app.js'])

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;

            /* Fondo negro como el registro */
            background-color: #050505;
            color: white;
        }

        .login-container {
            width: 100%;
            max-width: 430px;
            padding: 42px 40px;

            /* Fondo oscuro con un ligero tono azul */
            background: linear-gradient(
                145deg,
                #09091a 0%,
                #080814 55%,
                #050505 100%
            );

            border-radius: 14px;

            /* Sombra azul/morada similar al diseño */
            box-shadow:
                0 10px 35px rgba(0, 0, 0, 0.65),
                0 0 25px rgba(74, 64, 230, 0.10);
        }

       

        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 18px;
        }

        .logo-container img {
            width: 85px;
            height: 85px;
            object-fit: contain;
        }

        /* =========================================
           TÍTULO
        ========================================= */

        .login-container h1 {
            text-align: center;
            margin-bottom: 10px;
            font-size: 27px;
            color: #ffffff;
        }

        .subtitle {
            text-align: center;
            color: #b8b8c2;
            margin-bottom: 30px;
            font-size: 14px;
        }

        /* =========================================
           FORMULARIO
        ========================================= */

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
            color: #ffffff;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 12px 13px;

            background-color: #353539;
            color: #ffffff;

            border: 1px solid #45454b;
            border-radius: 6px;

            font-size: 15px;
            outline: none;

            transition: 0.2s;
        }

        .form-group input::placeholder {
            color: #9d9da5;
        }

        .form-group input:focus {
            /* Morado/azul del botón del registro */
            border-color: #5548e8;

            box-shadow: 0 0 0 2px rgba(85, 72, 232, 0.15);
        }

        /* =========================================
           BOTÓN
        ========================================= */

        .btn-login {
            width: 100%;
            padding: 13px;

            border: none;
            border-radius: 6px;

            /* Color similar al botón "Registrarse" */
            background: linear-gradient(
                90deg,
                #5146e5,
                #6255ef
            );

            color: white;

            font-size: 16px;
            font-weight: bold;

            cursor: pointer;

            transition: 0.2s;
        }

        .btn-login:hover {
            background: linear-gradient(
                90deg,
                #6255ef,
                #7065f4
            );

            transform: translateY(-1px);

            box-shadow: 0 5px 15px rgba(84, 72, 232, 0.30);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        /* =========================================
           ERRORES DE LARAVEL
        ========================================= */

        .error {
            background-color: #35191d;
            color: #ff8e9a;

            border: 1px solid #702d36;

            padding: 10px;
            border-radius: 6px;

            margin-bottom: 20px;
            font-size: 14px;
        }

        .error p {
            margin-bottom: 5px;
        }

        .error p:last-child {
            margin-bottom: 0;
        }

        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 500px) {

            body {
                padding: 20px;
            }

            .login-container {
                padding: 35px 25px;
            }

            .logo-container img {
                width: 70px;
                height: 70px;
            }
        }

    </style>
</head>

<body>

    <div class="login-container">

        <!-- ======================================
             LOGO DEL SISTEMA
        ======================================= -->

        <div class="logo-container">

           <img
                src="{{ asset('images/logo.png') }}"
                alt="Logo Reserva de Laboratorios"
            >
        </div>


        <h1>Iniciar sesión</h1>

        <p class="subtitle">
            Sistema de Reservación de espacios
        </p>


        <!-- ERROR DE LOGIN -->

        @if(session('error'))

            <div class="error">

                {{ session('error') }}

            </div>

        @endif


       <!-- ERRORES DE VALIDACIÓN -->

@if(isset($errors) && $errors->any())

    <div class="error">

        @foreach($errors->all() as $error)

            <p>{{ $error }}</p>

        @endforeach

    </div>

@endif


        <!-- FORMULARIO -->

        <form id="login_form">


            @csrf


            <div class="form-group">

                <label for="email">
                    Correo institucional
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="ejemplo@info.uas.edu.mx"
                    value="{{ old('email') }}"
                    required
                >

            </div>


            <div class="form-group">

                <label for="password">
                    Contraseña
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Ingresa tu contraseña"
                    required
                >

            </div>


            <button
                type="submit"
                class="btn-login"
            >
                Iniciar sesión
            </button>

        </form>

    </div>

</body>
</html>