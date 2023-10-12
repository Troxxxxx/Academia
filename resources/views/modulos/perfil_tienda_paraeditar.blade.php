 <!-- Instanciamos un método para que muestre al usuario del TENANAT conectado
    y nos permita editar el perfil de la TIENDA, es decir; del TENANT -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<div class="col-12 col-md-8">
	
	<div class="card card-primary card-outline">
		
		<div class="card-header">
			
			<h5 class="m-0 text-uppercase text-secondary">
				
				<strong>Actualizar datos de la Tienda</strong>

			</h5>

		</div>

		<div class="card-body">

        <h6 class="card-title">¡Modifique los datos de su Tienda!</h6>
			
		<br>
        <br>
        <br>

        <form method="" action="" enctype="multipart/form-data">
                @csrf
            <P>
			AGREGUEN aquí todos los campos para el formulario
            que serían los datos del tenant
            DEBEN AGREGAR EL CAMPO PARA EL NOMBRE DE TIENDA, el que se muestra
            es del PROPIETARIO
            </P>
			
            <div class="form-group">
				<div class="col-sm-offset-2">
                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Actualizar Perfil">
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

