<?php

namespace App\Http\Controllers\Tcpdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Clases\TcpdfClases\TCPDFDocumento;
use App\Clases\TcpdfClases\TCPDFFactura;
use App\Clases\TcpdfClases\TCPDFReporte;
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

    public function factura(){

        $orientation='P';  
        $unit='mm'; 
        $format='letter'; 
        $unicode=true; 
        $encoding='UTF-8'; 
        $diskcache=false;
        $pdfa=false;    
     
        // DATOS DEL CUERPO DE PRODUCTOS ////////////////////////////////////////////////////////////////////////////////////////////////

        $cabezera_productos = ["Cantidad","Unidad","Id","Descripción","Valor","Importe"];

        $productos = [
            ["1", "pieza", "01010101",  "Laptop gama alta, procesador Intel i9, 64GB RAM, SSD 2TB, pantalla OLED.",   "50,000", "50,000"],
            ["2", "pieza", "43211503",  "Monitor 32' 4K UHD, panel IPS, HDR10, tiempo de respuesta 1ms.",             "10,000", "20,000"],
            ["5", "pieza", "43211706",  "Teclado mecánico RGB, switches Cherry MX, compatibilidad Windows/Mac.",      "2,000 ",	"10,000"],
            ["3", "pieza", "43211600",  "Mouse gamer ergonómico 16000DPI, conectividad inalámbrica USB-C.",           "1,500 ",	"4,500"],
            ["1", "pieza", "44102903",  "Impresora multifunción láser, conexión WiFi, AirPrint, tóner incluido.",     "8,000 ",	"8,000"],
            ["10", "pieza", "43191501", "Cable HDMI 2.1, 8K 60Hz, compatible con HDR10+ y Dolby Vision.",             "300"   , "3,000"],
            ["2", "pieza", "52161527",  "Estabilizador de corriente 1200VA, 8 salidas, protección contra picos.",     "1,200 ",	"2,400"],
            ["1", "pieza", "44111801",  "Scanner de documentos, alta velocidad, duplex automático, OCR incluido.",    "6,000 ",	"6,000"],
            ["1", "pieza", "26121601",  "Sistema de videovigilancia 8 cámaras 4K con almacenamiento en red.",         "25,000", "25,000"],
            ["2", "pieza", "43201803",  "Disco duro externo 8TB, USB 3.2, resistente a golpes y caídas.",             "4,000 ",	"8,000"],
            ["10", "pieza", "43191501", "Cable HDMI 2.1, 8K 60Hz, compatible con HDR10+ y Dolby Vision.",             "300"   , "3,000"],
            ["2", "pieza", "52161527",  "Estabilizador de corriente 1200VA, 8 salidas, protección contra picos.",     "1,200 ",	"2,400"],
            ["1", "pieza", "44111801",  "Scanner de documentos, alta velocidad, duplex automático, OCR incluido.",    "6,000 ",	"6,000"],
            ["1", "pieza", "26121601",  "Sistema de videovigilancia 8 cámaras 4K con almacenamiento en red.",         "25,000", "25,000"],
            ["2", "pieza", "43201803",  "Disco duro externo 8TB, USB 3.2, resistente a golpes y caídas.",             "4,000 ",	"8,000"],
        ];

        $pdf = new TCPDFFactura( $orientation, $unit, $format, $unicode, $encoding, $diskcache, $pdfa);

        $pdf->genera_factura($cabezera_productos, $productos);

    }


    public function reporte(){
        
        $orientation='L';  
        $unit='mm'; 
        $format='legal'; 
        $unicode=true; 
        $encoding='UTF-8'; 
        $diskcache=false;
        $pdfa=false;    

        

        $response = Http::get('http://archivoslaravel.com:8080/chart');
     
        $pdf = new TCPDFReporte( $orientation, $unit, $format, $unicode, $encoding, $diskcache, $pdfa);

        $pdf->getreporte();
        
    }

}


