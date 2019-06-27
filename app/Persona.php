<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
  protected $table = 'persona';
   protected $primarykey= 'id';
   protected $filltable=['nombre','tipo_documento','num_documento','direccion','telefono','email'];
}
