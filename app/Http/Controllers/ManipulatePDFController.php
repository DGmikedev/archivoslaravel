<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Clases\PdfToData;

class ManipulatePDFController extends Controller
{
    /**
     *  en el request ocupa 
     *  $request->file('pdf')
     */
    public function pdf2base64(Request $request){

        $b64 = PdfToData::pdf_a_base64($request->file('pdf'));
        
        return response()->json(['cadena64' => $b64]);

    }
}
