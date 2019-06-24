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
Route::get('/','Controller@index');

Route::get('/asd','Controller@index2');



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