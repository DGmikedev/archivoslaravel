<?php

namespace App\Clases\FpdfClases;
use Fpdf\Fpdf;

class ListadoReporte extends Fpdf{

    function __construct($_orientation='P', $_unit='mm', $_size='A4'){
        parent::__construct($_orientation, $_unit, $_size);
    }

    // Cabecera de página
    function Header()
    {
        // Logo
       $this->Image( asset('/imgs/logo_mdg.png'),10,8,33);
       $this->SetFont('Arial','B',16);
        // Título
        $this->Cell(0,10,'CLIENTES OBTENIDOS EN EL SEMESTRE 2/2024','B',0,'C');
        // Salto de línea
        $this->Ln(15);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        $this->SetFont('Arial','',10);
        $this->Cell(150,10, utf8_decode('Dinseño: MDGinc. - dgmike.dev@gmail.com'),'T',0,'L');
        $this->Cell(0,10, utf8_decode('Página ').$this->PageNo().' de {nb}','T',0,'R');
    }

    function create_report($format,  $nam_cli, $clients){
        $doc = new  ListadoReporte($format[0], $format[1], $format[2]);;
        $doc->AliasNbPages();
        $doc->AddPage();
        $doc->SetFont('Arial','',9);



        $doc->SetFillColor(235, 245, 251 ); // RGB AZUL
        $doc->Cell(100,5, utf8_decode('Solicitó: Nombre de Gerente  ')  ,'TB', 0, 'L', true);
        $doc->Cell(100,5, utf8_decode('Deparatament de: Marketing - SubArrendamientos')  ,'TB', 0, 'C', true);
        $doc->Cell(0,5, utf8_decode('Fecha de creación: '). date('Y-m-d') ,'TB', 1, 'R', true);

        $doc->Ln();

        $widthCols = [12, 35, 32, 23, 23, 40, 45, 32, 32, 32, 32];  // Ancho de columnas
        $alignCols = ['C','C','C','C','C','C','C','C','C','C','C']; // Alineación de columnas encabezados

        $doc->SetFillColor(245, 203, 167); // RGB GRIS

        $doc->Cell($widthCols[0],  7,  $nam_cli[0],   1, 0,   $alignCols[0],  true);
        $doc->Cell($widthCols[1],  7,  $nam_cli[1],   1, 0,   $alignCols[1],  true);
        $doc->Cell($widthCols[2],  7,  $nam_cli[2],   1, 0,   $alignCols[2],  true);
        $doc->Cell($widthCols[3],  7,  $nam_cli[3],   1, 0,   $alignCols[3],  true);
        $doc->Cell($widthCols[4],  7,  $nam_cli[4],   1, 0,   $alignCols[4],  true);
        $doc->Cell($widthCols[5],  7,  $nam_cli[5],   1, 0,   $alignCols[5],  true);
        $doc->Cell($widthCols[6],  7,  $nam_cli[6],   1, 0,   $alignCols[6],  true);
        $doc->Cell($widthCols[7],  7,  $nam_cli[7],   1, 0,   $alignCols[7],  true);
        $doc->Cell($widthCols[8],  7,  $nam_cli[8],   1, 0,   $alignCols[8],  true);
        $doc->Cell($widthCols[9],  7,  $nam_cli[9],   1, 0,   $alignCols[9],  true);
        $doc->Cell($widthCols[10], 7, $nam_cli[10],   1, 0,  $alignCols[10],  true);
        $doc->Ln();

        $doc->SetWidths(array($widthCols[0], $widthCols[1], $widthCols[2], $widthCols[3], $widthCols[4], $widthCols[5], $widthCols[6], $widthCols[7], $widthCols[8], $widthCols[9], $widthCols[10]));
        
        $doc->SetFillColor( 253, 235, 208 );
        $c = 0;
        $color = false;
        for($i=0;$i<count($clients);$i++){
            $i%2 == 0 ?  $color =true :  $color= false;
            $doc->Row(  
                array( 
                    utf8_decode($i ) ,
                    utf8_decode($clients[$i][1] ) ,
                    utf8_decode($clients[$i][2] ) ,
                    utf8_decode($clients[$i][3] ) ,
                    utf8_decode($clients[$i][4] ) ,
                    utf8_decode($clients[$i][5] ) ,
                    utf8_decode($clients[$i][6] ) ,
                    utf8_decode($clients[$i][7] ) ,
                    utf8_decode($clients[$i][8] ) ,
                    utf8_decode($clients[$i][9] ) ,
                    utf8_decode($clients[$i][10] ) 
                ), $color
            );
        }
        return $doc->Output();
    }
}



?>