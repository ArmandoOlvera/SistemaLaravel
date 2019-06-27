<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    //
    protected $table = 'rol';
  protected $primarykey= 'id';
   protected $filltable=['nombre','descripcion','estado'];
}
