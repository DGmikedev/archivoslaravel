<?php

namespace App\Clases\websecurity;

use Illuminate\Support\Facades\Storage;

class Encriptador
{

    public function encriptacion(){

        // Configuración
        $archivo_original = 'archivo.xml';
        $archivo_cifrado = 'archivo.enc';
        // $clave = openssl_random_pseudo_bytes(32); // 256 bits
        // $iv = openssl_random_pseudo_bytes(16);    // 128 bits

        $clave =  hex2bin(env('KEY32'));
        $iv =     hex2bin(env('IV'));

        // Leer el archivo
        $data = storage_path('app/archivosprivados/archivo.xml');

        // Rellenar si es necesario (openssl lo hace internamente en CBC)
        $data_cifrada = openssl_encrypt($data, 'aes-256-cbc', $clave, OPENSSL_RAW_DATA, $iv);

        // Guardar archivo cifrado (IV + datos cifrados)
        Storage::disk('archivosprivados')->put($archivo_cifrado, $iv . $data_cifrada);
        

        // Guardar clave para pruebas (no hacerlo en producción así)
        // file_put_contents('clave.key', $clave);

        return json_encode(["msg" =>"Archivo encriptado como $archivo_cifrado\n", "keys"=>["clave"=> bin2hex($clave), "iv"=>bin2hex($iv)] ]);


    }


}


?>