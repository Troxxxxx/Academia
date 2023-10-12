@php
$id = Auth::user()->id;
$editData = App\Models\User::find($id);
@endphp

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="col-12 col-md-8">
    <div class="card card-info shadow-lg">
        <!-- Añadido shadow-lg para sombra y eliminado bg-dark -->
        <div class="card-header card-info">
            <h5 class="m-0 text-uppercase">
                <!-- Eliminado text-white -->
                <strong>Actualizar datos del Perfil</strong>
            </h5>
        </div>
        <div class="card-body">
            <!-- Eliminado bg-dark -->
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="post" action="{{ route('changedata.profile') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="inputName" class="control-label">Nombre Completo</label>
                    <div>
                        <input name="name" class="form-control" type="text" value="{{ $editData->name }}"
                            id="example-text-input">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label">Correo electrónico</label>
                    <div>
                        <input name="email" class="form-control" type="text" value="{{ $editData->email }}"
                            id="example-text-input" readonly>
                    </div>
                </div>
                @if($editData->hasRole('admin'))
                <div class="mb-3">
                    <span class="badge bg-primary">Administrador</span>
                </div>
                @endif
                <div class="form-group">
                    <label for="labelFecha" class="control-label">Fecha Creación</label>
                    <div>
                        <input name="created_at" class="form-control" type="text" value="{{ $editData->created_at }}"
                            id="example-text-input" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2">
                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Actualizar Perfil">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#image').change(function(e) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#showImage').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });
});
</script>