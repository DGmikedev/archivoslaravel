<?php

namespace App\Clases\websecurity;

use Illuminate\Support\Facades\Storage;

class EncriptadorArchivos
{

    static public function encriptacion($nombre_original, $nombre_cifrado){

        try{

            // Leer el archivo original del storage asignado
            $data = Storage::disk('archivosprivados')->get($nombre_original);

            // encripta el archivo
            // Rellenar si es necesario (openssl lo hace internamente en CBC)
            $data_cifrada = openssl_encrypt($data, 'aes-256-cbc', hex2bin(env('KEY32')), OPENSSL_RAW_DATA, hex2bin(env('IV')));

            // Guardar archivo cifrado (IV + datos cifrados)
            Storage::disk('archivosprivados')->put($nombre_cifrado, hex2bin(env('IV')) . $data_cifrada);

            // retorna el estatus y mensaje
            return json_encode(["status"=>true, "msg" => "Exito al encriptar el archivo"]);
        }
        catch(Error $e){

            return json_encode(["status"=>false, "msg" => $e]);

            }

    }
}


?>