<nav class="main-header navbar navbar-expand navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        @php
        $id = Auth::user()->id;
        $adminData = App\Models\User::find($id);
        @endphp

        <li class="nav-item dropdown">
            <a class="nav-link-sm" data-toggle="dropdown" href="#">
                <img src="{{ (!empty($adminData->profile_image))? url('upload/admin_images/'.$adminData->profile_image):url('upload/sinFoto.jpg') }}"
                    alt="User Avatar" class="img-size-20 mr-3 ml-3
                   img-circle" width="45px" height="40px">
                <strong><span class="d-none d-xl-inline-block ms-1 text-light">{{ $adminData->name }}</span></strong>
                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right text-center">
                <a href="{{ route('admin.profile') }}" class="dropdown-item">
                    <i class="ri-user-line align-middle me-1"></i> Perfil
                </a>

                <div class="dropdown-divider text-center"></div>
                <a href="{{ route('change.password') }}" class="dropdown-item">
                    <i class="ri-wallet-2-line align-middle me-1"></i> Cambiar Contraseña
                </a>

                <div class="dropdown-divider text-center"></div>
                <a href="{{ route('admin.logout') }}" class="dropdown-item dropdown-footer text-danger">
                    <i class="ri-shut-down-line align-middle me-1"></i> Cerrar Sesión
                </a>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>