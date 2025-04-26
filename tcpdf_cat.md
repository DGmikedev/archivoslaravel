
### documento genérico

```php

use App\Clases\TcpdfClases\TCPDFDocumento; // clase del documento

Route::get('/tcpdf-documento', [TcpdfController::class, "documento"]);

views("TcpdfViews.documento");  // vista del documento

```
![alt text](public/imgcat/tcpdf-documento.png)