<?php

namespace App\Clases\PphOffice\phpSpreadsheet;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use App\Clases\PphOffice\phpSpreadsheet\GraficoSpreadSheet;
/*
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
use PhpOffice\PhpSpreadsheet\Chart\Title; */

use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\HeaderUtils;
use Illuminate\Support\Facades\Storage;

class CatGraficoSpreadSheet
{
    public function catalogo($titulo,$datos){

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet(); 

        $sheet->setTitle($titulo);

        foreach($datos as $dato){
            $sheet->setCellValue($dato[0],$dato[1]);    
        }

        $chart = GraficoSpreadSheet::GraficoLinea('$A$2:$A$4', '$B$2:$B$4');

        /*
        // $B$7:$B$18,  $C$7:$C$18
        $garfico = GraficoSpreadSheet::GraficoLinea('$B$7:$B$18',  '$C$7:$C$18');


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
        $chart->setBottomRightPosition('M18');   */

        // Agregar gráfico a la hoja
        $sheet->addChart($chart);


           // Crear archivo en memoria
        $writer = new Xlsx($spreadsheet);
        
        // INCLUIR EL GRAFICO EN EL DOCUMENTO
        $writer->setIncludeCharts(true);

        // Usar output buffer para guardar en memoria
        ob_start();
        $writer->save('php://output');
        $excelOutput = ob_get_clean();

        $nombre = "hola";

        $fallback = str_replace('%', '', Str::ascii($nombre));

        return new Response($excelOutput, 200, [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'Content-Disposition' => HeaderUtils::makeDisposition('attachment', $nombre, $fallback),
            ]);


    }
    
}