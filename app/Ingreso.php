<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $table = 'ingreso';//Se renombra la tabla porque es con I minuscula
    //Variable que representa todos los datos que recibiria nuestra tabla
    protected $filltable=['idproveedor',
                          'idusuario',
                          'tipo_comprobante',
                          'serie_comprobante',
                          'num_comprobante',
                          'fecha_hora',
                          'impuesto',
                          'total',
                          'estado'];
  
    public function usuario(){
       return $this->belongsTo('App\User');
    }
    public function proveedor(){
       return $this->belongsTo('App\Proveedor');
    }
}
