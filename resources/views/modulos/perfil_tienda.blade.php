@extends('admin.admin_master')
@section('admin')


<div class="content-wrapper" style="min-height: 1058.31px;">
  
  <!-- Content Header (Page header) -->
  <section class="content-header">
    
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Perfil de Tienda</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="inicio" style="color: blue;"><i class="nav-icon fas fa-home"></i>&nbsp;Inicio</a></li>
            <li class="breadcrumb-item active">Perfil Tienda</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->

  </section>

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">

      <div class="row">
        
        <!-- Muesta la sección del lado izquierdo del perfil-->
        <div class="col-12 col-md-4">

            <div class="card card-info card-outline">

                <div class="card-body box-profile">

                    <div class="text-center">
                        
                        <img class="rounded-circle avatar-xl" width="200px" height="200px" src="{{ (!empty($tenant->profile_image))? url('upload/admin_images/'.$tenant->profile_image):url('upload/sinFoto.jpg') }}" alt="Card image cap">

                    </div>	

                    <h3 class="profile-username text-center">
                        
                        Nombre de Tienda : {{ $tenant->NombreTenant }} 

                    </h3>

                    <p class="text-muted text-center">

                        Email del Propietario : {{ $tenant->CorreoTenant }} 

                    </p>

                    <p class="text-muted text-center">
                        Fecha contrato: {{ $tenant->FechaContrato }}
                    </p>
                    
                    <div class="text-center">
                        
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#cambiarFoto">Cambiar foto</button>
                        <button class="btn btn-danger float-right" disabled>Eliminar cuenta</button>

                    </div>

                </div>

                <div class="card-footer">

                    
                </div>

            </div>	
            
        </div>

        <!-- Muesta al lado derecho el formulario para editar el perfil-->

        @include('modulos.perfil_tienda_paraeditar')

     </div>

    </div>

  </section>
  <!-- /.content -->

</div>



<!--=====================================
Cambiar foto perfil
======================================
@php
  $id = Auth::user()->id;
  $editData = App\Models\User::find($id);
@endphp -->



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<!-- The Modal -->
<div class="modal" id="cambiarFoto">
  <div class="modal-dialog">
    <div class="modal-content">


    <form method="post" action="{{ route('store.profile') }}" enctype="multipart/form-data">
                @csrf

	      <!-- Modal Header -->
          <div class="modal-header" style="background:blue; color:white">
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
                
            <input name="profile_image" class="form-control" type="file"  id="image">

            </div>

            </div>



            <div class="form-group">

            <label for="labelEstado" class="control-label"> </label>

            <div>
            <img id="showImage" class="rounded avatar-lg" width="250px" height="250px" src="{{ (!empty($editData->profile_image))? url('upload/admin_images/'.$editData->profile_image):url('upload/sinFoto.jpg') }}" alt="Card image cap">

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


<!-- Script para capturar las imágenes(leerlas) y cargarlas en el objeto de imagenes -->
<script type="text/javascript">
    
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                //Se mostrará la imagen el el img con el nombre showImage
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>


@endsection 
