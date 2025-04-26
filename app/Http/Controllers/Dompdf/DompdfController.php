<?php

namespace App\Http\Controllers\dompdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Clases\Mpdf;
use Dompdf\Dompdf;
use Dompdf\Options;



class DompdfController extends Controller
{
    public function factura(){
        $pdf = new Mpdf('factura_t.pdf', ['A4', 'portrait'], 'DompdfViews.factura', true,  [true, true, true, true, true, true] );

        $titulo_factura = "OBTENER FACTURA";

        $data = [$titulo_factura];

        return $pdf->generaPDF($data);
    }

      /*
        LAS CREDENCIALES NECESITAN RECALCULO DE LAS DIMENSIONES DEL DOCUEMNTO: 

        ANCHO = 5.4 cm
        LARGO = 8.6 cm

        x           =  pts  -  Medida en que pdf mide su docuemnto
        0.03527778  =  factor de conversion pulgadas 
                            * 1 pulgada (inch) = 72 puntos (pts)
                            * 1 pulgada (inch) = 2.54 centímetros (cm)
                            * por tanto: 1pt = 72 / 2.54​cm  ≈ 0.03527778cm 
        cm´s deseados = -----¬
                            _|___
        X  *  0.03527778 = | 5.4 |  pts -> despeje -> [ X = 5.4 / 0.03527778 ] = 153.0708 pts
                           |     |
        X  *  0.03527778 = | 8.6 |  pts -> despeje -> [ X = 8.6 / 0.03527778 ] = 243.7795 pts
                           ------
    */
    public function credencial(){
                                         //width     height      portrait 
                              // $pdf->setPaper(  array(0,0, 153.0708,  243.7795 ), 'portrait');
        $credencial = new Mpdf('credencial.pdf', [array(0,0,153.0708,243.7795), 'portrait'], 'DompdfViews.credencial', true,  [true, true, true, true, true, true] );
        $data=['nombre_credencial'];
                
                        return $credencial->generaPDF($data);
    }







    public function membretada(){
        $membretada = new Mpdf('membretada.pdf', ['A4', 'letter'], 'DompdfViews.membretada', true,  [true, true, true, true, true, true] );

        $data =  Array();

        $data['titulo_pagHTML'] = "Titulo Pagina de descarga";

        $data['encabezdo'] = [ 
            'img_1' => asset('/imgs/membretada/cintillo_sup_izq.png'), 
            'img_2' => asset('/imgs/membretada/cintillo_sup_der.png'), 
            'secretaria' => 'SECRETARÍA DE GOBIERNO DIRECCIÓN GENERAL JURÍDICA Y DE ENLACE LEGISLATIVO',
            'lugar_y_fecha' => 'Ciudad de México, a 7 de septiembre de 2020',
            'oficio' => 'OFICIO NO. SG/DGJyEL/RPA/0421/2020'
        ];

        return $membretada->generaPDF($data);
    }








    /**
     * Sin usar la clase Mpdf
     */
    public function ordenpago(){

        $options = new Options();
        $options->set('isPhpEnabled', true);
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true); // Para habilitar la ejecucion de funciones para enlaces remotas
        // $options->set('isJavascriptEnabled', true); // Para habilitar la ejecucion de funciones javascript
        // $options->set('isFontSubsettingEnabled', true); // Para habilitar la subconjunto de fuentes
        // $options->set('isCssFloatEnabled', true); // Para habilitar la interpretacion de css float

        $pdf = new Dompdf($options);

        $data = [
            '_fullname'=> 'JOSÉ JESÚS MONCAYO GUTIERREZ',
            '_descservicio' => 'IE DIGITAL MODULO DE DIPLOMADO EN LÍNEA',
            '_refbancaria' => '84436055228634288157',
            '_vigenciareferencia' => '14/03/2025',
            '_folioseguimiento' => '5739Z6612',
            '_curp' => 'FGCD67UIU7HDFMTG09',
            '_emisionreferecnia' => '13/03/2025',
            '_movs' => '1',
            '_rfc' => 'REMJ670313HDFRZS09',
        ];

        $instituciones = [
            [ "BAJIO"           , "17-IMPTOS PUE"   , "NO PARTICIPA" , "$ 4.00 + IVA",  "NO PARTICIPA",  "$ 4.00 + IVA",  "$ 4.00 + IVA"],
            [ "BANCO AZTECA"    , "PUEBLA"          , "NO PARTICIPA" , "$ 10.35 + IVA", "NO PARTICIPA",  "NO PARTICIPA",  "NO PARTICIPA"],
            [ "BANORTE"         , "25162"           , "$ 6.00 + IVA" , "$ 6.00 + IVA",  "$ 6.00 + IVA",  "$ 6.00 + IVA",  "$ 6.00 + IVA"],
            [ "BBVA"            , "671517"          , "$ 0.00"       , "$ 7.76 + IVA",  "$ 6.89 + IVA",  "$ 0.00      ",  "$ 0.00"],
            [ "CITIBANAMEX (*)" , "PA:174801"       , "NO PARTICIPA" , "$ 9.50 + IVA",  "$ 0.00      ",  "$ 0.00      ",  "$ 0.00"],
            [ "HSBC"            , "7261"            , "$ 0.00"       , "$ 8.62 + IVA",  "NO PARTICIPA",  "$ 0.00      ",  "$ 0.00"],
            [ "SANTANDER"       , "4586"            , "$ 8.60 + IVA" , "$ 9.00 + IVA",  "$ 0.00      ",  "$ 0.00      ",  "$ 0.00"],
            [ "SCOTIABANK"      , "1089"            , "NO PARTICIPA" , "$ 6.00 + IVA",  "$ 7.00 + IVA",  "$ 7.00 + IVA",  "$ 7.00 + IVA"]
        ];

        // $logo_gobierno = asset('imgs/logo_puebla.png');

        $financiera =  [ "FINANCIERA BIENESTAR (TELECOMM)", "$ 4.00 + IVA por pagos con importe igual o menor a $ 267.00, en los demás casos será del 1.5 % del valor del importe más IVA."];


        $nombre_pdf = 'ORDEN_PAGO_'.$data['_curp'].'_'. date('Ymd') . '.pdf';

        $html = view('DompdfViews.ordenpago', compact("instituciones", "financiera", "data"))->render();

        $pdf->loadHtml( $html );

        $pdf->setPaper('A4', 'portrait'); // ajusta el tamaño de papel

        $pdf->render(); // 6. Renderizar el PDF

        $pdf->stream($nombre_pdf, array("Attachment" => 1)); // 7. Descargar el
    }
}
