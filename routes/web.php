<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola', function () {
    return view('Hola');
});

#Nickname opcional
Route::get('/saludo/{name}/{nickname?}', function ($name,$nickname=null) {
    if($nickname){
    	return "Bienvenido: {$name}, tu apodo es: {$nickname}";
    }
    else{
    	return "Bienvenido: {$name}, tu no tienes apodo";
    }
});

#Abrimos la paltilla que importamos, Con Section y Yield
Route::get('/Principal', function () {
    return view('principal/Contenido');
});


#Nickname opcional
Route::get('/practica3/{name}', function ($name) {
    return view('practica3/'.$name);
});

#Nickname opcional
Route::get('/{name}', function ($name) {
    return view('principal/'.$name);
});
*/

//RUTA QUE NOS GUIA A LA PAGINA DE INICIO
Route::get('/','Controller@index');

//RUTA QUE NOS GUIA A LA PANTALLA DE CATEGORIAS
Route::get('/categoria','categoriacontroller@index');

//RUTA QUE HACE REFERENCIA A METODO POST DE CATEGORIAS PARA GUARDAR DATOS
Route::post('/categoria/registrar','categoriacontroller@store');


//RUTA QUE HACE REFERENCIA A METODO PUT DE CATEGORIAS PARA actualizær DATOS
Route::put('/categoria/actualizar','categoriacontroller@update');


//RUTA QUE HACE REFERENCIA A METODO PUT DE CATEGORIAS PARA actualizær DATOS y desactivar la fila
Route::put('/categoria/desactivar','categoriacontroller@desactivar');


//RUTA QUE HACE REFERENCIA A METODO PUT DE CATEGORIAS PARA actualizær DATOS y avticar la fila
Route::put('/categoria/activar','categoriacontroller@activar');


///SECCION PARA PERSONAS

//RUTA QUE NOS GUIA A LA PANTALLA DE PERSONAS
Route::get('/persona','personacontroller@index');


//RUTA QUE HACE REFERENCIA A METODO POST DE PERSONAS PARA GUARDAR DATOS
Route::post('/persona/registrar','personacontroller@store');


//RUTA QUE HACE REFERENCIA A METODO PUT DE PERSONAS PARA actualizær DATOS
Route::put('/persona/actualizar','personacontroller@update');


//RUTA QUE HACE REFERENCIA A METODO PUT DE PERSONAS PARA actualizær DATOS y desactivar la fila
Route::put('/persona/desactivar','personacontroller@desactivar');


//RUTA QUE HACE REFERENCIA A METODO PUT DE PERSONAS PARA actualizær DATOS y avticar la fila
//Route::put('/persona/activar','personacontroller@activar');



///SECCION PARA ROLES

//RUTA QUE NOS GUIA A LA PANTALLA DE roles
Route::get('/rol','rolcontroller@index');


//RUTA QUE HACE REFERENCIA A METODO POST DE roles PARA GUARDAR DATOS
Route::post('/rol/registrar','rolcontroller@store');


//RUTA QUE HACE REFERENCIA A METODO PUT DE roles PARA actualizær DATOS
Route::put('/rol/actualizar','rolcontroller@update');


//RUTA QUE HACE REFERENCIA A METODO PUT DE roles PARA actualizær DATOS y desactivar la fila
Route::put('/rol/desactivar','rolcontroller@desactivar');


//RUTA QUE HACE REFERENCIA A METODO PUT DE roles PARA actualizær DATOS y avticar la fila
Route::put('/rol/activar','rolcontroller@activar');



//SECCION PARA ARTICULOS

//RUTA QUE NOS GUIA A LA PANTALLA DE ARTICULOS
Route::get('/articulo','articulocontroller@index');


//RUTA QUE HACE REFERENCIA A METODO POST DE ARTICULOS PARA GUARDAR DATOS
Route::get('/articulo/buscarArticulo','articulocontroller@buscarArticulo');

//RUTA QUE HACE REFERENCIA A METODO POST DE ARTICULOS PARA GUARDAR DATOS
Route::post('/articulo/registrar','articulocontroller@store');

//RUTA QUE HACE REFERENCIA A METODO POST DE ARTICULOS PARA GUARDAR DATOS
Route::post('/articulo/listarArticulo','articulocontroller@listarArticulo');


//RUTA QUE HACE REFERENCIA A METODO PUT DE ARTICULOS PARA actualizær DATOS
Route::put('/articulo/actualizar','articulocontroller@update');


//RUTA QUE HACE REFERENCIA A METODO PUT DE ARTICULOS PARA actualizær DATOS y desactivar la fila
Route::put('/articulo/desactivar','articulocontroller@desactivar');


//RUTA QUE HACE REFERENCIA A METODO PUT DE ARTICULOS PARA actualizær DATOS y avticar la fila
Route::put('/articulo/activar','articulocontroller@activar');



//RUTA QUE NOS da los datos de las categorias existentes
Route::get('/categoria/selectCategoria','categoriacontroller@selectCategoria');


///SECCION PARA PROVEEDORES

//RUTA QUE NOS GUIA A LA PANTALLA DE PROVEEDORES
Route::get('/proveedor','proveedorcontroller@index');

//RUTA QUE NOS OBTIENE LOS DATOS DE PROVEDORES PARA LAS VENTAS
Route::get('/proveedor/selectProveedor','proveedorcontroller@selectProveedor');


//RUTA QUE HACE REFERENCIA A METODO POST DE PROVEEDORES PARA GUARDAR DATOS
Route::post('/proveedor/registrar','proveedorcontroller@store');


//RUTA QUE HACE REFERENCIA A METODO PUT DE PROVEEDORES PARA actualizær DATOS
Route::put('/proveedor/actualizar','proveedorcontroller@update');


//RUTA QUE HACE REFERENCIA A METODO PUT DE PROVEEDORES PARA actualizær DATOS y desactivar la fila
Route::put('/proveedor/desactivar','proveedorcontroller@desactivar');


//RUTA QUE HACE REFERENCIA A METODO PUT DE PROVEEDORES PARA actualizær DATOS y avticar la fila
//Route::put('/persona/activar','personacontroller@activar');

//SECCION PARA INGRESOS
//RUTA QUE NOS GUIA A LA PANTALLA DE INGRESOS
Route::get('/ingreso','IngresoController@index');

//RUTA QUE HACE REFERENCIA A METODO POST DE INGRESOS PARA GUARDAR DATOS
Route::post('/ingreso/registrar','IngresoController@store');

//RUTA QUE HACE REFERENCIA A METODO PUT DE INGRESOS PARA actualizær DATOS y desactivar la fila
Route::put('/ingreso/desactivar','IngresoController@desactivar');

////Otras rutas no importantes..../////
Route::get('/Principal', function () {
    return view('principal/Contenido');
});

#Nickname opcional
Route::get('/{name}', function ($name) {
    return view('principal/'.$name);
});

Route::get('/practica3/{name}', function ($name) {
    return view('practica3/'.$name);
});

Route::get('/chismografo', function ( ) {
    return view('chismografo/');
});

Route::get('/chismografo/{name}', function ($name) {
    return view('chismografo/'.$name);
});
