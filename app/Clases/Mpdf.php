<?php
namespace App\Clases;

use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\HeaderUtils;

class Mpdf{

    private $namepdf;
    private $view;
    private $test;
    private $options;
    private $paper;

    public function __construct(
        $name_ = "docuemnto.pdf", 
        $paper_ = ['A4', 'portrait'], 
        $view_, 
        $test_ = true, 
        $options_ = [true, true, true, false, false, false] )
    {
        $this->options = $options_;
        $this->namepdf = $name_;
        $this->view    = $view_;
        $this->paper   = $paper_;
        $this->test    = $test_;
    }

    public function generaPDF($data = ""){

        $options = new Options();

        // Habilita la ejecución de php
        $options->set('isPhpEnabled', $this->options[0]);

        // Habilita el analizador HTML5
        $options->set('isHtml5ParserEnabled', $this->options[1]);

        // Para habilitar la ejecucion de funciones para enlaces remotas
        $options->set('isRemoteEnabled', $this->options[2]); 

        // Para habilitar la ejecucion de funciones javascript
        $options->set('isJavascriptEnabled', $this->options[3]); 
        
        // Para habilitar la subconjunto de fuentes
        $options->set('isFontSubsettingEnabled', $this->options[4]); 

        // Para habilitar la interpretacion de css float
        $options->set('isCssFloatEnabled', $this->options[5]); 

        $pdf = new Dompdf($options);

        // genera la vista del path pasado por parametros
        $html =  view($this->view, compact('data'))->render();

        // carga le vista y la renderiza en un html
        $pdf->loadHtml($html);

        // ajusta el tamaño y alineación del papel

         $pdf->setPaper($this->paper[0], $this->paper[1]);

        // Renderizar el PDF
        $pdf->render(); 

        /* 
            Si true entonces se despliega en otra ventana aparate, si false 
            entonces se descarga el pdf abriendo otra ventana.
        */
        if($this->test){
            $output = $pdf->output();
            $fallback = str_replace('%', '', Str::ascii($this->namepdf));

            return new Response($output, 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => HeaderUtils::makeDisposition('inline', $this->namepdf, $fallback),
            ]);
        }else{
            return $pdf->stream($this->namepdf, array("Attachment" => 1));
        }

    }

}

?>