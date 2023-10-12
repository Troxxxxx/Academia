<div class="col-12 col-md-12">
    <div class="card card-info card-outline bg-light shadow">
        <div class="card-body box-profile">
            <div class="row">
                <div class="col-md-4 text-center mb-3">
                    <img class="rounded-circle avatar-x2 border" width="140px" height="140px"
                        src="{{ !empty($adminData->profile_image) ? url('upload/admin_images/'.$adminData->profile_image) : url('upload/sinFoto.jpg') }}"
                        alt="Card image cap">
                </div>
                <div class="col-md-8">
                    <h3 class="profile-username text-dark">
                        Nombre Completo: {{ $adminData->name }}
                    </h3>
                    <p class="text-muted">
                        Correo Electrónico: {{ $adminData->email }}
                    </p>
                    @if($adminData->hasRole('admin'))
                    <p class="text-muted">
                        Rol: Administrador
                    </p>
                    @endif
                    <p class="text-muted">
                        Fecha Creación: {{ $adminData->created_at }}
                    </p>
                    <div class="mt-3">
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#cambiarFoto">Cambiar
                            foto</button>
                        <a href="{{ route('change.password') }}"
                            class="btn btn-success btn-sm btn-rounded waves-effect waves-light">Cambiar contraseña</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-danger float-right" disabled>Eliminar cuenta</button>
        </div>
    </div>
</div>