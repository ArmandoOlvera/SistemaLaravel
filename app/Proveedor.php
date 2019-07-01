<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedor'; 
     protected $primarykey= null;
    protected $fillable = [ 'id', 'contacto', 'telefono_contacto'];
 public $incrementing = false;
   public $timestamps = false;
  
    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }


}
