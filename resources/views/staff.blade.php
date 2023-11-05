@include('admin.body.redes')
@include('admin.body.encabezado')
<style>
body {
    background: linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%);
    margin: 0;
    padding: 0;
    animation: gradient-animation 10s ease infinite alternate;
}

.mt-4 {
    margin-top: 20px;
}

.mt-3 {
    margin-top: 15px;
}

.card {
    max-width: 250px;
    transition: transform 0.3s;
}

.card:hover {
    transform: scale(1.05);
}
</style>

<div class="container">
    <h1 class="mt-4 text-center font-weight-bold" style="font-size: 32px;">Nuestro Equipo Técnico</h1>

    @role('admin')
    <div class="mb-4 text-right">
        <button class="btn btn-success" data-toggle="modal" data-target="#createModal">Agregar Miembro</button>
    </div>

    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Agregar Nuevo Miembro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Campo para subir imagen -->
                        <div class="form-group">
                            <label for="imagen">Imagen:</label>
                            <input type="file" name="imagen" id="imagen" class="form-control-file">
                        </div>
                        <!-- Campo para el nombre -->
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" required>
                        </div>
                        <!-- Campo para el equipo_id -->
                        <div class="form-group">
                            <label for="equipo">Equipo:</label>
                            <select name="equipo_id" id="equipo" class="form-control" required>
                                @foreach($equipos as $equipo)
                                <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Campo para el cargo -->
                        <div class="form-group">
                            <label for="cargo">Cargo:</label>
                            <input type="text" name="cargo" id="cargo" class="form-control">
                        </div>
                        <!-- Campo para el teléfono -->
                        <div class="form-group">
                            <label for="telefono">Teléfono:</label>
                            <input type="text" name="telefono" id="telefono" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endrole

    <div class="mt-3">
        <div class="row row-cols-1 row-cols-md-4">
            @forelse ($staff as $persona)
            <div class="col mb-4">
                <div class="card border-primary rounded shadow">
                    <!-- Asegúrate de que la ruta de la imagen esté correctamente formateada -->
                    <img src="{{ asset('storage/' . $persona->imagen) }}" alt="{{ $persona->nombre }}"
                        class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $persona->nombre }}</h5>
                        <p class="card-text">{{ $persona->cargo }}</p>
                        <!-- ... otros datos ... -->

                        @role('admin')
                        <button class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#editModal{{ $persona->id }}">Editar</button>
                        <form action="{{ route('staff.destroy', $persona->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('¿Estás seguro que deseas eliminar este miembro?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>

                        <div class="modal fade" id="editModal{{ $persona->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Editar Miembro</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('staff.update', $persona->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="nombre">Nombre:</label>
                                                <input type="text" name="nombre" id="nombre" class="form-control"
                                                    value="{{ $persona->nombre }}" required>
                                            </div>
                                            <!-- ... otros campos ... -->
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endrole
                    </div>
                </div>
            </div>
            @empty
            <p class="mt-3">No hay personal de staff registrado.</p>
            @endforelse
        </div>
    </div>
</div>

@section('styles')
<style>
/* ... estilos adicionales si es necesario ... */
</style>
@endsection