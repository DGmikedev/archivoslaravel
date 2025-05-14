<?php

use Illuminate\Support\Facades\Route;

# Controller para la encriptación
use App\Http\Controllers\EncripterController;

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

# Es el controlador de las funciones de los archivos .PPT (PowerPoint)
use App\Http\Controllers\PPTController;

# Controlador para datos xml
use App\Http\Controllers\XMLController;


Route::view('/', 'welcome');


// XML

    # Genera documento en xml a partir de una array y lo muestra o descarga
    # name: nombre del docuemnto con extencio .xml
    # manageout: attachment, inline = attachment: descargar docuemnto, inline: mostrar en el navegador
    # savecopy: gurada un copia en ele servidor en este path Storage/app/xmlout = 'yes' para que se guarde
    Route::get('/arr2xml/{name}/{manageout}/{savecopi?}', [XMLController::class, 'array2xml']);


// Encriptación

    Route::get('/enc',                      [EncripterController::class, 'encriptacion']);
    Route::get('/dec',                      [EncripterController::class, 'desencriptacion']);
    Route::get('/enctexto/{texto}',         [EncripterController::class, 'enctexto']);
    Route::get('/dectexto/{texto_cifrado}', [EncripterController::class, 'decripttexto']);

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

    Route::get('/tcpdf-documento', [ TcpdfController::class, "documento"]);
    Route::get('/tcpdf-factura',   [ TcpdfController::class, "factura"  ]);
    Route::get('/tcpdf-reporte',   [ TcpdfController::class, "reporte"  ]);


// Templates phpoffice/phppresentation

    Route::get('/phpoffice-presentaciondemo', [ PPTController::class, 'presentaciondemo']);
    Route::get('/phpoffice-presentacion',     [ PPTController::class, 'presentacion'    ]);
    Route::get('/phpoffice-presentacion2',    [ PPTController::class, 'presentacion2'   ]);
    Route::get('/phpoffice-presentacion3',    [ PPTController::class, 'presentacion3'   ]);
    Route::get('/phpoffice-presentacion4',    [ PPTController::class, 'presentacion4'   ]);
    Route::get('/phpoffice-presentacion5',    [ PPTController::class, 'presentacion5'   ]);
    Route::get('/phpoffice-presentacion6',    [ PPTController::class, 'presentacion6'   ]);
    Route::get('/phpoffice-presentacion7',    [ PPTController::class, 'presentacion7'   ]);
    Route::get('/phpoffice-presentacion8',    [ PPTController::class, 'presentacion8'   ]);
    Route::get('/phpoffice-presentacion9',    [ PPTController::class, 'presentacion9'   ]);
    Route::get('/phpoffice-presentacion10',   [ PPTController::class, 'presentacion10'  ]);


