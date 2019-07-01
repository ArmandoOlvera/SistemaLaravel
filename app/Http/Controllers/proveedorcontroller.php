<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Proveedor;
use App\Persona;
 
class proveedorcontroller extends Controller
{
     public function index()
    { 
         $persona = Proveedor::join('persona','proveedor.id','=','persona.id')
           ->select('persona.id','persona.nombre','persona.tipo_documento','persona.num_documento','persona.direccion',
                    'persona.telefono','persona.email','proveedor.contacto','proveedor.telefono_contacto')->get();
     //  $persona = Proveedor::all();
      
             return $persona; 
    }
  
    public function selectProveedor(Request $request){
        $filtro = $request->filtro;
        $proveedores = Proveedor::join('persona','proveedor.id','=','persona.id')
          ->where('persona.nombre','like','%'.$filtro.'%')
          ->orWhere('persona.num_documento','like','%'.$filtro.'%')
          ->select('persona.id','persona.nombre','persona.num_documento')
          ->get();
      
          return ['proveedores' => $proveedores];
    }
  
    public function store(Request $request)
    { 
     
          //  DB::beginTransaction();
            $persona = new Persona();
            $persona->nombre = $request->nombre;
            $persona->tipo_documento = $request->tipo_documento;
            $persona->num_documento = $request->num_documento;
            $persona->direccion = $request->direccion;
            $persona->telefono = $request->telefono;
            $persona->email = $request->email;
            $persona->save();
 
            $proveedor = new Proveedor();
            $proveedor->contacto = $request->contacto;
            $proveedor->telefono_contacto = $request->telefono_contacto;
            $proveedor->id = $persona->id;
            $proveedor->save();
 
           // DB::commit();
 
    }
    
  public function desactivar(Request $request)
    {
        //Esta funcion permite desactivar los campos de tal manera que cuando se quiera borrar un dato dela base de datos, no se borre y solo se evite mostrar
      //en la tabla
     // if (!$request->ajax()) return redirect('/');
 
        $personas = Persona::findOrFail($request->id);
        
    $personas->delete(); //DELETE OCCURS HERE AFTER RECORD FOUND
    }
      
      public function update(Request $request)
    {   
     ///   try{
     //       DB::beginTransaction(); 
            //Buscar primero el proveedor a modificar
       
            $proveedor = Proveedor::findOrFail($request->id); 
            $persona = Persona::findOrFail($proveedor->id);
 
            $persona->nombre = $request->nombre;
            $persona->tipo_documento = $request->tipo_documento;
            $persona->num_documento = $request->num_documento;
            $persona->direccion = $request->direccion;
            $persona->telefono = $request->telefono;
            $persona->email = $request->email;
            $persona->save();
 
             
            $proveedor->contacto = $request->contacto;
            $proveedor->telefono_contacto = $request->telefono_contacto;
            $proveedor->save();
 
         //   DB::commit();
 
      //  } catch (Exception $e){
       //     DB::rollBack();
       // } 
    }
}
