<template>
            <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Categorías
                        <button type="button" @click="abrirModal('categoria','registrar')" class="btn btn-secondary">
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control col-md-3" id="opcion" name="opcion">
                                      <option value="nombre">Nombre</option>
                                      <option value="descripcion">Descripción</option>
                                    </select>
                                    <input type="text" id="texto" name="texto" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="categoria in arrayCategoria" :key="categoria.id">
                                    <td>
                                    <!--Aqui llamamos al modal con los parametros de actualizar mandando asi tambien el objeto de la clase a modificar-->
                                        <button type="button" @click="abrirModal('categoria','actualizar',categoria)" class="btn btn-warning btn-sm">
                                          <i class="icon-pencil"></i>
                                        </button> &nbsp;
                                        
                                         <template v-if="categoria.condicion">
                                            <button type="button" class="btn btn-danger btn-sm" @click="desactivarCategoria(categoria.id)">
                                                <i class="icon-trash"></i>
                                            </button>
                                        </template>
                                    <template v-else>
                                            <button type="button" class="btn btn-info btn-sm" @click="activarCategoria(categoria.id)">
                                                <i class="icon-check"></i>
                                            </button>
                                        </template>
                                    
                                    </td>
                                    <td v-text="categoria.nombre"></td>
                                    <td v-text="categoria.descripcion"></td>
                                    <td>
                                        <div v-if="categoria.condicion">
                                            <span class="badge badge-success">Activo</span>
                                        </div>
                                        <div v-else>
                                            <span class="badge badge-danger">Desactivado</span>
                                        </div>
                                        
                                    </td>
                                </tr>                                
                            </tbody>
                        </table>
                        <nav>
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#">Ant</a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">4</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Sig</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
            
            <!--Inicio del modal agregar/actualizar-->
            
              <!--En este apartado se manda a pintar el modal,-->
            <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" v-text="tituloModal"></h4>
                            <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                                    <div class="col-md-9">
                                    
                                        <input type="text" v-model="nombre" class="form-control" placeholder="Nombre de categoría">
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Descripción</label>
                                    <div class="col-md-9">
                                    
                                        <input type="email" v-model="descripcion" class="form-control" placeholder="Ingrese descripción">
                                        
                                    </div>
                                </div>
                                <div v-show="errorCategoria" class="form-group row div-error">
                                    <div class="text-center text-error">
                                        <div v-for="error in errorMostrarMsjCategoria" :key="error" v-text="error">

                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                            <br>
                            <button type="button" v-if="tipoAccion==1" class="btn btn-primary" @click="registrarCategoria()">Guardar</button>
                           <br>
                           <button type="button" v-if="tipoAccion==2" class="btn btn-primary" @click="actualizarCategoria()">Actualizar</button>
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
</template>

<script>
    export default {
        data (){
            return {
            categoria_id:0,
                nombre : '',
                descripcion : '',
                arrayCategoria : [],
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                errorCategoria : 0,
                errorMostrarMsjCategoria : []
            }
        },
        methods : {
            listarCategoria (){
                let me=this;
                axios.get('/categoria').then(function (response) {
                    me.arrayCategoria = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            registrarCategoria(){
            //Para enviar parametros por medio del metodo POST trabajamos con axios las siguientes dependencias
            //estos deben de estar definidos en nustro archivo web.php que tenga el enlace que haga referencia al metodo store del controlador que se use en cuestion
             //CUando se realiza un insertado de datos, se espera que se cierre el modal y se actualizen los datos, por lo que 
             //se manda llamar el metodo listarcategoria para refrescar los datos
              if (this.validarCategoria()){
                    return;
                }
                
                let me = this;

                axios.post('/categoria/registrar',{
                    'nombre': this.nombre,
                    'descripcion': this.descripcion
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarCategoria();
                }).catch(function (error) {
                    console.log(error);
                });
            },
            actualizarCategoria(){
            //SE valida los campos obligatorios
             
                 //Para enviar parametros por medio del metodo POST trabajamos con axios las siguientes dependencias
            //estos deben de estar definidos en nustro archivo web.php que tenga el enlace que haga referencia al metodo store del controlador que se use en cuestion
                 
             //CUando se realiza un insertado de datos, se espera que se cierre el modal y se actualizen los datos, por lo que 
             //se manda llamar el metodo listarcategoria para refrescar los datos
                    if (this.validarCategoria()){
                    return;
                }
                
                let me = this;

                axios.put('/categoria/actualizar',{
                  'id': this.categoria_id,
                   'nombre': this.nombre,
                    'descripcion': this.descripcion
                }).then(function (response) {
                   me.cerrarModal();
                    me.listarCategoria();
                }).catch(function (error) {
                    console.log(error);
                }); 
            }, 
            desactivarCategoria(id){
               const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false,
})

swalWithBootstrapButtons.fire({
  title: 'Estas seguro de desactivar la categoria?',
 
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Aceptar',
  cancelButtonText: 'Cancelar',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
              let me = this;
                    axios.put('/categoria/desactivar',{
                        'id': id
                    }).then(function (response) {
                        me.listarCategoria();
                        swal(
                        'Desactivado!',
                        'El registro ha sido desactivado con éxito.',
                        'success'
                        )
                    }).catch(function (error) {
                        console.log(error);
                    });
                    
    
  } else if (
    // Read more about handling dismissals
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelado!',
      'No ser realizo ningun cambio',
      'error'
    )
  }
})
            },
             activarCategoria(id){
               const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false,
})

swalWithBootstrapButtons.fire({
  title: 'Estas seguro de activar la categoria?',
 
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Aceptar',
  cancelButtonText: 'Cancelar',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
              let me = this;
                    axios.put('/categoria/activar',{
                        'id': id
                    }).then(function (response) {
                        me.listarCategoria();
                        swal(
                        'Desactivado!',
                        'El registro ha sido desactivado con éxito.',
                        'success'
                        )
                    }).catch(function (error) {
                        console.log(error);
                    });
                    
    
  } else if (
    // Read more about handling dismissals
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'CAncelado',
      'No se realizo ningun cambio',
      'error'
    )
  }
})
            }
            ,
            validarCategoria(){
                this.errorCategoria=0;
                this.errorMostrarMsjCategoria =[];

                if (!this.nombre) this.errorMostrarMsjCategoria.push("El nombre de la categoría no puede estar vacío, porfavor ingrese uno.");
                
                if (!this.descripcion) this.errorMostrarMsjCategoria.push("La descripcion de la categoría no puede estar vacío, porfavor ingrese una.");

                if (this.errorMostrarMsjCategoria.length) this.errorCategoria = 1;

                return this.errorCategoria;
            },
            cerrarModal(){
                this.modal=0;
                this.tituloModal='';
                this.nombre='';
                this.descripcion='';
            },
            abrirModal(modelo, accion, data = []){
                switch(modelo){
                    case "categoria":
                    {
                        switch(accion){
                            case 'registrar':
                            {
                                this.modal = 1;
                                this.tituloModal = 'Registrar Categoría';
                                this.nombre= '';
                                this.descripcion = '';
                                this.tipoAccion = 1;
                                break;
                            }
                            case 'actualizar':
                            {
                                this.modal=1;
                                this.tituloModal="Actualizar CAtegoria";
                                this.tipoAccion=2;
                                this.nombre=data['nombre'];
                                this.categoria_id=data['id']
                                this.descripcion=data['descripcion'];
                                break;
                            }
                        }
                    }
                }
            }
        },
        mounted() {
            this.listarCategoria();
        }
    }
</script>
<style>    
    .modal-content{
        width: 100% !important;
        position: absolute !important;
    }
    .mostrar{
        display: list-item !important;
        opacity: 1 !important;
        position: absolute !important;
        background-color: #3c29297a !important;
    }
    .div-error{
        display: flex;
        justify-content: center;
    }
    .text-error{
        color: red !important;
        font-weight: bold;
    }
</style>