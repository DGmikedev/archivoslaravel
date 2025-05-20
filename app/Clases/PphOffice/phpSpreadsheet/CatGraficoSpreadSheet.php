<?php

namespace App\Clases\PphOffice\phpSpreadsheet;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use App\Clases\PphOffice\phpSpreadsheet\GraficoSpreadSheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
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
    public function catalogo($titulo, $datos, $poscicion_grafico){

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet(); 

        $sheet->setTitle($titulo);

        // Manda  generar el grafico
        $chart = GraficoSpreadSheet::GraficoLinea($spreadsheet, $datos, $titulo, $poscicion_grafico);

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

        $nombre = "cátalogo";

        $fallback = str_replace('%', '', Str::ascii($nombre));

        return new Response($excelOutput, 200, [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'Content-Disposition' => HeaderUtils::makeDisposition('attachment', $nombre, $fallback),
            ]);


    }
    
}