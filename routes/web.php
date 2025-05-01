<?php

use Illuminate\Support\Facades\Route;

# Controlador par la manipulación de los archivos PDF
use App\Http\Controllers\ManipulatePDFController;

# Es el controlador de las funciones de la librería DOMPDF
use App\Http\Controllers\Dompdf\DompdfController;

# Es el controlador de las funciones de la librería FPDF
use App\Http\Controllers\Fpdf\FpdfController;

# Es el controlador de las funciones de la librería TCPDF
use App\Http\Controllers\Tcpdf\TcpdfController;
    

# Es el controlador de las funciones de Manipulación de Imagenes
use App\Http\Controllers\ManipulateImagesController;



Route::view('/', 'welcome');

// Fucniones para Manipular PDF
# PDF -> Base64

    ## PDF -> Base64 y retorno de cadena en Base64, además de mostrar una vista del archivo seleccionado.
    Route::view('/pdfsend_form', 'ManipulatePdfs.form_pdf2base64');              
    Route::post('/pdf2base64', [ManipulatePDFController::class, "pdf2base64"]);


// Funciones para manipular Archivos    

#  Imagen -> Base64 -> Save
## Guardado de imagen en servidor transportada en base64


    ### Guardado de imagen por formulario
    Route::view('/chartsend_form', 'ManipulateImages.form_chart2base64'); // form
    Route::post('/ImageBase64-save', [ManipulateImagesController::class, 'imageBase64_save']); // función

    ### Guardado de SVG
    Route::view('/chart', 'Graficas.getBase64HighCharts');  // AQUÍ GRAFICA
    Route::post('/SVGBase64-save', [ManipulateImagesController::class, 'svgbase64_save']); // FUNCIÓN DE GUARDADO

    ### creacion de grafico de highchart mediante servidor

    Route::get('/generar-grafica', [ManipulateImagesController::class, 'creacionHGCHRT']);
    Route::get('/descargar-grafica', function () {
        return Storage::download('graficas/grafica-ventas.svg');
    });




    

// Templates de docuemntos en DOMPDF

    Route::get('/dompdf-factura',    [DompdfController::class, "factura"]);
    Route::get('/dompdf-credencial', [DompdfController::class, "credencial"]);
    Route::get('/dompdf-membretada', [DompdfController::class, "membretada"]);
    Route::get('/dompdf-ordenpago',  [DompdfController::class, "ordenpago"]);

// Templates de documentos en FPDF

    Route::get('/fpdf-listado', [FpdfController::class, "listado"]);

// Template de documentos con TCPDF

    Route::get('/tcpdf-documento', [TcpdfController::class, "documento"]);
    Route::get('/tcpdf-factura',   [TcpdfController::class, "factura"]);
    Route::get('/tcpdf-reporte',   [TcpdfController::class, "reporte"]);


