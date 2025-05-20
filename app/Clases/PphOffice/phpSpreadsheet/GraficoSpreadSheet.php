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
    static public function GraficoLinea($spreadsheet, $datos, $titulo, $poscicion_grafico){

        $sheet = $spreadsheet->getActiveSheet();

        // Insertar datos
        $sheet->fromArray($datos, null, 'C2');

        // Definir los valores del eje X (categorías)
        $categories = [
            new DataSeriesValues('String', 'Worksheet!$B$1:$M$1', null, 3),
        ];

        // Definir los valores del eje Y (series de datos)
        $values = [
            new DataSeriesValues('Number', 'Worksheet!$B$2:$M$2', null, 3),
            new DataSeriesValues('Number', 'Worksheet!$B$3:$M$3', null, 3),
        ];

        // Crear la serie de datos para un gráfico de líneas
        $series = new DataSeries(
            DataSeries::TYPE_LINECHART,      // Tipo de gráfico
            DataSeries::GROUPING_STANDARD,   // Agrupación
            range(0, count($values) - 1),    // Indexes
            [],                              // Labels
            $categories,                     // Categorías
            $values                          // Valores
        );

        // Crear área del gráfico y leyenda
        $plotArea = new PlotArea(null, [$series]);
        $legend = new Legend(Legend::POSITION_RIGHT, null, false);
            
        // Crear el gráfico
        $chart = new Chart(
            'LineChart',                     // Nombre
            new Title($titulo),    // Título del gráfico
            $legend,                         // Leyenda
            $plotArea,                       // Área de datos
            true,                            // Plot visible
            0, null, null
        );
        
        // Posicionar el gráfico en la hoja
        $chart->setTopLeftPosition($poscicion_grafico[0]);
        $chart->setBottomRightPosition($poscicion_grafico[1]);

        return $chart;

    }


}