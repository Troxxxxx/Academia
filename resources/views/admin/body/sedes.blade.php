<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuestras Sedes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
    .row {
        display: flex;
        align-items: stretch;
    }

    .col-md-4 {
        display: flex;
    }

    .card {
        flex: 1;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .card-title {
        font-size: 20px;
    }

    .card-text {
        font-size: 16px;
        flex-grow: 1;
    }

    .card-body {
        display: flex;
        flex-direction: column;
    }

    .btn {
        margin-top: auto;
    }

    .card-img-top {
        height: 200px;
        object-fit: cover;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-5">Nuestras Sedes</h1>
        <div class="row mt-4">
            <!-- Sede 1 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('sedes/sede1.jpg') }}" class="card-img-top" alt="Sede María Auxiliadora">
                    <div class="card-body">
                        <h5 class="card-title">Limón | Limón</h5>
                        <p class="card-text">
                            <strong>Horario:</strong> 06:00pm - 09:00 pm<br>
                            <strong>Días:</strong> Lunes, Miércoles, Sábados.
                        </p>
                        <a href="https://www.facebook.com/limonsharks" target="_blank" class="btn btn-primary">
                            <i class="fab fa-facebook-f"></i> Visitar Facebook
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sede 2 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('sedes/sede2.jpg') }}" class="card-img-top" alt="Sede Colegio Montebello">
                    <div class="card-body">
                        <h5 class="card-title">Guácimo | Limón</h5>
                        <p class="card-text">
                            <strong>Horario:</strong> 08:00am - 12:00 md<br>
                            <strong>Días:</strong> Sábados.
                        </p>
                        <a href="https://www.facebook.com/limonsharksbasketballguacimo" target="_blank"
                            class="btn btn-primary">
                            <i class="fab fa-facebook-f"></i> Visitar Facebook
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sede 3 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('sedes/sede3.jpg') }}" class="card-img-top" alt="Sede Guácimo">
                    <div class="card-body">
                        <h5 class="card-title">Guapiles | La Emilia Academy | Limón</h5>
                        <p class="card-text">
                            <strong>Horario:</strong> 05:00pm - 08:00 pm<br>
                            <strong>Días:</strong> Martes, Jueves, Viernes.
                        </p>
                        <a href="https://www.facebook.com/limonsharksbasketballguacimo" target="_blank"
                            class="btn btn-primary">
                            <i class="fab fa-facebook-f"></i> Visitar Facebook
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>