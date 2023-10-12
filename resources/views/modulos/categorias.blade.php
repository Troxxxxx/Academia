@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper" style="min-height: 1058.31px;">
  
  <!-- Content Header (Page header) -->
  <section class="content-header">
      
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Módulo Categorías</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio" style="color: blue;"><i class="nav-icon fas fa-home"></i>&nbsp;Inicio</a></li>
              <li class="breadcrumb-item active">Categorías</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      
      <div class="card-header">

          <div class="box-header with-border">
              <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
            
                <b>Crear Categoria</b>

              </button>
          </div>

          <br>

        <h3 class="card-title">Categorias Registradas</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
        </div>

      </div>

      <div class="card-body">
        
        <div style="width: 100%; display: flex; justify-content: center;">
        <div class="dt-buttons btn-group" style="text-align: center;">          
            <button class="btn btn-default buttons-print text-uppercase" tabindex="0" aria-controls="user-group-list" type="button" title="Imprimir" onclick="window.print();"><span><i class="fa fa-print"></i></span></button>

            <button class="btn btn-default buttons-copy buttons-html5 text-muted" tabindex="0" aria-controls="user-group-list" type="button" title="Copiar"><span><i class="fa fa-copy"></i></span></button> 

            <button type="submit" id="export_data" name="Exportexcel" class="btn btn-default buttons-excel buttons-html5 text-success" tabindex="0" aria-controls="user-group-list" type="button" title="Exportar a Excel"><span><i class="fa fa-file-excel"></i></span></button> 

            <a class="btn btn-default buttons-pdf buttons-html5 text-danger" tabindex="0" aria-controls="user-group-list" type="button" title=" Exportar a PDF" href="{{ route('modulos.pdf')  }}"><span><i class="fa fa-file-pdf"></i></span></a> 

            <button id="email-btn" class="btn btn-default buttons-email text-primary" tabindex="0" aria-controls="invoice-invoice-list" type="button" title="Email"><span><i class="fa fa-envelope"></i></span></button>
          </div>
        </div>
      
        <br>
      
        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nombre Categoría</th>
              <th>Estado</th>
              <th>Acción</th>
            </tr>
          </thead>
            <tbody>

            @php($i = 1)
              @foreach($categDatos as $item )
                <tr>
                  <td> {{ $i++}} </td>
                  <td> {{ $item->NombreCategoria}} </td>
              @if($item->estado_id == 1)
                  <td>
                    <button class="btn btn-success btn-sm btnActivar">Activo</button>
                  </td>
              @else
                  <td>
                  <button class="btn btn-danger btn-sm btnActivar">Inactivo</button>
                  </td>
              @endif
                  <td>
                  <button type="button" class="btn btn-info sm" title="Editar Categoría" data-toggle="modal" data-target="#modalEditarCategoria" id="{{
                    $item->id }}" onclick="editarCategoria(this.id)" >
                   <i class="fas fa-edit"></i>
                  </button>
                  <a href="{{ route('eliminar.categoria', $item->id) }}" class="btn btn-danger sm" title="Eliminar Categoría" id="delete"> <i class="fas
                    fa-trash-alt"></i> </a>
                </td>
              </tr>
              @endforeach


            </tbody>
        </table>
        
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <!--Footer-->
      </div>
        <!-- /.card-footer-->

    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->

</div>

<!--=====================================
              MODAL NUEVA CATEGORIA
              ======================================-->


<div id="modalAgregarCategoria" class="modal fade" role="dialog">
                
                <div class="modal-dialog">

                  <div class="modal-content">

                  <form method="post" action="{{ route('guardar.categoria') }}" >
                    @csrf
                      <!--=====================================
                      CABEZA DEL MODAL
                      ======================================-->

                        <div class="modal-header" style="background:blue; color:white;">
                          <h4 class="modal-title">
                            <span class="fas fa-layer-group"></span> Agregar Categoría
                          </h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="color:white;">&times;</span>
                          </button>
                        </div>

                      <!--=====================================
                      CUERPO DEL MODAL
                      ======================================-->

                      <div class="modal-body">

                        <div class="box-body">

                          <!-- ENTRADA PARA EL NOMBRE -->
                          
                          <div class="form-group">

                            <label for="inputName" class="control-label">Nombre Categoría</label>

                            <div>
                            <input type="hidden" id="tenants_id" name="tenants_id" value="{{ $tenant->id }}">
                              
                            <input name="nombrecategoria" id="nombrecategoria" class="form-control" type="text" value="" required>

                            </div>

                          </div>
                          <!-- ENTRADA PARA SELECCIONAR SU ESTADO -->

                          <div class="form-group">

                              <label for="inputEstado" class="control-label">Estado</label>

                              <div>
                                  
                                <select class="form-select input-lg" name="estado_id" id="estado_id" required>
                                          
                                  <option value="" >Selecionar Estado</option>
                                    @foreach($estados as $data)
                                  <option value="{{$data->id}}">{{$data->NombreEstado}}</option>
                                    @endforeach
                                </select>

                              </div>

                          </div>
                        </div>

                      </div>

                      <!--=====================================
                      PIE DEL MODAL
                      ======================================-->

                      <!-- Modal footer -->
                      <div class="modal-footer d-flex justify-content-between">

                        <div>
                          <!--<button type="submit" class="btn btn-primary">Guardar Datos</button> -->
                          <input type="submit" class="btn btn-primary waves-effect waves-light" value="Guardar Datos">
                          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                        </div>
                      </div>

                    </form>

                  </div>

                </div>

              </div>  <!-- FIN VENTANA MODAL CREAR CATEGORIA -->






<!--=====================================
MODAL EDITAR CATEGORIA
======================================-->

<div id="modalEditarCategoria" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

    <form method="post" action="{{ route('modificar.categoria') }}" >
      @csrf

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#5955CC; color:white;">
            <h4 class="modal-title">
              <span class="fas fa-id-card"></span> Actualizar Datos de Usuario
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" style="color:white;">&times;</span>
            </button>
          </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
                            
            <div class="form-group">

              <label for="inputName" class="control-label">Nombre Categoría</label>

              <div>
                <input type="hidden" id="editarId" name="id">
                
                <input type="hidden" id="editarTenant" name="tenants_id">
                  
                <input name="NombreCategoria" id="editarNombre" class="form-control" type="text" required>

              </div>

            </div>

              <!-- ENTRADA PARA SELECCIONAR SU ESTADO -->

              <div class="form-group">

                <label for="inputEstado" class="control-label">Estado</label>
                <input type="hidden" id="editarEstado" name="estado_id">
                <div>
                    
                  <select class="form-select input-lg" name="estado_id" id="editarEstado" required>
                            
                    <option value="" >Selecionar Estado</option>
                      @foreach($estados as $data)
                    <option value="{{$data->id}}" @if ($data->id == $item->estado_id) {{ 'selected' }} @endif> {{$data->NombreEstado}} </option>
                      @endforeach
                  </select>

                </div>

              </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <!-- Modal footer -->
        <div class="modal-footer d-flex justify-content-between">

          <div>
            <button type="submit" class="btn btn-primary">Guardar Datos</button>
            <!--<input type="submit" class="btn btn-primary waves-effect waves-light" value="Guardar Datos"> -->
            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
          </div>
        </div>

      </form>

    </div>

  </div>

</div>

<!-- CREAMOS UNA FUNCION JAVASCRIPT PARA EDITAR LA CATEGORIA DESDE EL MODAL-->
<script type="text/javascript">
    
    //Funcion para editar el id
    function editarCategoria(id){
      $.ajax({
        type: 'GET',
        url: '/modulo/categorias/'+id,
        dataType: 'json',
        success:function(data){
         //console.log(data)
          $('#editarId').val(data.id);
          $('#editarNombre').val(data.NombreCategoria);
          $('#editarTenant').val(data.tenants_id);
          $('#editarEstado').val(data.estado_id);
          $('#editarFecha').val(data.updated_at);
        } 
      })
    }

</script>




<!-- CREAMOS UNA FUNCION JAVASCRIPT PARA EDITAR LA CATEGORIA DESDE EL MODAL-->


@endsection