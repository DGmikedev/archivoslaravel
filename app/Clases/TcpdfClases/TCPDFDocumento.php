<?php

namespace App\Clases\TcpdfClases;
use TCPDF;

class TCPDFDocumento extends TCPDF
{
    
    function __construct( $orientation='P', $unit='mm', $format='legal', $unicode=true, $encoding='UTF-8', $diskcache=false, $pdfa=false){
        parent::__construct($orientation, $unit, $format, $unicode, $encoding, $diskcache, $pdfa);
    }

    
    // FUCNIÓN QUE GENERE EL ENCABEZADO EN EL DOCUMENTO
    public function Header() {

        
        
        //////    SE INSERTA LA MAGEN DE MARCA DE AGUA DEL DOCUMENTO    //////////////////////////
        
        // SE TRAE LA IMAGEN QUE FUNGIRÁ COOMO MARCA DE AGUA
        $logo = asset("imgs/gobEdoMexLogo.png");
        
        // BAJA LA OPACIDAD DE 0 A 1 DONDE 0 ES TRANSPARENTE Y 1 ES OPACO EN EL DOC
        $this->SetAlpha(0.3); 
        
        // SE INSERTA LA IMAGEN CON EL ALPHA REDUCIDO POR ENDE LA IMAGEN SE PONDRÁ SEMITRANSPARENTE
        $this->Image($logo, 15, 100, 180, 0, '', '', '', false, 300);
        
        // RESTAURA LA OPACIDAD DE NUEVO A 1
        $this->SetAlpha(1); 

        /////////////////////////////////////////////////////////////////////////////////////////////





        // SE EDITA EL CONTENIDO DEL ENCABEZADO  ///////////////////////////////////////////////////

        // SE INVOCAN LAS IMAGENES DEL  ENCABEZADO
        $escudo = asset("imgs/gobEdoMexEscudo.png");
        $logo   = asset("imgs/gobEdoMexLogo.png");

        // LOGOTIPO IZQUIERDO
        $this->Image($escudo, 10, 10, 30, '', 'PNG', '', 'T', false, 300);

        // LOGOTIO DERECHO
        $this->Image($logo, 43, 10, 30, '', 'PNG', '', 'T', false, 300);

        // TRANSPARENTA LA LINEA SEPARADORA 
        $this->SetAlpha(0.3); 

        // SE CRA UNA LINEA PARA SEPARAR LOS LOGOTIPOS
        // p1(x   y) p2( x   y )  p1----------------p2
        $this->Line(42, 10,   42, 23 );

        // RESTAURA LA TRANSPARENCIA
        $this->SetAlpha(1); 

        // SE AJUSTA EN EL EJE Y
        $this->SetY(25);

        // SE CREA SCRIPT DE HTML PARA RENDERIZAR EN EL DOCUMENTO
        // <<<EOD  FUNGE COMO MANEJADOR DE STRINGS, ES IMPORTANTE EL IDENTADO EN LA VARIABLE
$html = <<<EOD
<table><tr><td style="text-align:center;">
"<span style="color: #751a1a ;" >2024</span> Año del Bicentenario de la erección del Estado Libre <br> y Soberano de México"
</td></tr></table>
EOD;
        
        // SE ESCRIBE EL HTML
        $this->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, 'C', true);

        // SE AJUSTA LA FUENTE PARA LA LEYENDA CENTRAL
        $this->SetFont('helvetica', 'B', 12);
        
        // SE AJUSTA EL EJE Y Y SE PINTA LA LEYENDA CENTRAL DEL ENCABEZADO
        $this->SetY(15);
        $this->Cell(0, 0, 'OFICINA DE PRENSA', 0, 1, 'C');

        // SI REQUIERE UN SUBRAYADO 
        // $this->SetLineWidth(0.3);
        // $this->Line(10, 25, 200, 25); // De izquierda a derecha

        //////////////////////////////////////////////////////////////////////////////////////////

        // FIN DEL ENCABEZADO

    }  

    // FUCNIÓN QUE GENERE EL PIE DE PAGINA EN EL DOCUMENTO
    public function Footer() {

        // SE TRAE LA IMAGEN QUE FUNGIRÁ COOMO MARCA DE AGUA INFERIOR  /////////////////////////////
        $logo = asset("imgs/listonInferiorEdoMex.png");

        // TRANSPARENTA EL ALPHA PARA QUE LA IMAGEN SEA TRANSPARENTE
        $this->SetAlpha(0.8); 

        // SE IMPRIME LA IMAGEN
        $this->Image($logo, 55, 283, 100, 0, '', '', '', false, 300);

        // RESTAURA LA OPACIDAD DE NUEVO A 1
        $this->SetAlpha(1); 

        /////////////////////////////////////////////////////////////////////////////////////////////



        // AJUSTA LA POSCICIÓN DE Y 15 mm SEPARADA DEL PISO DEL DOCUEMNTO
        $this->SetY(-15);
        
        // SE AJUSTA LA FUNETE
        $this->SetFont('helvetica', 'B', 8);

        // SE IMPRIME EL NUMERO DE PÁGINA
        $this->Cell(0, 10, $this->getAliasNumPage(), 0, false, 'R', 0, '', 0, false, 'T', 'M');

        // SE IMPRIME EL NUMERO DE PÁGINA ( $this->getAliasNumPage() )  Y EL NUMERO DE PÁGINAS TOTALES ($this->getAliasNbPages())
        //$this->Cell(0, 10, 'Página '.$this->getAliasNumPage().' de '.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }

    // FUNCIÓN QUE MANDA GENERAR EL DOCUEMNTO
    public function getDoc(){
       
        //  SE AJUSTAN LAS VARIABLES DE INFORMACIÓN DEL DOCUMENTO
        $this->SetCreator(PDF_CREATOR);
        $this->SetAuthor('MIKE DG');
        $this->SetTitle('COMUNICADO DE PRENSA');
        $this->SetSubject('COMUNCADO 04/14');
        $this->SetKeywords('TCPDF, PDF');


        $this->SetFont('dejavusans', 'B', 20, '', true);

        // DATOS DE CABECERA POR DEFAULT - SON SOBRE ESCRITOS POR LA FUNCION Header()
        //$this->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        //$this->setFooterData(array(0,64,0), array(0,64,128));

        // AJUSTE DE FUENTE DE LA CABECERA Y PIE DE PÁGINA - SON SOBRE ESCRITOS POR LAS CORRESPONDIETES FUNCIONES Header(), Footer()
        // $this->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        // $this->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // SE AJUSTA POR DEAFULT LA FUENTE MONOESPACIADA
        $this->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // SE AJUSTAN LOS MARGENES DEL DOCUMENTO
        // LEFT->15, TOP->40, RIGHT->15
        $this->SetMargins(15, 40, 15); 
        
        // AJUSTE POR DEFAULT
        //$this->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        
        // AJUSTE DE MARGENES DE CABECERA Y PIE DE PÁGINA
        // $this->SetHeaderMargin(PDF_MARGIN_HEADER);
        // $this->SetFooterMargin(PDF_MARGIN_FOOTER);

        // SE AJUSTA EL SALTO DE PÁGINA AUTOMÁTICO Y DONDE SE ACTIVA
        // EN ESTE CASO AL LLEGAR AL MARGEN INFERIOR 
        $this->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // SE AJUSTA EL RATIO DE LA ESCALA DE IMAGENES
        $this->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $this->setLanguageArray($l);
        }

        // set default font subsetting mode
        $this->setFontSubsetting(true);

        // SE AJUSTA LA FUENTE PARA EL DOCUMENTO
        $this->SetFont('helvetica', '', 12);

        // ADJUNTAMOS LA PRIMERA PÁGINA
        // TIENE ESTOS PARAMETROS POR DEFUALT: 
        // $orientation='', $format='', $keepmargins=false, $tocpage=false
        $this->AddPage();

        // EFECTO DE SOMBRA EN EL TEXTO
        // set text shadow effect
        // $this->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

        // SE AJUSTA EL CONTENIDO A IMPRIMIR
        
        // EN ESTE CASO SE RENDERIZA UNA VISTA Y SE TRAE EL CÓDIGO HTML
        $html = view("TcpdfViews.documento")->render();

        // SE AJUSTA EL EJE Y DONDE SE VA A PINTAR EN EL DOCUMENTO
        $this->SetY(38);

        // SE MANDA IMPRMIR EL CONTENIDO DE HTML              
        $this->writeHTMLCell(0, 15, '', '', $html, 0, 1, 0, true, '', false);


        // SE CIERRA EL DOCUMENTO Y SACA EL DOCUMENTO
        
        // NOMBRE SIN PATH DE GUARDADO, SOLO PARA MOSTRAR Y DESCARGAR
        $nombre = "comunicado_prensa" . date('Ymd') . "_14";
        
        $tipo = "I";
        // I:  MANDA EL ARCHIVO A EL BROWSER USARÁ EL PLUGIN DE VISOR ESTA INSTALADO EL NOMBRE AJUSTA ES EL NOMBRE QUE SE USARÁ CON LASELECCION GUARDAR COMO

        // D:  MANDA EL ARCHIVO A EL BROWSER Y FORZA SU DESCARGA CON EL NOMBRE DADO
        // FD: EQUIVALE A LAS FUNCIONES F + D ( MANDA EL ARCHIVO AL BROWSER Y FORZA SU DESCARGA )
        
        // F:  GUARDA EN EL SERVIDOR  CON EL NOMBRE DADO
        // FI: EQUIVALE A LAS FUNCIONES F + I ( MANDA EL ARCHIVO AL BROWSER Y GUARDA EN SERVIDOR ) 
        // se debe usar la siguinete ruta con el nombre ejemplo: 
        // $nombre = storage_path("app/public/pdfs/comunicado_prensa" . date('Ymd') . "_14.pdf");

        // S:  RETORNA EL DOCUEMNTO COMO UN STRING (EL NOMBRE DADO ES IGNORADO)
        // E:  RETORNA EL DOCUMENTO COMO BASE 64 COM MIME (multi-part email attachment (RFC 2045) ) 

        return $this->Output( $nombre, "I");
    }

}







