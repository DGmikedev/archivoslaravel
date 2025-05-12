<?php

namespace App\Http\Controllers;

use App\Clases\websecurity\EncriptadorArchivos;
use App\Clases\websecurity\DesencriptadorArchivos;


use Illuminate\Http\Request;

class EncripterController extends Controller
{

    public function encriptacion(){

        $nombre_original = "archivo.xml";
        $nombre_cifrado = "encriptacion/llavesServ198.enc";
        $enc = EncriptadorArchivos::encriptacion($nombre_original, $nombre_cifrado);
        
        return $enc;

    }

    public function desencriptacion(){ 

        $nombre_encriptado = "encriptacion/llavesServ198.enc";
        $nombre_desencriptado = "llavesServ198.xml";
        $enc = DesencriptadorArchivos::desencriptacion($nombre_encriptado, $nombre_desencriptado);

        return $enc;

    }
    
}
