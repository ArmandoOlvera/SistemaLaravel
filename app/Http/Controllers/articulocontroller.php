<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
class articulocontroller extends Controller
{
    //metodo que trae todos los datos
  public function index()
    {
    
      //SE listan todos los registros de la tabla categoria
      $articulo = Articulo::join('categoria','articulo.idcategoria','=','categoria.id')
       ->select('articulo.id','articulo.idcategoria','articulo.codigo','articulo.nombre','categoria.nombre as nombre_categoria','articulo.precio_venta','articulo.stock','articulo.descripcion','articulo.condicion') 
       ->get();
      return $articulo;
    }
  
  
  public function store(Request $request)
    {
        //Instancia que sirve para acceder a cada una de las propiedades de la clase categoria para guardar datos del objeto Request
     // if (!$request->ajax()) return redirect('/'); 
        $articulo = new Articulo();
        $articulo->idcategoria = $request->idcategoria;
        $articulo->codigo = $request->codigo;
        $articulo->nombre = $request->nombre;
        $articulo->precio_venta = $request->precio_venta;
        $articulo->stock = $request->stock;
        $articulo->descripcion = $request->descripcion;
        $articulo->condicion = '1';
        $articulo->save();
    }
    
   public function update(Request $request)
    {
        //
       // if (!$request->ajax()) return redirect('/');
      //Instancia que sirve para acceder a cada una de las propiedades de la clase categoria para actualizær datos del objeto Request
      //todo esto mediante el id que se envie por el metodo POST de la pagina
        $articulo = Articulo::findOrFail($request->id);
        $articulo->idcategoria = $request->idcategoria;
        $articulo->codigo = $request->codigo;
        $articulo->nombre = $request->nombre;
        $articulo->precio_venta = $request->precio_venta;
        $articulo->stock = $request->stock;
        $articulo->descripcion = $request->descripcion;
        $articulo->condicion = '1';
        $articulo->save();
    }
  
    public function desactivar(Request $request)
    {
        //Esta funcion permite desactivar los campos de tal manera que cuando se quiera borrar un dato dela base de datos, no se borre y solo se evite mostrar
      //en la tabla
     // if (!$request->ajax()) return redirect('/');
 
        $articulo = Articulo::findOrFail($request->id);
        $articulo->condicion = '0';
        $articulo->save();
    }
  
  
    public function activar(Request $request)
    {
        //Contrario a la funcion desactivar, este hace que cierta fila de la tabla se vuelva a mostrar
      //if (!$request->ajax()) return redirect('/');
         
        $articulo = Articulo::findOrFail($request->id);
        $articulo->condicion = '1';
        $articulo->save();
    }
  
  
  
  
}
