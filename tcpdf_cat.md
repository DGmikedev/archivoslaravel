
### documento genérico

```php

use App\Clases\TcpdfClases\TCPDFDocumento; // clase del documento

Route::get('/tcpdf-documento', [TcpdfController::class, "documento"]);

views("TcpdfViews.documento");  // vista del documento

```
![alt text](public/imgcat/tcpdf-documento.png)


### reporte

```php

use App\Clases\TcpdfClases\TCPDFDocumento; // clase del documento

Route::get('/tcpdf-reporte', [TcpdfController::class, "reporte"]);

//view('TcpdfViews.reporte.header');

```
![alt text](public/imgcat/tcpdf_reporte.png)


### factura

```php

use App\Clases\TcpdfClases\TCPDFDocumento; // clase del documento

Route::get('/tcpdf-factura', [TcpdfController::class, "factura"]);

// carpeta con las vistas
// TcpdfViews/ 
// body, cliente, comprobante, footer, header, scd, sellos
// views("TcpdfViews. ...  ")->rendr(); 

```
![alt text](public/imgcat/tcpdf_factura.png)