<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    protected $table = 'categoria';
  protected $primarykey= 'id';
   protected $filltable=['nombre','descripcion','condicion'];
  
  //metodo que hace la relacion de uno a muchos de categoria a articulo, una categoria tiene varios articulos
  
  public function articulos(){
    return $this->hasMany('App\Articulo');
  }
}
