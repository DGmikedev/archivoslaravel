<?php

namespace App\Clases\PphOffice\phpSpreadsheet;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Chart\Chart;
use PhpOffice\PhpSpreadsheet\Chart\DataSeries;
use PhpOffice\PhpSpreadsheet\Chart\DataSeriesValues;
use PhpOffice\PhpSpreadsheet\Chart\Layout;
use PhpOffice\PhpSpreadsheet\Chart\Legend;
use PhpOffice\PhpSpreadsheet\Chart\PlotArea;
use PhpOffice\PhpSpreadsheet\Chart\Title;

use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\HeaderUtils;
use Illuminate\Support\Facades\Storage;


class HojaExcel
{
    public function crearhoja($nombre, $cabeceras, $datos){

        $spreadsheet = new Spreadsheet();


         // HOJA 1
        $sheet = $spreadsheet->getActiveSheet(); 
        $sheet->setTitle('RESUMEN');

        // TITULO INICIAL

        // AJUSTA FUENTE
        $sheet->getStyle('B2')->getFont()->setSize(16)->setBold(true);

        /*
            $style = $sheet->getStyle('A1')->getFont();
            $style->setSize(16);           // Tamaño
            $style->setBold(true);         // Negrita
            $style->setItalic(true);       // Cursiva
            $style->setUnderline(true);    // Subrayado
            $style->getColor()->setRGB('FF0000'); // Color rojo
            $style->setName('Arial');      // Tipo de letra
        */

        // Combinar el bloque de celdas
        $sheet->mergeCells('B2:M4');
        // Establecer el texto en la celda combinada
        $sheet->setCellValue('B2', 'COMPORTAMIENTO DE USUARIOS');

        // Alinear el texto centrado vertical y horizontal
        $sheet->getStyle('B2')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('B2')->getAlignment()->setVertical('center');

        // Ajusta altura para más espacio
        $sheet->getRowDimension(3)->setRowHeight(60); 

                // Dibujar borde verde alrededor del bloque combinado
        $sheet->getStyle('B2:M4')->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THICK)  // Border::BORDER_MEDIUM, Border::BORDER_THICK, BORDER_THIN
            ->setColor(new Color('70BC8D'));

        ////////////////////////////////////////////////////////////////////////////

        // TABLA DE DATOS
        // ENCABEZADO TABLA
        $sheet->setCellValue('B6', 'MES');
        $sheet->setCellValue('C6', 'CANTIDAD');

        // MESE
        $sheet->setCellValue('B7', 'ENERO');
        $sheet->setCellValue('B8', 'FEBERRO');
        $sheet->setCellValue('B9', 'MARZO');
        $sheet->setCellValue('B10', 'ABRIL');
        $sheet->setCellValue('B11', 'MAYO');
        $sheet->setCellValue('B12', 'JUNIO');
        $sheet->setCellValue('B13', 'JULIO');
        $sheet->setCellValue('B14', 'AGOSTO');
        $sheet->setCellValue('B15', 'SEPTIEMBER');
        $sheet->setCellValue('B16', 'OCTUBRE');
        $sheet->setCellValue('B17', 'NOVIEMBRE');
        $sheet->setCellValue('B18', 'DICIEMBRE');

        // CANTIDAD POR MES
        $sheet->setCellValue('C7', 20);
        $sheet->setCellValue('C8', 10);
        $sheet->setCellValue('C9', 30);
        $sheet->setCellValue('C10',20);
        $sheet->setCellValue('C11',50);
        $sheet->setCellValue('C12',10);
        $sheet->setCellValue('C13',60);
        $sheet->setCellValue('C14',20);
        $sheet->setCellValue('C15',40);
        $sheet->setCellValue('C16',30);
        $sheet->setCellValue('C17',10);
        $sheet->setCellValue('C18',20);

        //////////////////////////////////////////////////////////////

        // CREAR VALORES

        // Crear valores para el eje X (categorías)
        $categories = new DataSeriesValues('String', 'Worksheet!$B$7:$B$18', null, 3);

        // Crear valores para el eje Y (valores de datos)
        $values = new DataSeriesValues('Number', 'Worksheet!$C$7:$C$18', null, 3);

        // Crear el gráfico como columnas
        $series = new DataSeries(
            DataSeries::TYPE_BARCHART,     // Tipo: columnas
            DataSeries::GROUPING_CLUSTERED, // Agrupación: agrupadas
            range(0, count([$values]) - 1),
            [],
            [$categories],
            [$values]
        );

        // invertir sentido del eje Y (vertical)
        $series->setPlotDirection(DataSeries::DIRECTION_COL);

        // Área de dibujo
        $plotArea = new PlotArea(null, [$series]);

        // Leyenda y título
        $legend = new Legend(Legend::POSITION_RIGHT, null, false);
        $title = new Title('USUARIOS');

        // Crear el gráfico
        $chart = new Chart(
            'grafico1',
            $title,
            $legend,
            $plotArea,
            true,
            0,
            null,
            null
        );

        // Establecer posición del gráfico en la hoja
        $chart->setTopLeftPosition('E6');
        $chart->setBottomRightPosition('M18');

        // Agregar gráfico a la hoja
        $sheet->addChart($chart);


        /////////// HOJA 2 //////////////////////////////////////////////////


        $sheet2 = $spreadsheet->createSheet();
        $sheet2->setTitle("USUARIOS");

        // Rellena la fila de títulos
        foreach($cabeceras as $cabecera){
            $sheet2->setCellValue($cabecera[0], $cabecera[1]);    
        }

        // Rellena las celdas 
        $fila = 2;
        foreach ($datos as $filaDatos) {
            $sheet2->setCellValue('A' . $fila, $filaDatos[0]);
            $sheet2->setCellValue('B' . $fila, $filaDatos[1]);
            $sheet2->setCellValue('C' . $fila, $filaDatos[2]);
            $sheet2->setCellValue('D' . $fila, $filaDatos[3]);
            $sheet2->setCellValue('E' . $fila, $filaDatos[4]);
            $sheet2->setCellValue('F' . $fila, $filaDatos[5]);
            $sheet2->setCellValue('G' . $fila, $filaDatos[6]);
            $sheet2->setCellValue('H' . $fila, $filaDatos[7]);
            $sheet2->setCellValue('I' . $fila, $filaDatos[8]);
            $fila++;
        }

        // Estilo de fondo rojo para la primera fila
        $sheet2->getStyle('A1:I1')->getFill()
                ->setFillType(Fill::FILL_SOLID)
                ->getStartColor()
                ->setRGB('70BC8D');

        // Color de texto blanco
        $sheet2->getStyle('A1:I1')->getFont()
                ->getColor()
                ->setRGB('000000');

        // Rellenar el color de la columna
        $sheet2->getStyle('A2:A50')->getFill()
                ->setFillType(Fill::FILL_SOLID)
                ->getStartColor()
                ->setRGB('9EE5A9');

        // Fijar la primera columna (columna A)
        // Esto congela columna A y fila 1
        $sheet2->freezePane('B2'); 

        /////////////////////////////////////////////// SALIDA

        // Hoja Activa ->  0 = primera hoja, 1 = segunda
        $spreadsheet->setActiveSheetIndex(0); 

        // Crear archivo en memoria
        $writer = new Xlsx($spreadsheet);
        
        // INCLUIR EL GRAFICO EN EL DOCUMENTO
        $writer->setIncludeCharts(true);

        // Usar output buffer para guardar en memoria
        ob_start();
        $writer->save('php://output');
        $excelOutput = ob_get_clean();
        
        $fallback = str_replace('%', '', Str::ascii($nombre));

        return new Response($excelOutput, 200, [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'Content-Disposition' => HeaderUtils::makeDisposition('attachment', $nombre, $fallback),
            ]);

    }
}


