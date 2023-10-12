@include('admin.body.encabezado')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Jugadores</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <div class="container mt-5">
        <div class="row mt-3">
            <div class="col-md-4">
                <label for="sede" class="form-label">Selecciona una Sede:</label>
                <select id="sede" class="form-control">
                    <option value="">-- Selecciona --</option>
                    @foreach($sedes as $sede)
                    <option value="{{ $sede->id }}">{{ $sede->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4">
                <label for="equipo" class="form-label">Selecciona un Equipo:</label>
                <select id="equipo" class="form-control">
                    <option value="">-- Selecciona --</option>
                </select>
            </div>

            <div class="col-md-4 d-flex align-items-end">
                <a href="#" id="getTodos" class="btn btn-primary btn-md shadow">
                    <i class="fas fa-users mr-2"></i>Ver Todos los Jugadores
                </a>
            </div>
        </div>
    </div>

    <div class="row mt-5" id="lista-jugadores">
        <!-- Los jugadores serán cargados aquí como tarjetas -->
    </div>
    </div>
    </div>

    <style>
    .mt-4 {
        margin-top: 20px;
    }

    .mt-3 margin-top: 15px;

    /* Estilos para las tarjetas y las imágenes */
    .card {
        transition: transform 0.3s;
        height: 350px;
        /* Ajusta esto según lo que necesites */
        width: 280px;
        /* Ajusta esto según lo que necesites */
    }

    .card:hover {
        transform: scale(1.05);
    }

    .card-img-top {
        width: 100%;
        height: 250px;
        /* Ajusta esto según lo que necesites */
        object-fit: cover;
        /* Asegura que la imagen cubra todo el espacio */
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

    <script>
    $('#sede').on('change', function() {
        var sede_id = $(this).val();
        $.get(`/equipos/${sede_id}`, function(data) {
            var equipos = `<option value="">-- Selecciona --</option>`;
            data.forEach(function(equipo) {
                equipos += `<option value="${equipo.id}">${equipo.nombre}</option>`;
            });
            $('#equipo').html(equipos);
        });
    });

    $('#equipo').on('change', function() {
        var equipo_id = $(this).val();
        $.get(`/jugadores/${equipo_id}`, function(data) {
            var cards = "";
            data.forEach(function(jugador) {
                cards += `
                <div class="col-md-3">
                    <div class="card mb-4 shadow-sm">
                        <img src="${jugador.imagen}" alt="${jugador.nombre}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">${jugador.nombre}</h5>
                            <p class="card-text">${jugador.posicion}</p> <!-- Aquí se agrega la posición -->
                        </div>
                    </div>
                </div>`;
            });
            $('#lista-jugadores').html(cards);
        });
    });

    $('#getTodos').on('click', function() {
        $.get(`/jugadores/getTodos`, function(data) {
            var cards = "";
            data.forEach(function(jugador) {
                cards += `
        <div class="col-md-3">
            <div class="card mb-4 shadow-sm">
                <img src="${jugador.imagen}" alt="${jugador.nombre}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">${jugador.nombre}</h5>
                    <p class="card-text">${jugador.posicion}</p>
                </div>
            </div>
        </div>`;
            });
            $('#lista-jugadores').html(cards);
        });
    });
    </script>

</body>

</html>