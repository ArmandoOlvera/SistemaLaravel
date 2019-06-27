<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    //
   protected $table = 'articulo';
  protected $primarykey= 'id';
 protected $fillable =[
        'idcategoria','codigo','nombre','precio_venta','stock','descripcion','condicion'
    ];
  
  //aqui hacemos la referencia a categorias
    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }
}
