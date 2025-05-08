# GESTOR DE ARCHVIOS EN LARAVEL


# Funciones para manipular Archivos  

```php

    #  Imagen -> Base64 -> Save
    ## Guardado de imagen en servidor transportada en base64

    ### Guardado de imagen por formulario
    Route::view('/chartsend_form', 'ManipulateImages.form_chart2base64'); // form
    Route::post('/ImageBase64-save', [ManipulateImagesController::class, 'imageBase64_save']); // función

    ### Guardado de SVG
    Route::view('/chart', 'Graficas.getBase64HighCharts');  // AQUÍ GRAFICA
    Route::post('/SVGBase64-save', [ManipulateImagesController::class, 'svgbase64_save']); // FUNCIÓN DE GUARDADO
    
```

# PDF -> Base64

```php

    ## PDF -> Base64 y retorno de cadena en Base64, además de mostrar una vista del archivo seleccionado.
    Route::view('/pdfsend_form', 'ManipulatePdfs.form_pdf2base64');              
    Route::post('/pdf2base64', [ManipulatePDFController::class, "pdf2base64"]);

```

# LIBRERÍAS PARA GENERAR DOCUEMNTOS PDF 

## TCPDF

[cátalogo tcpdf](tcpdf_cat.md)

* Se crean docuemnto prográmaticamente y por medio de templates html

* permite salidas de documentos  

```php

    // I:  MANDA EL ARCHIVO A EL BROWSER USARÁ EL PLUGIN DE VISOR ESTA INSTALADO EL NOMBRE AJUSTA ES EL NOMBRE QUE SE USARÁ CON ASELECCION GUARDAR COMO
    // D:  MANDA EL ARCHIVO A EL BROWSER Y FORZA SU DESCARGA CON EL NOMBRE DADO
    // FD: EQUIVALE A LAS FUNCIONES F + D ( MANDA EL ARCHIVO AL BROWSER Y FORZA SU DESCARGA )
    // F:  GUARDA EN EL SERVIDOR  CON EL NOMBRE DADO
    // FI: EQUIVALE A LAS FUNCIONES F + I ( MANDA EL ARCHIVO AL BROWSER Y GUARDA EN SERVIDOR ) 
    // S:  RETORNA EL DOCUEMNTO COMO UN STRING (EL NOMBRE DADO ES IGNORADO)
    // E:  RETORNA EL DOCUMENTO COMO BASE 64 COM MIME (multi-part email attachment (RFC 2045) ) 

```

## FPDF

* Se crean docuemnto prográmaticamente

[cátalogo fpdf](fpdf_cat.md)

## DOMPDF

* Se crean documentos por medio de templates de html

[cátalogo dompdf](dompdf_cat.md)


## SERVIDOR PARA CREAR GRÁFICAS EN BACKEND CON LA LIBRERíA HIGHCHARTS

[Review servidor highcharts](highchart_server.md)

## CREADOR DE PRESENTACIONES POWERPOINT
[Generador de Presentaciones powerpoint2007](phpoffice.md)
