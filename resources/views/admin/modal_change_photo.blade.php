@php
$id = Auth::user()->id;
$editData = App\Models\User::find($id);
@endphp

<!-- The Modal -->
<div class="modal" id="cambiarFoto">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="{{ route('store.profile') }}" enctype="multipart/form-data">
                @csrf
                <!-- Modal Header -->
                <div class="modal-header" style="background:#5955CC; color:white">
                    <h4 class="modal-title">
                        <span class="fas fa-images"></span> Cambiar imagen
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color:white;">&times;</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputNegocio" class="control-label">Imagen de Perfil</label>
                        <div>
                            <input name="profile_image" class="form-control" type="file" id="image">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="labelEstado" class="control-label"> </label>
                        <div>
                            <img id="showImage" class="rounded avatar-lg" width="250px" height="250px"
                                src="{{ (!empty($editData->profile_image))? url('upload/admin_images/'.$editData->profile_image):url('upload/sinFoto.jpg') }}"
                                alt="Card image cap">
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer d-flex justify-content-between">
                    <div>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>