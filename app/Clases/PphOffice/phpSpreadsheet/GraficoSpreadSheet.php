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

class GraficoSpreadSheet
{


    // !$A$2:$A$4   ,,, $B$2:$B$4
    static public function GraficoLinea($string, $number){

        $categories = new DataSeriesValues("$string[0]", "Worksheet!$string[1]:$string[2]");
        $values = new DataSeriesValues("$number[0]", "Worksheet!$number[1]:$number[2]");

        $series = new DataSeries(
            DataSeries::TYPE_LINECHART,
            null,
            [0],
            [$categories],
            null,
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

        return $chart;

        // Establecer posición del gráfico en la hoja
        // $chart->setTopLeftPosition('E6');
        // $chart->setBottomRightPosition('M18');

        /*
        // Crear el gráfico como columnas
        $series = new DataSeries(
            DataSeries::TYPE_BARCHART,     // Tipo: columnas
            DataSeries::GROUPING_CLUSTERED, // Agrupación: agrupadas
            range(0, count([$values]) - 1),
            [],
            [$categories],
            [$values]
        ); */

        // return $graficolinea;
    }


}