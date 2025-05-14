# Modulo de encriptación 

* Para encriptar y desencriptar los aplicativos ocupan dos claves:
    .- KEY32
    .- IV

estás claves se encuentran en el documento .env las cuales se deben de ajustar deacuerdo al proyecto

* Se debe crear por seguridad un storage adecuado para el guardado de archvios de este tipo:

    .- PROYECTO\config\filesystems.php

    .- Ajustando la ruta en el storage como:  storage_path('app/archivosprivados')

```php

    'archivosprivados' => [
           'driver' => 'local',
           'root' => storage_path('app/archivosprivados'),
           'visibility' => 'private',
       ]
```

### Encriptación de Archivos:

```php

# Controller para la encriptación

    #Controller
    use App\Http\Controllers\EncripterController;           

    # Clase Encriptadora de archivos
    use Archivoslaravel\app\Clases\websecurity\EncriptadorArchivos;
    
    # Ruta
    Route::get('/enc', [EncripterController::class, 'encriptacion']);

        # El archivo es ajustado a mano, el método de ajuste puede variar
        $nombre_original = "archivo.xml";
        $nombre_cifrado = "encriptacion/llavesServ198.enc";
        $enc = EncriptadorArchivos::encriptacion($nombre_original, $nombre_cifrado);

        ### Se trae el path del archivo a encriptar
        $data = Storage::disk('archivosprivados')->get($nombre_original);

        ### Se cifra el archivo
        $data_cifrada = openssl_encrypt($data, 'aes-256-cbc', hex2bin(env('KEY32')), OPENSSL_RAW_DATA, hex2bin(env('IV')));

        ### Se guarda el archivo cifrado
        Storage::disk('archivosprivados')->put($nombre_cifrado, hex2bin(env('IV')) . $data_cifrada);


    # Clase Desencriptadora de archivos
    use App\Clases\websecurity\DesencriptadorArchivos;
    
    # Ruta
    Route::get('/dec', [EncripterController::class, 'desencriptacion']);

        ### Se trae el path del archivo a desencriptar
        $data = Storage::disk('archivosprivados')->get($nombre_encriptado);

        ### Se descifra el archivo
        $data_descifrada = openssl_decrypt($data, 'aes-256-cbc', hex2bin(env('KEY32')), OPENSSL_RAW_DATA, hex2bin(env('IV')) );

        ### Guardar archivo descifrado (IV + datos cifrados)
        Storage::disk('archivosprivados')->put($nombre_desencriptado, $data_descifrada );

```

### Encriptador de cadenas de texto


```php
# Controller para la encriptación

    use App\Http\Controllers\EncripterController;

    use App\Clases\websecurity\encriptacionTexto\Encripttexto;
    Route::get('/enctexto/{texto}', [EncripterController::class, 'enctexto']);

        # Recibe el string a encriptar y retorna el texto encriptado
        $data_cifrada = openssl_encrypt( $texto, 'aes-256-cbc', hex2bin(env('KEY32')), OPENSSL_RAW_DATA, hex2bin(env('IV')) );

    use App\Clases\websecurity\encriptacionTexto\Decripttexto;
    Route::get('/dectexto/{texto_cifrado}', [EncripterController::class, 'decripttexto']);

        # Recibe el texto encriptado y retorna el texto desencriptado
        $data_decifrada = openssl_decrypt( base64_decode($texto_cifrado), 'aes-256-cbc', hex2bin(env('KEY32')), OPENSSL_RAW_DATA, hex2bin(env('IV')) );

```
