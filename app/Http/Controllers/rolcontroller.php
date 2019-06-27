<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//IMPORTANTE ACTUALIZÆR LA REFERENCIA DEL CONTROLADOR!!!!!!
use App\Rol;

class rolcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index()
    {
      //SE listan todos los registros de la tabla categoria
      $rol = Rol::all();
      return $rol;
    }
  
    public function store(Request $request)
    {
        //Instancia que sirve para acceder a cada una de las propiedades de la clase categoria para guardar datos del objeto Request
     // if (!$request->ajax()) return redirect('/'); 
        $rol = new Rol();
        $rol->nombre = $request->nombre;
        $rol->descripcion = $request->descripcion;
        $rol->estado = '1';
        $rol->save();
    }
    
   
    public function update(Request $request)
    {
        //
       // if (!$request->ajax()) return redirect('/');
      //Instancia que sirve para acceder a cada una de las propiedades de la clase categoria para actualizær datos del objeto Request
      //todo esto mediante el id que se envie por el metodo POST de la pagina
        $rol = Rol::findOrFail($request->id);
         $rol->nombre = $request->nombre;
        $rol->descripcion = $request->descripcion;
       $rol->estado = '1';
        $rol->save();
    }
  
    public function desactivar(Request $request)
    {
        //Esta funcion permite desactivar los campos de tal manera que cuando se quiera borrar un dato dela base de datos, no se borre y solo se evite mostrar
      //en la tabla
     // if (!$request->ajax()) return redirect('/');
        $rol = Rol::findOrFail($request->id);
        $rol->estado = '0';
        $rol->save();
    }
  
  
    public function activar(Request $request)
    {
        //Contrario a la funcion desactivar, este hace que cierta fila de la tabla se vuelva a mostrar
      //if (!$request->ajax()) return redirect('/');
         
        $rol = Rol::findOrFail($request->id);
        $rol->estado = '1';
        $rol->save();
    }
   
}
