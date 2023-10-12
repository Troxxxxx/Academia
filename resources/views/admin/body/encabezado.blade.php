<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Inicio</title>
    <style>
    body {
        background-color: #f4f4f4;
        font-family: 'Nunito', sans-serif;
    }

    .navbar {
        background-color: #ffffff;
        box-shadow: 0px 4px 12px 0px rgba(0, 0, 0, 0.05);
        padding: 10px 0;
        transition: all 0.3s;
    }

    .navbar-brand img {
        width: 50px;
        filter: brightness(80%);
        margin-right: 10px;
    }

    .navbar-nav .nav-item {
        margin-right: 25px;
        margin-bottom: 5px;
    }

    .navbar-nav .nav-link {
        font-size: 16px;
        color: #000000;
        /* Color de texto negro */
        padding: 10px 15px;
        transition: color 0.3s, background-color 0.3s;
        border-radius: 4px;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link.active {
        color: #007BFF;
        /* Color de texto azul al pasar el cursor o al hacer clic */
        background-color: #f2f2f2;
    }

    .nav-item.dropdown .nav-link {
        padding: 5px 15px;
    }

    .submenu {
        position: absolute;
        background-color: #fff;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.1);
        z-index: 1;
        display: none;
        border-radius: 8px;
        overflow: hidden;
    }

    .submenu a {
        color: #000000;
        /* Color de texto negro */
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        transition: background-color 0.3s, color 0.3s;
    }

    .submenu a:hover {
        color: #ffffff;
        /* Establece el color del texto a blanco al pasar el cursor */
        background-color: #007BFF;
        /* Establece el color de fondo a azul al pasar el cursor */
    }

    .navbar-nav .nav-item:hover .submenu,
    .submenu:hover {
        display: block;
    }

    .navbar-toggler {
        border: none;
    }

    .navbar-toggler-icon {
        filter: brightness(80%);
    }

    .img-circle {
        border-radius: 50%;
        border: 2px solid #f4f4f4;
    }

    .arrow-down {
        margin-left: 5px;
        transition: transform 0.3s;
    }

    .nav-item.has-submenu:hover .arrow-down {
        transform: rotate(180deg);
    }
    </style>
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('logo/logo.jpg') }}" alt="Sharks Baloncesto Logo"> JMC Sharks
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/inscripciones">Inscripciones</a>
                        </li>
                        <li class="nav-item has-submenu">
                            <div class="nav-link">Servicios <i class="fas fa-chevron-down arrow-down"></i></div>
                            <div class="submenu">
                                <a href="{{ route('horarios.index') }}">Horarios</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/jugadores">Jugadores</a>
                        </li>
                        <li class="nav-item has-submenu">
                            <div class="nav-link">Sobre Nosotros <i class="fas fa-chevron-down arrow-down"></i></div>
                            <div class="submenu">
                                <a href="{{ route('staff.index') }}">Nuestro equipo</a>
                                <a href="{{ route('historia.index') }}">Nuestra Historia</a>
                            </div>
                        </li>
                        @auth
                        @php $adminData = Auth::user(); @endphp
                        @if($adminData)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ $adminData->profile_image ? url('upload/admin_images/'.$adminData->profile_image) : url('upload/sinFoto.jpg') }}"
                                    class="img-circle" width="45px" height="40px">
                                <strong>{{ $adminData->name }}</strong>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.profile') }}"><i
                                        class="ri-user-line align-middle me-1"></i> Perfil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('change.password') }}"><i
                                        class="ri-wallet-2-line align-middle me-1"></i> Cambiar Contraseña</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{ route('admin.logout') }}"><i
                                        class="ri-shut-down-line align-middle me-1"></i> Cerrar Sesión</a>
                            </div>
                        </li>
                        @endif
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Iniciar Sesión</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register">Registrarse</a>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>