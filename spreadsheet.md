# PHPOFFICE / SPREADSHEET

Librería que permite generar en docuemntos ademas:
    .- Incluir vairias hojas en docuemnto
    .- Incluir Style en hojas
    .- Incluir Grafícos 


## Ejemplo reporte generico

```php
# Controlador para docuemntos excel
use App\Http\Controllers\SpreadSheetController;

# Clase 
use App/Clases/PphOffice/phpSpreadsheet/HojaExcel.php

// Router
    Route::get('/phpoffice-spreadsheet', [SpreadSheetController::class, 'excel']);
```

![alt text](public/imgcat/spreadsheet1.png)

![alt text](public/imgcat/spreadsheet3.png)

![alt text](public/imgcat/spreadsheet2.png)