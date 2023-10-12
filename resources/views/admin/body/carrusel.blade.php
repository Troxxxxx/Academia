<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
    /* Estilos personalizados */
    body {
        background: linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%);
        /* Fondo con gradiente de azul claro */
        animation: gradient-animation 10s ease infinite alternate;
        /* Animación suave del fondo */
        margin: 0;
        padding: 0;
    }

    /* Animación de cambio de color */
    @keyframes gradient-animation {
        0% {
            background: linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%);
        }

        100% {
            background: linear-gradient(135deg, #cfdef3 0%, #e0eafc 100%);
        }
    }

    .carousel-container {
        max-width: 900px;
        margin: 20px auto;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        overflow: hidden;
        /* Evita que las imágenes desborden el contenedor */
    }

    .carousel-inner img {
        max-width: 100%;
        height: auto;
    }

    .carousel-inner {
        border-radius: 10px;
        transition: transform 1s ease;
        /* Animación de transición suave */
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: #007bff;
        width: 30px;
        height: 30px;
        border-radius: 50%;
    }

    .carousel-control-prev,
    .carousel-control-next {
        opacity: 0.7;
    }

    .carousel-control-prev:hover,
    .carousel-control-next:hover {
        opacity: 1;
    }
    </style>
</head>

<body>
    <div class="container">
        <!-- Carrusel -->
        <div id="imageCarousel" class="carousel slide carousel-container" data-bs-ride="carousel" data-bs-pause="hover">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('carrusel/gif1.gif') }}" class="d-block w-100" alt="GIF 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('carrusel/gif2.gif') }}" class="d-block w-100" alt="GIF 2">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('carrusel/gif3.gif') }}" class="d-block w-100" alt="GIF 3">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('carrusel/gif4.gif') }}" class="d-block w-100" alt="GIF 4">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('carrusel/gif5.gif') }}" class="d-block w-100" alt="GIF 5">
                </div>
            </div>
            <a class="carousel-control-prev" href="#imageCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#imageCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>

    <!-- Scripts de Bootstrap y jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- JavaScript para iniciar automáticamente el carrusel -->
    <script>
    $(document).ready(function() {
        // Iniciar el carrusel automáticamente y establecer un intervalo de 5 segundos
        $('#imageCarousel').carousel({
            interval: 5000
        });
    });
    </script>
</body>

</html>