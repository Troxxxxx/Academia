@include('admin.body.redes')
@include('admin.body.encabezado')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Inscripción</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/welcome.css') }}">

    <!-- Enlace a Bootstrap CSS -->
    <style>
    /* Estilos para el contenido */
    .container {
        margin-top: 20px;
    }

    /* Estilos para el formulario */
    .form-group label {
        font-weight: bold;
    }

    /* Otros estilos personalizados aquí */

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


    <!-- Contenido principal -->
    <div class="container">
        <h2 class="text-center">Formulario de Inscripción</h2>
        <p class="text-center">¡Únete a nuestra academia de baloncesto en una de nuestras sedes!</p>

        {{-- Mostrar errores de validación --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Mostrar mensaje de éxito --}}
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <form method="POST" action="{{ route('inscripciones.store') }}">
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre Completo:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono de Contacto:</label>
                <input type="tel" class="form-control" id="telefono" name="telefono" required>
            </div>

            <div class="form-group">
                <label for="sede">Sede:</label>
                <select class="form-control" id="sede" name="sede" required>
                    <option value="Sharks Limón">Sharks Limón</option>
                    <option value="Sharks Guácimo">Sharks Guácimo</option>
                    <option value="Sharks Guápiles">Sharks Guápiles</option>
                </select>
            </div>

            <div class="form-group">
                <label for="mensaje">Mensaje Adicional (opcional):</label>
                <textarea class="form-control" id="mensaje" name="mensaje" rows="4"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Enviar Inscripción</button>
        </form>
    </div>

    <!-- Scripts de Bootstrap y otros si es necesario -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>