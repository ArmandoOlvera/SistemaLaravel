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
                        <i class="fa fa-align-justify"></i> Articulos
                        <button type="button" @click="abrirModal('articulo','registrar')" class="btn btn-secondary">
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
                                   <th>Codigo</th>
                                    <th>Nombre</th>
                                   <th>categoria</th>
                                   <th>Precio Venta</th>
                                   <th>Stock</th>
                                    <th>Descripción</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="articulo in arrayArticulo" :key="articulo.id">
                                    <td>
                                    <!--Aqui llamamos al modal con los parametros de actualizar mandando asi tambien el objeto de la clase a modificar-->
                                        <button type="button" @click="abrirModal('articulo','actualizar',articulo)" class="btn btn-warning btn-sm">
                                          <i class="icon-pencil"></i>
                                        </button> &nbsp;
                                        
                                         <template v-if="articulo.condicion">
                                            <button type="button" class="btn btn-danger btn-sm" @click="desactivarCategoria(articulo.id)">
                                                <i class="icon-trash"></i>
                                            </button>
                                        </template>
                                    <template v-else>
                                            <button type="button" class="btn btn-info btn-sm" @click="activarCategoria(articulo.id)">
                                                <i class="icon-check"></i>
                                            </button>
                                        </template>
                                    
                                    </td>
                                       <td v-text="articulo.codigo"></td>
                                    <td v-text="articulo.nombre"></td>
                                   <td v-text="articulo.nombre_categoria"></td>
                                     <td v-text="articulo.precio_venta"></td>
                                  <td v-text="articulo.stock"></td>
                                    <td v-text="articulo.descripcion"></td>
                                    <td>
                                        <div v-if="articulo.condicion">
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
                                    <label class="col-md-3 form-control-label" for="text-input">Nombre Articulo</label>
                                    <div class="col-md-9">
                                    
                                        <input type="text" v-model="nombre" class="form-control" placeholder="Nombre de categoría">
                                        
                                    </div>
                                </div>
                              <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Categoria</label>
                                    <div class="col-md-9">
                                    
                                     <select class="form-control" v-model="idcategoria">
                                            <option value="0" disabled>Seleccione</option>
                                            <option v-for="categoria in arrayCategoria" :key="categoria.id" :value="categoria.id" v-text="categoria.nombre">
                                       </option>
                                        </select>  
                                        
                                    </div>
                                </div>
                              <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Codigo</label>
                                    <div class="col-md-9">
                                    
                                        <input type="text" v-model="codigo" class="form-control" placeholder="Ingrese codigo">
                                        
                                    </div>
                                </div>
                             
                              
                              <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Precio Venta</label>
                                    <div class="col-md-9">
                                    
                                        <input type="number" v-model="precio_venta" class="form-control" placeholder="">
                                        
                                    </div>
                                </div>
                              
                              <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Stock</label>
                                    <div class="col-md-9">
                                    
                                        <input type="number" v-model="stock" class="form-control" placeholder="">
                                        
                                    </div>
                                </div>
                              
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Descripción</label>
                                    <div class="col-md-9">
                                    
                                        <input type="text" v-model="descripcion" class="form-control" placeholder="Ingrese descripción">
                                        
                                    </div>
                                </div>
                                <div v-show="errorArticulo" class="form-group row div-error">
                                    <div class="text-center text-error">
                                        <div v-for="error in errorMostrarMsjArticulo" :key="error" v-text="error">

                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                            <br>
                            <button type="button" v-if="tipoAccion==1" class="btn btn-primary" @click="registrarArticulo()">Guardar</button>
                           <br>
                           <button type="button" v-if="tipoAccion==2" class="btn btn-primary" @click="actualizarArticulo()">Actualizar</button>
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
              articulo_id:0,
            idcategoria:0,
                nombre_categoria : '',
              codigo:'',
              nombre:'',
              precio_venta:0,
              stock:0,
              arrayArticulo:[],
                descripcion : '', 
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                errorArticulo : 0,
                errorMostrarMsjArticulo : [],
              arrayCategoria:[]
            }
        },
        methods : {
         
            listarArticulo (){
                let me=this;
                axios.get('/articulo').then(function (response) {
                    me.arrayArticulo = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
           selectCategoria(){
             let me=this;
                axios.get('/categoria/selectCategoria').then(function (response) {
                  var respuesta= response.data;
                    me.arrayCategoria = respuesta.categorias;
                })
                .catch(function (error) {
                    console.log(error);
                });
          },
            registrarArticulo(){
            //Para enviar parametros por medio del metodo POST trabajamos con axios las siguientes dependencias
            //estos deben de estar definidos en nustro archivo web.php que tenga el enlace que haga referencia al metodo store del controlador que se use en cuestion
             //CUando se realiza un insertado de datos, se espera que se cierre el modal y se actualizen los datos, por lo que 
             //se manda llamar el metodo listarcategoria para refrescar los datos
              if (this.validarArticulo()){
                    return;
                }
                
                let me = this;

                axios.post('/articulo/registrar',{
                     'idcategoria': this.idcategoria,
                    'codigo': this.codigo,
                    'nombre': this.nombre,
                    'stock': this.stock,
                    'precio_venta': this.precio_venta,
                    'descripcion': this.descripcion
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarArticulo();
                }).catch(function (error) {
                    console.log(error);
                });
            },
            actualizarArticulo(){
            //SE valida los campos obligatorios
             
                 //Para enviar parametros por medio del metodo POST trabajamos con axios las siguientes dependencias
            //estos deben de estar definidos en nustro archivo web.php que tenga el enlace que haga referencia al metodo store del controlador que se use en cuestion
                 
             //CUando se realiza un insertado de datos, se espera que se cierre el modal y se actualizen los datos, por lo que 
             //se manda llamar el metodo listarcategoria para refrescar los datos
                    if (this.validarArticulo()){
                    return;
                }
                
                let me = this;

                axios.put('/articulo/actualizar',{
                    'idcategoria': this.idcategoria,
                    'codigo': this.codigo,
                    'nombre': this.nombre,
                    'stock': this.stock,
                    'precio_venta': this.precio_venta,
                    'descripcion': this.descripcion,
                    'id': this.articulo_id
                }).then(function (response) {
                   me.cerrarModal();
                    me.listarArticulo();
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
  title: 'Estas seguro de desactivar el articulo?',
 
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Aceptar',
  cancelButtonText: 'Cancelar',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
              let me = this;
                    axios.put('/articulo/desactivar',{
                        'id': id
                    }).then(function (response) {
                        me.listarArticulo();
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
  title: 'Estas seguro de activar el articulo?',
 
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Aceptar',
  cancelButtonText: 'Cancelar',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
              let me = this;
                    axios.put('/articulo/activar',{
                        'id': id
                    }).then(function (response) {
                        me.listarArticulo();
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
            validarArticulo(){
                this.errorArticulo=0;
                this.errorMostrarMsjArticulo =[];

                if (!this.nombre) this.errorMostrarMsjArticulo.push("El nombre del articulo no puede estar vacío, porfavor ingrese uno.");
                
                if (!this.descripcion) this.errorMostrarMsjArticulo.push("La descripcion del articulo no puede estar vacío, porfavor ingrese una.");
                
                if (this.idcategoria==0) this.errorMostrarMsjArticulo.push("El nombre de la categoría no puede estar vacío, porfavor ingrese uno.");
                
                if (!this.stock) this.errorMostrarMsjArticulo.push("El stock del articulo no puede estar vacío, porfavor ingrese una.");
                 
              if (!this.precio_venta) this.errorMostrarMsjArticulo.push("El precio de venta del articulo no puede estar vacío y debe ser numero, porfavor ingrese una.");
                
                if (this.errorMostrarMsjArticulo.length) this.errorArticulo = 1;

                return this.errorArticulo;
            },
            cerrarModal(){
                this.modal=0;
                this.tituloModal='';
              this.idcategoria=0;
              this.nombre_categoria='';
              this.codigo='';
              this.errorArticulo=0;
              this.precio_venta=0;
              this.stock=0;
                this.nombre='';
                this.descripcion='';
            },
            abrirModal(modelo, accion, data = []){
              this.selectCategoria();
                switch(modelo){
                    case "articulo":
                    {
                        switch(accion){
                            case 'registrar':
                            {
                                this.modal = 1;
                                this.tituloModal = 'Registrar Categoría';
                                this.idcategoria=0;
              this.nombre_categoria='';
              this.codigo='';
              this.errorArticulo=0;
              this.precio_venta=0;
              this.stock=0;
                this.nombre='';
                this.descripcion='';
                                this.tipoAccion = 1;
                              this.nombre_categoria='';
              this.codigo='';
              this.errorArticulo=0;
              this.precio_venta=0;
              this.stock=0;
                this.nombre='';
                this.descripcion='';
                               this.selectCategoria();
                                break;
                            }
                            case 'actualizar':
                            {
                              
                                this.modal=1;
                                this.tituloModal="Actualizar CAtegoria";
                                this.tipoAccion=2; 
                                this.articulo_id=data['id'];
                              this.idcategoria=data['idcategoria'];
                                this.codigo=data['codigo'];
                              this.stock=data['stock'];
                              this.precio_venta=data['precio_venta'];
                                  this.nombre=data['nombre'];
                                this.descripcion=data['descripcion'];
                               this.selectCategoria();
                                break;
                            }
                        }
                    }
                  
                }
               
            }
        },
        mounted() {
            this.listarArticulo();
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