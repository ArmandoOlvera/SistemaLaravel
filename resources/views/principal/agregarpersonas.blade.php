@extends ('Principal')
@section ('Contenido')
<!-- Contenido Principal -->
<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="#">Admin</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="container-fluid">
      <div class="card">
        <!-- Ejemplo de tabla Listado -->
       	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
	  <div class="card">
      
      
      <div class="card-header">
        <h1>Agregar Persona</h1>
      </div>
      <div class="card-body">
         <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" placeholder="Nombre...">
            </div>
            <div class="form-group">
            	<label for="descripcion">Tipo Documento</label>
            	<input type="text" name="descripcion" class="form-control" placeholder="Descripción...">
            </div>
        
         <div class="form-group">
            	<label for="descripcion">Numero Documento</label>
            	<input type="text" name="descripcion" class="form-control" placeholder="Descripción...">
            </div>
        
        
         <div class="form-group">
            	<label for="descripcion">Direccion</label>
            	<input type="text" name="descripcion" class="form-control" placeholder="Descripción...">
            </div>
         <div class="form-group">
            	<label for="descripcion">Telefono</label>
            	<input type="text" name="descripcion" class="form-control" placeholder="Descripción...">
            </div>
         <div class="form-group">
            	<label for="descripcion">Email</label>
            	<input type="email" name="descripcion" class="form-control" placeholder="Descripción...">
            </div>
       
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
      </div>
           
 </div>
          </div>  
		</div>
	</div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>
    <!--Inicio del modal agregar/actualizar-->
    <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar categoría</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                            <div class="col-md-9">
                                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre de categoría">
                                <span class="help-block">(*) Ingrese el nombre de la categoría</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label" for="email-input">Descripción</label>
                            <div class="col-md-9">
                                <input type="email" id="descripcion" name="descripcion" class="form-control" placeholder="Enter Email">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Guardar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Fin del modal-->
    <!-- Inicio del modal Eliminar -->
    <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-danger" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar Categoría</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Estas seguro de eliminar la categoría?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-danger">Eliminar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- Fin del modal Eliminar -->
</main>
<!-- /Fin del contenido principal -->

@endsection