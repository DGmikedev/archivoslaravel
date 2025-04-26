<?php

namespace App\Http\Controllers\Tcpdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Clases\TcpdfClases\TCPDFDocumento;
// use TCPDF;


class TcpdfController extends Controller
{
    
    public function documento(){

        $orientation='P';  
        $unit='mm'; 
        $format='legal'; 
        $unicode=true; 
        $encoding='UTF-8'; 
        $diskcache=false;
        $pdfa=false;    
     
        $pdf = new TCPDFDocumento( $orientation, $unit, $format, $unicode, $encoding, $diskcache, $pdfa);

        $pdf->getDoc();
        
                return "Hola tcpdf!";
            }
            
}
