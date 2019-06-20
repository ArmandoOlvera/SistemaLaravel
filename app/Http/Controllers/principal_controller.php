<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\principal_controller as Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class principal_controller  extends Controller
{
    //use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
  
  //Creaciondelmetodo index
  public function index(){
    return view ('/');
  }
}
