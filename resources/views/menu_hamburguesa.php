<style>
    .encabezado-menu {
        background-color: #002B49;
        color: #fff;
        padding: 1rem 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        position: relative;
    }

    .encabezado-menu .logo-contenedor h2 {
        font-size: 1.2rem;
        font-weight: bold;
    }

    .encabezado-menu nav ul {
        display: flex;
        list-style: none;
        gap: 20px;
        margin: 0;
        padding: 0;
    }

    .encabezado-menu nav a {
        color: #fff;
        text-decoration: none;
        font-weight: bold;
        transition: color 0.3s;
    }

    .encabezado-menu nav a:hover {
        color: #00A3E0;
    }

    .encabezado-menu .btn-menu {
        display: none;
        background: none;
        border: none;
        color: #fff;
        font-size: 1.8rem;
        cursor: pointer;
    }

    @media (max-width: 768px) {
        .encabezado-menu .btn-menu {
            display: block;
        }

        .encabezado-menu nav {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background-color: #002B49;
            padding: 1rem 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 10;
        }

        .encabezado-menu nav.activo {
            display: block;
        }

        .encabezado-menu nav ul {
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }
    }
</style>

<header class="encabezado-menu">
    <div class="logo-contenedor">
        <h2>Facultad de Informática Culiacán</h2>
    </div>

    <button
        type="button"
        class="btn-menu"
        id="btnMenu"
        aria-label="Abrir menú"
        aria-controls="menuNavegacion"
        aria-expanded="false"
    >
        &#9776;
    </button>

    <nav id="menuNavegacion" aria-label="Navegación principal">
        <ul>
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Laboratorios</a></li>
            <li><a href="#">Mis Reservas</a></li>
            <li><a href="#">Contacto</a></li>
        </ul>
    </nav>
</header>

<script>
    (() => {
        const btnMenu = document.getElementById('btnMenu');
        const menuNavegacion = document.getElementById('menuNavegacion');

        if (btnMenu && menuNavegacion) {
            btnMenu.addEventListener('click', () => {
                const abierto = menuNavegacion.classList.toggle('activo');

                btnMenu.setAttribute('aria-expanded', String(abierto));
                btnMenu.setAttribute(
                    'aria-label',
                    abierto ? 'Cerrar menú' : 'Abrir menú'
                );
            });
        }
    })();
</script>