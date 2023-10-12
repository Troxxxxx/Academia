<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sharks Academy - Bienvenidos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/welcome.css') }}">
</head>

<body>
    @include('admin.body.encabezado')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="card mt-5 shadow-lg">
                        <div class="card-body">
                            <h4 class="card-title text-center mb-4">Cambiar Contraseña</h4>

                            @if(count($errors))
                            <div class="alert alert-danger alert-dismissible fade show">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif

                            <form method="post" action="{{ route('update.password') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="oldpassword" class="form-label">Contraseña Actual</label>
                                    <input name="oldpassword" class="form-control" type="password" id="oldpassword"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label for="newpassword" class="form-label">Nueva Contraseña</label>
                                    <input name="newpassword" class="form-control" type="password" id="newpassword"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label for="confirm_password" class="form-label">Confirmar Contraseña</label>
                                    <input name="confirm_password" class="form-control" type="password"
                                        id="confirm_password" required>
                                </div>

                                <div class="d-grid gap-2">
                                    <input type="submit" class="btn btn-info" value="Actualizar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>