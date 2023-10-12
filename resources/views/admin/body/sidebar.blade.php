<aside class="main-sidebar elevation-4 sidebar-dark-primary">
    <div class="sidebar">
        <!-- Logo -->
        <a href="{{ route('dashboard') }}" class="brand-link ms-0">
            <img src="{{ asset('backend/assets/dist/img/logo.gif') }}" alt="Logo appMarket"
                class="brand-image img-circle max-width:200px" style="opacity: .8">
            <span class="font-weight-light text-light">Academia</span>
        </a>
        <!-- Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Inicio
                            <i class=""></i>
                        </p>
                    </a>
                </li>

                <!-- Botón Perfil Empresarial del Tenant -->

                <!-- Opción "Jugadores" -->
                <li class="nav-item">
                    <a href="{{ route('jugadores.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Jugadores
                        </p>
                    </a>
                </li>



                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Administrativo
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.users') }}" class="nav-link">
                                <i class="fas fa-angle-right nav-icon"></i>
                                <p>Gestión de Usuarios</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Cerrar Sesión
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    @php
    $id = Auth::user()->id;
    $adminData = App\Models\User::find($id);
    @endphp

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mb-6 d-flex">
            <div class="image mt-2">
                <img src="{{ (!empty($adminData->profile_image))? url('upload/admin_images/'.$adminData->profile_image):url('upload/sinFoto.jpg') }}"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('admin.profile') }}" class="d-block">{{ $adminData->name }}</a>
                <span class="text-muted">
                    <i class="ri-record-circle-line align-middle font-size-14 text-success"></i>
                    Online
                </span>
            </div>
        </div>
    </div>
</aside>