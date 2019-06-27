<template>
            <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="/">Escritorio</a></li> 
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Personas
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
                                    <th>Tipo Documento</th>
                                    <th>Num Documento</th>
                                    <th>DIreccion</th>
                                    <th>Telefono</th>
                                    <th>Emai </th>
                                </tr>
                            </thead>
                            <tbody>
                              <!--Muestreo de datos de las personas-->
                                <tr v-for="persona in arrayPersona" :key="persona.id">
                                    <td>
                                    <!--Aqui llamamos al modal con los parametros de actualizar mandando asi tambien el objeto de la clase a modificar-->
                                        <button type="button" @click="abrirModal('categoria','actualizar',persona)" class="btn btn-warning btn-sm">
                                          <i class="icon-pencil"></i>
                                        </button> &nbsp;
                                     <button type="button" class="btn btn-danger btn-sm" @click="desactivarPersona(persona.id)">
                                                <i class="icon-trash"></i>
                                            </button>
                                    </td>
                                    <td v-text="persona.nombre"></td>
                                    <td v-text="persona.tipo_documento"></td>
                                    <td v-text="persona.num_documento"></td>
                                    <td v-text="persona.direccion"></td>
                                    <td v-text="persona.telefono"></td>
                                    <td v-text="persona.email"></td>
                                     
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
                                    
                                        <input type="text" v-model="nombre" class="form-control" placeholder="Nombre de la persona">
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Tipo Documento</label>
                                    <div class="col-md-9">
                                    
                                        <input type="text" v-model="tipo_documento" class="form-control" placeholder="Ingrese tipo de documento">
                                        
                                    </div>
                                </div>
                              
                              <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Numero Documento</label>
                                    <div class="col-md-9">
                                    
                                        <input type="text" v-model="num_documento" class="form-control" placeholder="Ingrese el numero de documento">
                                        
                                    </div>
                                </div>
                              
                               <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Direccion</label>
                                    <div class="col-md-9">
                                    
                                        <input type="text" v-model="direccion" class="form-control" placeholder="Ingrese la Direccion">
                                        
                                    </div>
                                </div>
                              
                               <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Numero de Telefono</label>
                                    <div class="col-md-9">
                                    
                                        <input type="text" v-model="telefono" class="form-control" placeholder="Ingrese telefono">
                                        
                                    </div>
                                </div>
                              
                               <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Email</label>
                                    <div class="col-md-9">
                                    
                                        <input type="email" v-model="email" class="form-control" placeholder="Ingrese el correo electronico">
                                        
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
                            <button type="button" v-if="tipoAccion==1" class="btn btn-primary" @click="registrarPersona()">Guardar</button>
                           <br>
                           <button type="button" v-if="tipoAccion==2" class="btn btn-primary" @click="actualizarPersona()">Actualizar</button>
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
                tipo_documento : '',
                num_documento:'',
                direccion:'',
                telefono:'',
                email:'',
                arrayPersona : [],
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                errorCategoria : 0,
                errorMostrarMsjCategoria : []
            }
        },
        methods : {
            listarPersona (){
                let me=this;
                axios.get('/persona').then(function (response) {
                    me.arrayPersona = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            registrarPersona(){
            //Para enviar parametros por medio del metodo POST trabajamos con axios las siguientes dependencias
            //estos deben de estar definidos en nustro archivo web.php que tenga el enlace que haga referencia al metodo store del controlador que se use en cuestion
             //CUando se realiza un insertado de datos, se espera que se cierre el modal y se actualizen los datos, por lo que 
             //se manda llamar el metodo listarPersona para refrescar los datos
              if (this.validarCategoria()){
                    return;
                }
                
                let me = this;

                axios.post('/persona/registrar',{ 
                   'nombre': this.nombre,
                    'tipo_documento': this.tipo_documento,
                  'num_documento': this.num_documento,
                  'direccion' : this.direccion,
                  'telefono' : this.telefono,
                  'email' : this.email
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarPersona();
                }).catch(function (error) {
                    console.log(error);
                });
            },
            actualizarPersona(){
                 //Para enviar parametros por medio del metodo POST trabajamos con axios las siguientes dependencias
            //estos deben de estar definidos en nustro archivo web.php que tenga el enlace que haga referencia al metodo store del controlador que se use en cuestion
                 
             //CUando se realiza un insertado de datos, se espera que se cierre el modal y se actualizen los datos, por lo que 
             //se manda llamar el metodo listarPersona para refrescar los datos
              
               //SE validan los campos obligatorios 
                    if (this.validarCategoria()){
                         return;
                     }
                
                let me = this;

                axios.put('/persona/actualizar',{
                  
                   'nombre': this.nombre,
                    'tipo_documento': this.tipo_documento,
                  'num_documento': this.num_documento,
                  'direccion' : this.direccion,
                  'telefono' : this.telefono,
                    'id': this.categoria_id,
                  'email' : this.email
                }).then(function (response) {
                   me.cerrarModal();
                    me.listarPersona();
                }).catch(function (error) {
                    console.log(error);
                }); 
            }, 
            desactivarPersona(id){
               const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false,
})

swalWithBootstrapButtons.fire({
  title: 'Estas seguro de BORRAR la persona?',
 
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Aceptar',
  cancelButtonText: 'Cancelar',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
              let me = this;
                    axios.put('/persona/desactivar',{
                        'id': id
                    }).then(function (response) {
                        me.listarPersona();
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
                    axios.put('/persona/activar',{
                        'id': id
                    }).then(function (response) {
                        me.listarPersona();
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

                if (!this.nombre) this.errorMostrarMsjCategoria.push("El nombre de la persona no puede estar vacío, porfavor ingrese uno.");
                
                if (!this.tipo_documento) this.errorMostrarMsjCategoria.push("EL tipo de documento de la persona no puede estar vacío, porfavor ingrese una.");

              if (!this.num_documento) this.errorMostrarMsjCategoria.push("EL numero de documento de la persona no puede estar vacío, porfavor ingrese una.");

               if (!this.direccion) this.errorMostrarMsjCategoria.push("La direccion de la persona no puede estar vacío, porfavor ingrese una.");

               if (!this.telefono) this.errorMostrarMsjCategoria.push("EL telefono   de la persona no puede estar vacío, porfavor ingrese una.");

              if (!this.email) this.errorMostrarMsjCategoria.push("EL email de la persona no puede estar vacío, porfavor ingrese una.");

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
                                this.tituloModal = 'Registrar Persona';
                                this.nombre= '';
                                this.tipo_documento = '';
                              this.num_documento = '';
                              this.telefono = '';
                              this.email = '';
                              this.direccion = '';
                                this.tipoAccion = 1;
                              this.errorMostrarMsjCategoria=[];
                               
                                break;
                            }
                            case 'actualizar':
                            {
                                this.modal=1;
                                this.tituloModal="Actualizar Persona";
                                this.tipoAccion=2;
                               this.categoria_id=data['id'];
                              console.log(data['id']);
                                 this.nombre= data['nombre'];
                                this.tipo_documento = data['tipo_documento'];
                              this.num_documento = data['num_documento'];
                              this.telefono = data['telefono'];
                              this.email = data['email'];
                              this.direccion = data['direccion'];
                              this.errorMostrarMsjCategoria=[];
                                 
                                break;
                            }
                        }
                    }
                }
            }
        },
        mounted() {
            this.listarPersona();
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