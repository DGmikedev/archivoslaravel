<?php

namespace App\Clases\TcpdfClases;
use TCPDF;

class TCPDFFactura extends TCPDF
{

    public function __construct($orientation='P', $unit='mm', $format='legal', $unicode=true, $encoding='UTF-8', $diskcache=false, $pdfa=false){
        parent::__construct($orientation, $unit, $format, $unicode, $encoding, $diskcache, $pdfa);
    }

    // FUCNIÓN QUE GENERE EL ENCABEZADO EN EL DOCUMENTO
    public function Header() {


        //////    SE INSERTA LA MAGEN DE MARCA DE AGUA DEL DOCUMENTO    //////////////////////////
        
        // SE TRAE LA IMAGEN QUE FUNGIRÁ COOMO MARCA DE AGUA
        $marca_agua = asset('imgs/logo_mdg.png');
        
        // BAJA LA OPACIDAD DE 0 A 1 DONDE 0 ES TRANSPARENTE Y 1 ES OPACO EN EL DOC
        $this->SetAlpha(0.04); 
        
        // SE INSERTA LA IMAGEN CON EL ALPHA REDUCIDO POR ENDE LA IMAGEN SE PONDRÁ SEMITRANSPARENTE
        $this->Image($marca_agua, 15, 120, 180, 0, '', '', '', false, 300);
        
        // RESTAURA LA OPACIDAD DE NUEVO A 1
        $this->SetAlpha(1); 

        /////////////////////////////////////////////////////////////////////////////////////////////


        // SE EDITA EL CONTENIDO DEL ENCABEZADO  ///////////////////////////////////////////////////

        // SE INVOCAN LAS IMAGENES DEL  ENCABEZADO

        // LOGOTIPO IZQUIERDO
        $logo1 = asset('imgs/logo_mdg.png'); 
        $this->Image($logo1, 10, 12, 56, '', 'PNG', '', 'T', false, 300);

        // LOGOTIO DERECHO
        // $logo2 = asset('imgs/logo2.png'); 
        //$this->Image($logo2, 43, 10, 30, '', 'PNG', '', 'T', false, 300);

        // TRANSPARENTA LA LINEA SEPARADORA 
        $this->SetAlpha(0.3); 

        // RESTAURA LA TRANSPARENCIA
        $this->SetAlpha(1); 

        // SE AJUSTA EL EJE Y Y SE PINTA LA LEYENDA CENTRAL DEL ENCABEZADO
        $this->SetY(10);

        $header = view('TcpdfViews.factura.header')->render();

        $this->writeHTMLCell(0, 15, '', '', $header, 0, 1, 0, true, '', false);

        // SUBRAYADO 
        $this->SetLineWidth(0.3);
        $this->Line(10, 35, 200, 35); 

        //////////////////////////////////////////////////////////////////////////////////////////

        // FIN DEL ENCABEZADO

    }  

    // FUCNIÓN QUE GENERE EL PIE DE PAGINA EN EL DOCUMENTO
    public function Footer() {

        // AJUSTA LA POSCICIÓN DE Y 15 mm SEPARADA DEL PISO DEL DOCUEMNTO
        $this->SetY(-20);

        // SUBRAYADO 
        $this->SetLineWidth(0.3);
        $this->Line(20, 275, 200, 275); 
        
        // SE AJUSTA LA FUNETE
        $this->SetFont('helvetica', '', 8);


        $footerHtml = view('TcpdfViews.factura.footer')->render();

        // SE IMPRIME EL NUMERO DE PÁGINA
        $this->writeHTMLCell(0, 15, '', '', $footerHtml, 0, 1, 0, true, '', false);

        
        // $this->Cell(0, 10, $this->getAliasNumPage(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }


    public function genera_factura(){
            //  SE AJUSTAN LAS VARIABLES DE INFORMACIÓN DEL DOCUMENTO
            $this->SetCreator(PDF_CREATOR);
            $this->SetAuthor('MIKE DG');
            $this->SetTitle('FACTURA');
            $this->SetSubject('FACTURA DG34MDCV567');
            $this->SetKeywords('FACTURA, XML');
    
    
            $this->SetFont('dejavusans', 'B', 20, '', true);
    
            // SE AJUSTA POR DEAFULT LA FUENTE MONOESPACIADA
            $this->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    
            // SE AJUSTAN LOS MARGENES DEL DOCUMENTO
            // LEFT->15, TOP->40, RIGHT->15
            $this->SetMargins(10, 40, 10);
    
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
            $this->SetFont('helvetica', '', 8);
    
            // ADJUNTAMOS LA PRIMERA PÁGINA
            $this->AddPage();
    
            // SE AJUSTA EL CONTENIDO A IMPRIMIR

            $this->SetY(37);


            // tabla de cliente
            $html = view('TcpdfViews.factura.cliente')->render();
            $this->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', false);

            // separador
            $this->Cell(0, 0, '', 0, 1, 'R', 0, '', 0);

            // Tabla de cfdi
            $html = view('TcpdfViews.factura.cfdi')->render();
            $this->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', false);

            // separador
            $this->Cell(0, 0, '', 0, 1, 'R', 0, '', 0);

            $html = view('TcpdfViews.factura.body')->render();
            $this->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', false);
    
            // separador
            $this->Cell(0, 0, '', 0, 1, 'R', 0, '', 0);
    
            // SE CIERRA EL DOCUMENTO Y SACA EL DOCUMENTO
    
            
            //////////////////////////////////////////////////////////////////////



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


