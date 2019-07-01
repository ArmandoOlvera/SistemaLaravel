<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
    protected $table = 'detalle_ingreso';
    //Variable que representa los valores de la tabla
    protected $filltable=['idingreso',
                          'idarticulo',
                          'cantidad',
                          'precio'];
    public $timestamps = false;
}
