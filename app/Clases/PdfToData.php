<?php

namespace App\Clases;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PdfToData{

    /**
     * file $request->file('nom_pdf') que es del tipo Objeto 
     * 
     */
    static function pdf_a_base64(object $file){

        $starttailpdf = "data:application/pdf;base64,"; // tail pdf
        $base64 = $starttailpdf.base64_encode( file_get_contents($file) );
        return $base64;

    }

}  
