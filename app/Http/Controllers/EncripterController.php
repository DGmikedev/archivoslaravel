<?php

namespace App\Http\Controllers;

use App\Clases\websecurity\Encriptador;


use Illuminate\Http\Request;

class EncripterController extends Controller
{

    public function encriptacion(){

        $enc = new Encriptador();
        
        return $enc->encriptacion();

    }
    
}
