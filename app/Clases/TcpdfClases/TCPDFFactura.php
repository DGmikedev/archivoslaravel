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
        $this->SetAlpha(0.05); 
        
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

        // SUBRAYADO    $this->Line(10, 35, 200, 35); 
        $this->SetLineWidth(0.3);
        $this->Line(10, 275, 200, 275); 
        
        // SE AJUSTA LA FUNETE
        $this->SetFont('helvetica', '', 8);

        $footerHtml = view('TcpdfViews.factura.footer')->render();

        // SE IMPRIME EL NUMERO DE PÁGINA
        $this->writeHTMLCell(0, 15, '', '', $footerHtml, 0, 1, 0, true, '', false);

        // $this->Cell(0, 10, $this->getAliasNumPage(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }


    // Función para imprimir encabezado
    function printTableHeader($pdf, $w, $headers) {
        
        // Color de fondo en la celda
        $this->SetFillColor(234, 234, 237); 
        
        // Color del texto
        $this->SetTextColor(0);

        //Color del marco en el header #d6dbdf
        $this->SetDrawColor(214, 219, 223);  

        // Ancho de la linea
        $this->SetLineWidth(0.3);

        // Fuente por default
        $this->SetFont('', '', 7);

        for ($i = 0; $i < count($headers); ++$i) {
            $this->Cell($w[$i], 7, $headers[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        $this->SetFont('', ''); // Normal
    }


    public function genera_factura( $cabezera_productos, $productos ){
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
            $html = view('TcpdfViews.factura.scd')->render();
            $this->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', false);

            // separador
            $this->Cell(0, 0, '', 0, 1, 'R', 0, '', 0);

            // Se establcen el nombre de las columnas
            array_unshift($cabezera_productos, "Partida"); 

            // Se adiciona el numero de partida inscrito en ela factura
            for($i=0; $i<count($productos); $i++){
                array_unshift($productos[$i], $i);
            };

            // ["Partida","Cantidad","Unidad","Id","Descripción","Valor","Importe"];
            $nombres_columnas = $cabezera_productos; 

            // Ancho de cada columna
            $anchos_columnas = [10, 13, 13, 15, 88, 20, 30];

            // Alineación
            $aineacion_celdas = ["C","C", "C", "C","L", "C", "C"];

            // Altura estimada de cada fila
            $row_height = 15;

            // Imprimir encabezado inicial
            $this->printTableHeader($this, $anchos_columnas, $nombres_columnas);

            // Fuente por default
            $this->SetFont('', '');
            
            // Se recorre el array con los rows
            // foreach ($rows as $row) {
            $partida = 0;
                foreach ($productos as $row){
                // Verificar si queda espacio para la siguiente fila
                if ($this->GetY() + $row_height > ($this->getPageHeight() - $this->getBreakMargin())) {
                    // No hay espacio, salto de página
                    $this->AddPage();
                    $this->printTableHeader($this, $anchos_columnas, $nombres_columnas);
                }

                // Color de fondo
                $this->SetFillColor(255, 255, 255);  
            
                // Color del borde
                $this->SetDrawColor(214, 219, 223);  //#d6dbdf

                // Imprimir una fila
                for ($i = 0; $i < count($row); ++$i) {
                    $this->MultiCell($anchos_columnas[$i], $row_height, $row[$i], 1, $aineacion_celdas[$i], false, 0);
                }

                $partida++;
                $this->Ln();
            }

            // separador
            $this->Cell(0, 0, '', 0, 1, 'R', 0, '', 0);


            $html = view('TcpdfViews.factura.comprobante')->render();
            $this->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', false);

             // separador
             $this->Cell(0, 0, '', 0, 1, 'R', 0, '', 0);


             $html = view('TcpdfViews.factura.sellos')->render();
             $this->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', false);



            // SE CIERRA EL DOCUMENTO Y SACA EL DOCUMENTO
    
            
            //////////////////////////////////////////////////////////////////////



            // NOMBRE SIN PATH DE GUARDADO, SOLO PARA MOSTRAR Y DESCARGAR
            $nombre = "factura" . date('Ymd') . "JHB86YGY8";
            
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


