<?php

namespace App\Clases\TcpdfClases;

use App\Clases\TcpdfClases\css\Cssreporte;
use App\Clases\ChartsHighcharts\ChartsHGC;
use TCPDF;

class TCPDFReporte extends TCPDF
{

    public function __construct($orientation='P', $unit='mm', $format='legal', $unicode=true, $encoding='UTF-8', $diskcache=false, $pdfa=false){
        parent::__construct($orientation, $unit, $format, $unicode, $encoding, $diskcache, $pdfa);
        $this->css = new Cssreporte();
        
    }

        // FUCNIÓN QUE GENERE EL ENCABEZADO EN EL DOCUMENTO
        public function Header() {


            //////    SE INSERTA LA MAGEN DE MARCA DE AGUA DEL DOCUMENTO    //////////////////////////
            
            // SE TRAE LA IMAGEN QUE FUNGIRÁ COOMO MARCA DE AGUA
            $marca_agua = asset('imgs/logo_mdg.png');
            
            // BAJA LA OPACIDAD DE 0 A 1 DONDE 0 ES TRANSPARENTE Y 1 ES OPACO EN EL DOC
            $this->SetAlpha(0.05); 
            
            // SE INSERTA LA IMAGEN CON EL ALPHA REDUCIDO POR ENDE LA IMAGEN SE PONDRÁ SEMITRANSPARENTE
            $this->Image($marca_agua, 110, 120, 300, 0, '', '', '', false, 300);
            
            // RESTAURA LA OPACIDAD DE NUEVO A 1
            $this->SetAlpha(1); 
    
            /////////////////////////////////////////////////////////////////////////////////////////////
    
    
            // SE EDITA EL CONTENIDO DEL ENCABEZADO  ///////////////////////////////////////////////////
    
            // SE INVOCAN LAS IMAGENES DEL  ENCABEZADO
    
            // LOGOTIPO IZQUIERDO
            // $logo1 = asset('imgs/logo_mdg.png'); 
            // $this->Image($logo1, 20, 12, 30, '', 'PNG', '', 'T', false, 300);
    
            // LOGOTIO DERECHO
            // $logo2 = asset('imgs/logo2.png'); 
            //$this->Image($logo2, 43, 10, 30, '', 'PNG', '', 'T', false, 300);
    
            // TRANSPARENTA LA LINEA SEPARADORA 
            $this->SetAlpha(0.3); 
    
            // RESTAURA LA TRANSPARENCIA
            $this->SetAlpha(1); 
    
            // SE AJUSTA EL EJE Y Y SE PINTA LA LEYENDA CENTRAL DEL ENCABEZADO
            $this->SetY(10);

            $this->SetFont('dejavusans', '', 17, '', true);

            $header = view('TcpdfViews.reporte.header', ["css" => $this->css->estilo_header()])->render();
    
            $this->writeHTMLCell(0, 16, '', '', $header, "B", 1, 0, true, '', false);
    
            // SUBRAYADO 
            $this->SetLineWidth(0.3);
            // $this->Line(10, 35, 280, 35); 
            // $this->Ln();

            $this->SetFont('', '');
    
            //////////////////////////////////////////////////////////////////////////////////////////
    
            // FIN DEL ENCABEZADO
    
        }  
    /*
        // FUCNIÓN QUE GENERE EL PIE DE PAGINA EN EL DOCUMENTO
        public function Footer() {
    
            // AJUSTA LA POSCICIÓN DE Y 15 mm SEPARADA DEL PISO DEL DOCUEMNTO
            $this->SetY(-10);
    
            // SUBRAYADO    $this->Line(10, 35, 200, 35); 
            $this->SetLineWidth(0.3);
            $this->Line(10, 275, 200, 275); 
            
            // SE AJUSTA LA FUNETE
            $this->SetFont('helvetica', '', 8);
    
            $footerHtml = view('TcpdfViews.factura.footer')->render();
    
            // SE IMPRIME EL NUMERO DE PÁGINA
            // $this->writeHTMLCell(0, 15, '', '', $footerHtml, 0, 1, 0, true, '', false);
    
            // $this->Cell(0, 10, $this->getAliasNumPage(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
        }
*/


        public function getreporte(){
             //  SE AJUSTAN LAS VARIABLES DE INFORMACIÓN DEL DOCUMENTO
             $this->SetCreator(PDF_CREATOR);
             $this->SetAuthor('MIKE DG');
             $this->SetTitle('REPORTE VENTAS');
             $this->SetSubject('REPORTE 2024');
             $this->SetKeywords('REPORTE, VENTAS');
        
        
             $this->SetFont('dejavusans', 'B', 20, '', true);
        
             // SE AJUSTA POR DEAFULT LA FUENTE MONOESPACIADA
             $this->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        
             // SE AJUSTAN LOS MARGENES DEL DOCUMENTO
             // LEFT->15, TOP->40, RIGHT->15
             $this->SetMargins(10, 20, 10);
        
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

             $this->SetY(35);

            $this->SetFont('', '', 9, '', true);
           
            $this->Cell(0, 0, 'RESUMEN GRÁFICO DEL INFORME DE VENTAS DEL AÑO 2024 EL RESUMEN COMPLETO DE ACTIVIDADES DE DETALLA EN LAS PÁGINAS XX/XX DEL REPORTE.', '', 1, 'B', 0, '', 0);
// 
            // $this->Cell(0, 0, '', 0, 1, '', 0, '', 0);

            $grafica = asset('storage/highchartsGraficas/barra.png');
            $this->Image($grafica, 10, 40, 150, 75, 'PNG', '', '', false, 300);

              // tabla de ventas              https://api.highcharts.com/highcharts/chart.height
            
            // $html = view('TcpdfViews.reporte.ventas', ["css" => $this->css->estilo_ventas()])->render();
            // $this->writeHTMLCell(40, 50, '', '', $html, 0, 1, 0, true, '', false);

            // separador
            $this->Cell(0, 0, '', 0, 1, 'R', 0, '', 0);

            $pie_ventasname='pieventas2025';
            $pie_ventastitle='Productos Vendidos 2024';
            $pie_ventastitle_align='center';
            $pie_ventassubtitle='';
            $pie_ventasdata=[
                ['name'=> 'producto 1','y'=> 20.0],
                ['name'=> 'producto 2','y'=> 30.0],
                ['name'=> 'producto 3','y'=> 10.0],
                ['name'=> 'producto 4','y'=> 20.0],
                ['name'=> 'producto 5','y'=> 20.0],
            ]; 
            $pie_ventascolors=["#82e0aa","#58d68d","#2ecc71","#28b463","#239b56","#1d8348","#186a3b"];  
            $pie_ventassubfijo='%';

            $c = ChartsHGC::pieHGC($pie_ventasname, $pie_ventastitle, $pie_ventastitle_align, $pie_ventassubtitle,$pie_ventasdata, $pie_ventascolors,$pie_ventassubfijo);

            $c = json_decode($c);

            $grafica = asset('storage/highchartsGraficas/'.$pie_ventasname.'.png');
            $this->Image($grafica, 160, 40, 148, 75, 'PNG', '', '', false, 300);



            $colname='columndemos';
            $coltitle='Performance de oficinas de vantas 2024';
            $coltitle_align='center';
            $colsubtitle='OFICINAS DISTRIBUIDAS AL REDEDOR MULDIAL (2024)';
            $colaxisy = 'Ventas por ofcina (Millones de pesos)';
            $coldata=[ 
                    ['Tokyo', 37.33],
                    ['Delhi', 31.18],
                    ['Shanghai', 27.79],
                    ['Sao Paulo', 22.23],
                    ['Mexico City', 21.91],
                    ['Dhaka', 21.74],
                    ['Cairo', 21.32],
                    ['Beijing', 20.89],
                    ['Mumbai', 20.67],
                    ['Osaka', 19.11],
                    ['Karachi', 16.45],
                    ['Chongqing', 16.38],
                    ['Istanbul', 15.41],
                    ['Buenos Aires', 15.25],
                    ['Kolkata', 14.974],
                    ['Kinshasa', 14.970],
                    ['Lagos', 14.86],
                    ['Manila', 14.16],
                    ['Tianjin', 13.79],
                    ['Guangzhou', 13.64]
            ];
            $colcolors=[
                '#9b20d9', '#9215ac', '#861ec9', '#7a17e6', '#7010f9', '#691af3',
                '#6225ed', '#5b30e7', '#533be1', '#4c46db', '#4551d5', '#3e5ccf',
                '#3667c9', '#2f72c3', '#277dbd', '#1f88b7', '#1693b1', '#0a9eaa',
                '#03c69b',  '#00f194'
            ];

            $c = ChartsHGC::columnsHGC($colname, $coltitle, $coltitle_align, $colsubtitle, $colaxisy, $coldata, $colcolors);

            $grafica = asset('storage/highchartsGraficas/'.$colname.'.png');
            $this->Image($grafica, 10, 120, 148, 64, 'PNG', '', '', false, 300);

            $res = ChartsHGC::deletegraphHGC($pie_ventasname);
            $res = ChartsHGC::deletegraphHGC($colname);

            $this->SetFont('','', 10, 'B', true);

            $this->SetY(131);
            $this->SetX(168);
            $this->MultiCell(0, 0, 'VENTANA SUPERIOR IZQUIERDA: SE RESUMEN LAS VENTAS TRIMESTRALES DIVIDIDAS EN TRIMESTRES', '', 1);
                                
            $this->SetY(145);
            $this->SetX(168);
            $this->MultiCell(0, 0, 'VENTANA SUPERIOR DERECHA: SE RESUMEN LOS PRODUCTOS VENDIDOS POR VOLUMNEN DIVIDIDOS POR PORCENTAJES', '', 1);

            $this->SetY(159);
            $this->SetX(168);
            $this->MultiCell(0, 0, 'GRÁFICO NFERIOR IZQUIERSDO: MUESTRA LAS VENTAS POR SEDE ( ACTUALIZADAS 2024)', '', 1);



            

            


           


            













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