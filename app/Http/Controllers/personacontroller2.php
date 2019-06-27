<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//IMPORTANTE ACTUALIZÆR LA REFERENCIA DEL CONTROLADOR!!!!!!
use App\Persona;

class personacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index()
    {
      //SE listan todos los registros de la tabla categoria
      $personas = Persona::all();
      return $personas;
    }

   
}
