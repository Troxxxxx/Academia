@include('admin.body.redes')
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horarios de Entrenamiento | JMC Sharks Academy</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <style>
    body {
        background-color: #f4f6f9;
        font-family: 'Nunito', sans-serif;
    }

    .card-header {
        background-color: #0056b3;
        color: white;
    }

    .card {
        margin-bottom: 20px;
    }

    .card-title {
        color: #0056b3;
    }

    .container {
        padding-top: 30px;
    }

    .bg-sharks {
        background-color: #0056b3;
    }

    .text-sharks {
        color: #0056b3;
    }

    body {
        background: linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%);
        /* Fondo con gradiente de azul claro */
        animation: gradient-animation 10s ease infinite alternate;
        /* Animación suave del fondo */
        margin: 0;
        padding: 0;
    }
    </style>
</head>

<body>

    @include('admin.body.encabezado')

    <div class="container mt-5">
        <h2 class="mb-4 text-center">Horarios de Entrenamiento</h2>

        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownFiltrar" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Filtrar por Sede
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownFiltrar">
                @foreach ($sedes as $sede)
                <li><a class="dropdown-item" href="#" data-sede-id="{{ $sede->id }}">{{ $sede->nombre }}</a></li>
                @endforeach
            </ul>
        </div>

        @foreach ($sedesHorarios as $sedeId => $horarios)
        <div class="sede-section mb-5" data-sede-id="{{ $sedeId }}" style="display: none;">
            <h3>{{ $sedes->find($sedeId)->nombre }}</h3>
            @foreach ($horarios as $horario)
            <div class="card mb-3">
                <div class="card-header">{{ $horario->dia }}</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $horario->actividad }}</h5>
                    <p class="card-text">
                        Horario: {{ \Carbon\Carbon::parse($horario->hora_inicio)->format('H:i') }} -
                        {{ \Carbon\Carbon::parse($horario->hora_fin)->format('H:i') }}
                    </p>
                    <p class="card-text">{{ $horario->entrenador }}</p>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Scripts necesarios para Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    <script>
    function filtrarSede(sedeId) {
        $('.sede-section').hide(); // Oculta todas las secciones
        $('.sede-section[data-sede-id="' + sedeId + '"]').show(); // Muestra solo la sección seleccionada
    }

    $(document).ready(function() {
        $('.dropdown-menu .dropdown-item').on('click', function() {
            var sedeId = $(this).data('sede-id'); // Usa jQuery para obtener el ID de la sede
            filtrarSede(sedeId);
        });

        // Opcionalmente, puedes mostrar todos los horarios al cargar la página
        $('.sede-section').show();
    });
    </script>

</body>
@include('admin.body.footer')

</html>