<?php

namespace App\Clases;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImgToData{

    /**
     * file $request->file('nom_pdf') que es del tipo Objeto 
     * 
     */
    static function img_a_base64(object $file){

        $starttailimg = "data:image/svg+xml;base64,"; // tail pdf
        $base64 = $starttailimg.base64_encode( file_get_contents($file) );
        return $base64;

    }

}  
