<?php

namespace App\Http\Controllers;

use App\Clases\websecurity\EncriptadorArchivos;
use App\Clases\websecurity\DesencriptadorArchivos;
use App\Clases\websecurity\encriptacionTexto\Encripttexto;
use App\Clases\websecurity\encriptacionTexto\Decripttexto;


use Illuminate\Http\Request;

class EncripterController extends Controller
{

    public function  decripttexto($texto_cifrado){

        $textDecr = Decripttexto::decripttexto($texto_cifrado);
        return $textDecr;
    }


    public function enctexto($texto){

        $textEncr = Encripttexto::encripttexto($texto);
        return $textEncr;
    }

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
