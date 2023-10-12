<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sharks Academy - Perfil de Usuario</title>
    <link rel="stylesheet" href="{{ asset('backend/assets/css/welcome.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta3/dist/css/bootstrap.min.css">
    <style>
    .content-wrapper {
        background: linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%);
        animation: gradient-animation 10s ease infinite alternate;
        min-height: 1058.31px;
        margin: 0;
        padding: 0;
    }
    </style>
</head>

<body>
    @include('admin.body.encabezado')

    <div class="content-wrapper">
        <!-- Content Header -->
        <section class="content-header py-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Perfil de Usuario</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="inicio" class="text-blue">
                                    <i class="nav-icon fas fa-home"></i>&nbsp;Inicio
                                </a>
                            </li>
                            <li class="breadcrumb-item active">Mi Perfil</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Sección Superior -->
                    <div class="col-12 col-lg-6">
                        @include('admin.user_profile_section')
                    </div>
                    <!-- Sección Inferior -->
                    <div class="col-12 col-lg-6 mt-4 mt-lg-0">
                        @include('admin.admin_profile_edit')
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal Cambiar Foto -->
        @include('admin.modal_change_photo')

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('backend/assets/js/custom.js') }}"></script>
    </div>
</body>

</html>