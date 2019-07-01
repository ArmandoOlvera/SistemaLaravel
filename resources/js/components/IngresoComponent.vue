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
                        <i class="fa fa-align-justify"></i> Ingresos
                        <button type="button" @click="mostrarDetalle()" class="btn btn-secondary">
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </button>
                    </div>
                    <!-- Listado -->
                    <template v-if="listado">
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
                                    <th>ID</th>
                                    <th>Proveedor</th>
                                    <th>Tipo Comprobante</th>
                                    <th>Serie Comprobante</th>
                                    <th>Numero Comprobante</th>
                                    <th>Fecha Hora</th>
                                    <th>Total</th>
                                    <th>Impuesto</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="ingreso in arrayIngreso" :key="ingreso.id">
                                    <td>
                                    <!--Aqui llamamos al modal con los parametros de actualizar mandando asi tambien el objeto de la clase a modificar-->
                                        <button type="button" @click="abrirModal('ingreso','actualizar',ingreso)" class="btn btn-success btn-sm">
                                          <i class="icon-eye"></i>
                                        </button> &nbsp;
                                        
                                         <template v-if="ingreso.estado=='Registrado'">
                                            <button type="button" class="btn btn-danger btn-sm" @click="desactivarIngreso(ingreso.id)">
                                                <i class="icon-trash"></i>
                                            </button>
                                        </template>
                                    
                                    </td>
                                    <td v-text="ingreso.id"></td>
                                    <td v-text="ingreso.nombre"></td>
                                    <td v-text="ingreso.tipo_comprobante"></td>
                                    <td v-text="ingreso.serie_comprobante"></td>
                                    <td v-text="ingreso.num_comprobante"></td>
                                    <td v-text="ingreso.fecha_hora"></td>
                                    <td v-text="ingreso.total_compra"></td>
                                    <td v-text="ingreso.impuesto"></td>
                                    <td v-text="ingreso.estado"></td>
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
                    </template>
                    <!-- Detalle -->
                    <template v-else>
                    <div class="card-body">
                        <div class="form-group row border">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="">Proveedor(*)</label>
                                    <!--<v-select :options="arrayProveedor" 
                                              label="nombre" 
                                              :on-search="selectProveedor"
                                              placeholder="Buscar proveedor..."
                                              :on-change="getDatosProveedor">
                        
                                    </v-select>-->
                                  <select class="form-control" @change="handleChange">
                                            <option value="0" disabled>Seleccione</option>
                                            <option v-for="proveedor in arrayProveedor" :key="proveedor.id" :value="proveedor.id" v-text="proveedor.nombre">
                                       </option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="">Impuesto(*)</label>
                                <input type="text" class="form-control" v-model="impuesto">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tipo Comprobante(*)</label>
                                    <select class="form-control" v-model="tipo_comprobante">
                                        <option value="0">Seleccione</option>
                                        <option value="BOLETA">Boleta</option>
                                        <option value="FACTURA">Factura</option>
                                        <option value="TICKET">Ticket</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Serie Comprobante</label>
                                    <input type="text" class="form-control" v-model="serie_comprobante" placeholder="000x">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Numero Comprobante(*)</label>
                                    <input type="text" class="form-control" v-model="num_comprobante" placeholder="000xx">
                                </div>
                            </div>
                            <div class="col-md-4">
                               <div v-show="errorIngreso" class="form-group row div-error">
                                    <div class="text-center text-error">
                                        <div v-for="error in errorMostrarMsjIngreso" :key="error" v-text="error">

                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="form-group row border">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Articulo<span style="color:red;" v-show="idarticulo==0">(*Seleccione)</span></label>
                                    <div class="form-inline">
                                        <input type="text" class="form-control" v-model="codigo" @keyup.enter="buscarArticulo()" placeholder="Ingrese articulo">
                                        <button @click="abrirModal()" class="btn btn-primary">...</button>
                                        <input type="text" readonly class="form-control" v-model="articulo">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Precio<span style="color:red;" v-show="precio==0">(*Ingrese)</span></label>
                                    <input type="number" value="0" step="any" class="form-control" v-model="precio">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Cantidad<span style="color:red;" v-show="cantidad==0">(*Ingrese)</span></label>
                                    <input type="number" value="0" class="form-control" v-model="cantidad">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <button @click="agregarDetalle()" class="btn btn-success from-control btnagregar">
                                        <i class="icon-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="table-responsive col-md-12">
                                <div class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>Opciones</th>
                                            <th>Articulo</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody v-if="arrayDetalle.length">
                                        <tr v-for="(detalle,index) in arrayDetalle" :key="detalle.id">
                                            <td>
                                                <button @click="eliminarDetalle(index)" type="button" class="btn btn-danger btn-sm">
                                                    <i class="icon-close"></i>
                                                </button>
                                            </td>
                                            <td v-text="detalle.articulo"></td>
                                            <td><input v-model="detalle.precio" type="number" class="form-control"></td>
                                            <td><input v-model="detalle.cantidad" type="number" class="form-control"></td>
                                            <td>{{detalle.precio*detalle.cantidad}}</td>
                                        </tr>
                                        <tr style="background-color: #CEECF5;">
                                            <td colspan="4" align="right">Total Parcial:</td>
                                            <td>${{totalParcial=(total-totalImpuesto).toFixed(2)}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" align="right">Total Impuesto:</td>
                                            <td>${{totalImpuesto=((total*impuesto)/(1+impuesto)).toFixed(2)}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" align="right">Total Neto:</td>
                                            <td>${{total=calcularTotal}}</td>
                                        </tr>
                                    </tbody>
                                    <tbody v-else>
                                        <tr>
                                            <td colspan="5">
                                                No hay articulos agregados
                                            </td>  
                                        </tr>
                                    </tbody>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-secondary" @click="ocultarDetalle()">Cerrar</button>
                                <button type="button" class="btn btn-primary" @click="registrarIngreso()">
                                    Registrar Compra
                                </button>
                            </div>
                        </div>
                    </div>
                    </template>
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
                            <div class="table-responsive">
                              <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Opciones</th>
                                       <th>Codigo</th>
                                        <th>Nombre</th>
                                       <th>categoria</th>
                                       <th>Precio Venta</th>
                                       <th>Stock</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="articulo in arrayArticulo" :key="articulo.id">
                                        <td>
                                        <!--Aqui llamamos al modal con los parametros de actualizar mandando asi tambien el objeto de la clase a modificar-->
                                            <button type="button" @click="agregarDetalleModal(articulo)" class="btn btn-success btn-sm">
                                              <i class="icon-check"></i>
                                            </button>

                                        </td>
                                            <td v-text="articulo.codigo"></td>
                                            <td v-text="articulo.nombre"></td>
                                            <td v-text="articulo.nombre_categoria"></td>
                                            <td v-text="articulo.precio_venta"></td>
                                            <td v-text="articulo.stock"></td>
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
                          </div>
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
           
        </main>
</template>

<script>
    import vSelect from 'vue-select'
    export default {
        data (){
            return {
                ingreso_id:0,
                id_proveedor:0,
                nombre : '',
                tipo_comprobante : 'BOLETA',
                serie_comprobante : '',
                num_comprobante : '',
                impuesto : 0.18,
                total : 0.0,
                totalImpuesto: 0.0,
                totalParcial:0.0,
                arrayIngreso : [],
                arrayDetalle : [],
                arrayProveedor : [],
                listado:1,
              
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                errorIngreso : 0,
                errorMostrarMsjIngreso : [],
                arrayArticulo: [],
                idarticulo:0,
                codigo:'',
                articulo:'',
                precio: 0,
                cantidad: 0,
            }
        },
        components:{
          vSelect  
        },
        computed:{
            calcularTotal: function(){
              var resultado = 0.0;
              for(var i=0;i<this.arrayDetalle.length;i++){
                  resultado = resultado+(this.arrayDetalle[i]['precio']*this.arrayDetalle[i]['cantidad']);
              }
              return resultado;
            }
        },
        methods : {
            listarIngreso (){
                let me=this;
                axios.get('/ingreso').then(function (response) {
                    me.arrayIngreso = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            listarArticulo (){
                let me=this;
                axios.get('/articulo').then(function (response) {
                    me.arrayArticulo = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            selectProveedor (){
                let me=this;
            
                var url = '/proveedor/selectProveedor';
              
                axios.get(url).then(function (response) {
                    var respuesta = response.data;
                    me.arrayProveedor=respuesta.proveedores;
                })
                .catch(function error(){
                    console.log(error);
                });
            },
            buscarArticulo(){
                let me=this;
                var url = '/articulo/buscarArticulo?filtro='+me.codigo;
              
                axios.get(url).then(function(response){
                    var respuesta = response.data;
                    me.arrayArticulo = respuesta.articulos;
                  
                    if(me.arrayArticulo.length>0){
                        me.articulo=me.arrayArticulo[0]['nombre'];
                        me.idarticulo=me.arrayArticulo[0]['id'];
                    }
                    else{
                        me.articulo="No existe el articulo";
                        me.idarticulo=0;
                    }
                })
                .catch(function error(){
                    console.log(error);
                });
            },
            agregarDetalle(){
                let me=this;
                if(me.idarticulo==0 || me.cantidad==0 || me.precio==0){
                   
                }
                else{
                    me.arrayDetalle.push({
                    idarticulo: me.idarticulo,
                    articulo: me.articulo,
                    cantidad: me.cantidad,
                    precio: me.precio
                    });
                  
                    me.codigo="";
                    me.idarticulo="0";
                    me.articulo="";
                    me.cantidad=0;
                    me.precio=0;
                }
                
            },
            eliminarDetalle(index){
                let me=this;
                me.arrayDetalle.splice(index,1);
            },
            agregarDetalleModal (data = []){
              
            },
            handleChange(e) {
            if(e.target.options.selectedIndex > -1) {
              this.id_proveedor = (e.target.options[e.target.options.selectedIndex].value);
            }
            },
            registrarIngreso(){
            //Para enviar parametros por medio del metodo POST trabajamos con axios las siguientes dependencias
            //estos deben de estar definidos en nustro archivo web.php que tenga el enlace que haga referencia al metodo store del controlador que se use en cuestion
             //CUando se realiza un insertado de datos, se espera que se cierre el modal y se actualizen los datos, por lo que 
             //se manda llamar el metodo listarcategoria para refrescar los datos
              if (this.validarIngreso()){
                    return;
                }
                
                let me = this;

                axios.post('/ingreso/registrar',{
                    'idproveedot': this.id_proveedor,
                    'tipo_comprobante': this.tipo_comprobante,
                    'serie_comprobante':this.serie_comprobante,
                    'num_comprobante':this.num_comprobante,
                    'impuesto':this.impuesto,
                    'total_compra':this.total,
                    'data':this.arrayDetalle
                  
                }).then(function (response) {
                    me.listarIngreso();
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
            validarIngreso(){
                this.errorIngreso=0;
                this.errorMostrarMsjIngreso =[];

                if(this.id_proveedor==0) this.errorMostrarMsjIngreso.push("Seleccione un proveedor");  
                if(this.tipo_comprobante==0) this.errorMostrarMsjIngreso.push("Seleccione comprobante");
                if(!this.num_comprobante) this.errorMostrarMsjIngreso.push("Ingrese el numero de comprobante");
                if(!this.impuesto) this.errorMostrarMsjIngreso.push("Ingrece el impuesto de compra");
                if(this.arrayDetalle.length<=0) this.errorMostrarMsjIngreso.push("Ingrese detalles");
              
                if (this.errorMostrarMsjIngreso.length) this.errorIngreso = 1;

                return this.errorIngreso;
            },
            mostrarDetalle(){
              this.listado=0;  
            },
            ocultarDetalle(){
                this.listado=1;
            },
            cerrarModal(){
                this.modal=0;
            },
            abrirModal(modelo, accion, data = []){
               
                this.modal = 1;
                this.tituloModal = 'Seleccione uno o varios articulos';
                                
            }
        },
        mounted() {
            this.listarIngreso();
            this.selectProveedor();
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
    @media (min-width: 600px){
        .btnagregar{
            margin-top: 2rem;
        }
    }
</style>