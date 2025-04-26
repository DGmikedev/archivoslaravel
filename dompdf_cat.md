## Factura 

```php

use App\Http\Controllers\Dompdf\DompdfController;

Route::get('/dompdf-factura', [DompdfController::class, "factura"]);

view("DompdfViews.factura");

```
![alt text](public/imgcat/dompf_factura.png)

## Membretada 

```php

use App\Http\Controllers\Dompdf\DompdfController;

Route::get('/dompdf-membretada', [DompdfController::class, "membretada"]);

view("DompdfViews.membretada");

```
![alt text](public/imgcat/dompf_membretada.png)

## Orden de pago 

```php

use App\Http\Controllers\Dompdf\DompdfController;

Route::get('/dompdf-ordenpago',  [DompdfController::class, "ordenpago"]);

view("DompdfViews.ordenpago");

```
![alt text](public/imgcat/dompf_ordenpago.png)

## Credencial

```php

use App\Http\Controllers\Dompdf\DompdfController;

Route::get('/dompdf-credencial', [DompdfController::class, "credencial"]);

view("DompdfViews.credencial");

```
![alt text](public/imgcat/dompf_credencial.png)