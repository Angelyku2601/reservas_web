<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario - Facultad de Informática Culiacán</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(180deg, #eaf2f8 0%, #d8e5f2 100%);
            color: #0b2545;
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .main-container {
            flex: 1;
            max-width: 1000px;
            width: 90%;
            margin: 40px auto;
            display: flex;
            flex-direction: column;
            gap: 25px;
        }


        .profile-header-card {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 25px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            box-shadow: 0 4px 12px rgba(11, 37, 69, 0.05);
        }

        .profile-user-info h2 {
            margin: 0 0 6px 0;
            color: #0b2545;
            font-size: 1.6rem;
            font-weight: bold;
        }

        .profile-user-info p {
            margin: 0;
            color: #5a6e85;
            font-size: 0.95rem;
        }


        .btn-logout {
            background-color: #d93838; 
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: bold;
            text-decoration: none;
            transition: background-color 0.2s, transform 0.1s;
        }

        .btn-logout:hover {
            background-color: #b82828;
        }

        .profile-details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 20px;
        }


        .detail-card {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(11, 37, 69, 0.05);
        }

        .detail-card h3 {
            margin-top: 0;
            color: #0b2545;
            font-size: 1.15rem;
            border-bottom: 2px solid #edf2f7;
            padding-bottom: 12px;
            margin-bottom: 20px;
        }

        .profile-field {
            margin-bottom: 16px;
        }

        .profile-field:last-child {
            margin-bottom: 0;
        }

        .profile-field label {
            display: block;
            color: #5a6e85;
            margin-bottom: 6px;
            font-size: 0.8rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .profile-field .value {
            background-color: #f4f8fb;
            padding: 10px 14px;
            border-radius: 8px;
            border: 1px solid #dce5ef;
            color: #0b2545;
            font-size: 0.95rem;
            font-weight: 500;
        }
    </style>
</head>
<body>

    @include('menu_hamburguesa')

    <div class="main-container">
        

        <div class="profile-header-card">
            <div class="profile-user-info">
                <h2>{{ $usuario->nombre }}</h2>
                <p>{{ $usuario->carrera ?? 'Estudiante de Licenciatura en Informática' }}</p>
            </div>

            <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="btn-logout">Cerrar Sesión</button>
            </form>
        </div>


        <div class="profile-details-grid">
            
            <div class="detail-card">
                <h3>Información Personal</h3>
                <div class="profile-field">
                    <label>Nombre Completo:</label>
                    <div class="value">{{ $usuario->nombre }} {{ $usuario->apellido }}</div>
                </div>
                <div class="profile-field">
                    <label>Rol:</label>
                    <div class="value">{{ $usuario->rol }}</div>
                </div>
                <div class="profile-field">
                    <label>Correo Institucional:</label>
                    <div class="value">{{ $usuario->correo }}</div>
                </div>
            </div>

            <div class="detail-card">
                <h3>Detalles Académicos</h3>
                <div class="profile-field">
                    <label>Facultad:</label>
                    <div class="value">Facultad de Informática Culiacán</div>
                </div>
                <div class="profile-field">
                    <label>Programa Educativo:</label>
                    <div class="value">{{ $usuario->carrera }}</div>
                </div>
                <div class="profile-field">
                    <label>Semestre / Grupo:</label>
                    <div class="value">{{ $usuario->semestre }}</div>
                </div>
            </div>

        </div>

    </div>

</body>
</html>