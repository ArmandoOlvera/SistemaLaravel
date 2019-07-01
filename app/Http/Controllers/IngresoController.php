<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Ingreso;
use App\DetalleIngreso;

class IngresoController extends Controller
{
    public function index()
    {
      //SE listan todos los registros de la tabla categoria
      //Sentencia para traer a la tabla los datos de la bd
      $ingreso = Ingreso::join('persona','ingreso.idproveedor','=','persona.id')
       ->join('usuario','ingreso.idusuario','=','usuario.id')
       ->select('ingreso.id','ingreso.tipo_comprobante','ingreso.serie_comprobante','ingreso.num_comprobante',
                'ingreso.fecha_hora','ingreso.impuesto','ingreso.total_compra','ingreso.estado','persona.nombre',
                'usuario.id')->get();
      return $ingreso;
    }
  
   public function store(Request $request)
    {
        //Variable especial para hora, especificamos la zona horaria
        $mytime = Carbon::now('America/Monterrey');
        //Instancia que sirve para acceder a cada una de las propiedades de la clase categoria para guardar datos del objeto Request
     // if (!$request->ajax()) return redirect('/'); 
        $Ingreso = new Ingreso();
        $Ingreso->idproveedor = $request->idproveedor;
        $Ingreso->idusuario =1;// \Auth::user()->id;
        $Ingreso->tipo_comprobante = $request->tipo_comprobante;
        $Ingreso->serie_comprobante = $request->serie_comprobante;
        $Ingreso->num_comprobante = $request->num_comprobante;
        $Ingreso->fecha_hora = $mytime->toDateString();
        $Ingreso->impuesto = $request->impuesto;
        $Ingreso->total = $request->total_compra;
        $Ingreso->estado = 'Registrado';
        $Ingreso->save();
     
        $detalles = $request->data;//Datos de los detalles de ingreso
        foreach($detalles as $ep=>$det){
            $detalle = new DetalleIngreso();
            $detalle->idingreso = $Ingreso->idusuario;
            $detalle->idarticulo = $det['idarticulo'];
            $detalle->cantidad = $det['cantidad'];
            $detalle->precio = $det['precio'];
            $detalle->save();
        }/**/
    }
  
    public function desactivar(Request $request)
    {
        //Esta funcion permite desactivar los campos de tal manera que cuando se quiera borrar un dato dela base de datos, no se borre y solo se evite mostrar
      //en la tabla
     // if (!$request->ajax()) return redirect('/');
 
        $Ingreso = Ingreso::findOrFail($request->id);
        $Ingreso->estado='Anulado';
        $Ingreso  ->save();
    }
}
