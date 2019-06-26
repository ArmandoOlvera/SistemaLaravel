<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
class categoriacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index()
    {
      //SE listan todos los registros de la tabla categoria
      $categorias = Categoria::all();
      return $categorias;
    }

   public function store(Request $request)
    {
        //Instancia que sirve para acceder a cada una de las propiedades de la clase categoria para guardar datos del objeto Request
     // if (!$request->ajax()) return redirect('/'); 
        $catgoria = new Categoria();
        $catgoria->nombre = $request->nombre;
        $catgoria->descripcion = $request->descripcion;
        $catgoria->condicion = '1';
        $catgoria->save();
    }
    
    public function update(Request $request)
    {
        //
       // if (!$request->ajax()) return redirect('/');
      //Instancia que sirve para acceder a cada una de las propiedades de la clase categoria para actualizær datos del objeto Request
      //todo esto mediante el id que se envie por el metodo POST de la pagina
        $catgoria = Categoria::findOrFail($request->id);
        $catgoria->nombre = $request->nombre;
        $catgoria->descripcion = $request->descripcion;
        $catgoria->condicion = '1';
        $catgoria->save();
    }
  
    public function desactivar(Request $request)
    {
        //Esta funcion permite desactivar los campos de tal manera que cuando se quiera borrar un dato dela base de datos, no se borre y solo se evite mostrar
      //en la tabla
     // if (!$request->ajax()) return redirect('/');
 
        $catgoria = Categoria::findOrFail($request->id);
        $catgoria->condicion = '0';
        $catgoria->save();
    }
  
  
    public function activar(Request $request)
    {
        //Contrario a la funcion desactivar, este hace que cierta fila de la tabla se vuelva a mostrar
      //if (!$request->ajax()) return redirect('/');
         
        $catgoria = Categoria::findOrFail($request->id);
        $catgoria->condicion = '1';
        $catgoria->save();
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  //  public function create()
   // {
        //
  //  }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  //  public function show($id)
   // {
        //
  //  }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 //   public function edit($id)
  //  {
        //
   // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  //  public function destroy($id)
  //  {
        //
   // }
}
