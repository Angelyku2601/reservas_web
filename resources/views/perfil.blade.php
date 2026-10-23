<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario - Facultad de Informática Culiacán</title>
    <style>
        body {
            background-color: #000000;
            color: #ffffff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background-color: #020b14;
            border-bottom: 1px solid #1a2b3c;
        }
        .logo {
            font-weight: bold;
            font-size: 1.1rem;
        }
        nav a {
            color: #ffffff;
            text-decoration: none;
            margin-left: 20px;
            font-size: 0.95rem;
            padding: 6px 12px;
            border-radius: 4px;
        }
        nav a:hover, nav a.active {
            background-color: #16324f;
        }
        
        
        .main-container {
            flex: 1;
            max-width: 1000px;
            width: 90%;
            margin: 40px auto;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .profile-header-card {
            background-color: #081624;
            border: 1px solid #1a2b3c;
            border-radius: 8px;
            padding: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .profile-user-info h2 {
            margin: 0 0 5px 0;
            color: #4da3ff;
            font-size: 1.8rem;
        }

        .profile-user-info p {
            margin: 0;
            color: #8ab4f8;
            font-size: 1rem;
        }


        .btn-logout {
            background-color: #8b0000; 
            color: #ffffff;
            border: 1px solid #ff4d4d;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.95rem;
            text-decoration: none;
            transition: background-color 0.2s;
        }

        .btn-logout:hover {
            background-color: #a80000;
        }


        .profile-details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .detail-card {
            background-color: #081624;
            border: 1px solid #1a2b3c;
            border-radius: 8px;
            padding: 25px;
        }

        .detail-card h3 {
            margin-top: 0;
            color: #4da3ff;
            font-size: 1.2rem;
            border-bottom: 1px solid #1a2b3c;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .profile-field {
            margin-bottom: 15px;
        }

        .profile-field:last-child {
            margin-bottom: 0;
        }

        .profile-field label {
            display: block;
            color: #8ab4f8;
            margin-bottom: 5px;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .profile-field .value {
            background-color: #020b14;
            padding: 10px 12px;
            border-radius: 4px;
            border: 1px solid #1a2b3c;
            color: #e0e0e0;
            font-size: 1rem;
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
                    <div class="value">{{ $usuario->carrera  }}</div>
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