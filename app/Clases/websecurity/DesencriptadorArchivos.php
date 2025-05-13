<?php

namespace App\Clases\websecurity;

use Illuminate\Support\Facades\Storage;

class DesencriptadorArchivos
{

    static public function desencriptacion($nombre_encriptado, $nombre_desencriptado){

        try{

            $data = Storage::disk('archivosprivados')->get($nombre_encriptado);

            // se separa IV de la cadena cifrada
            // env('IV') longitud de 16
            $data = substr($data,  16);

            // desencripta el archivo
            $data_descifrada = openssl_decrypt($data, 'aes-256-cbc', hex2bin(env('KEY32')), OPENSSL_RAW_DATA, hex2bin(env('IV')) );

            // Guardar archivo descifrado (IV + datos cifrados)
            Storage::disk('archivosprivados')->put($nombre_desencriptado, $data_descifrada );

            // retorna el estatus y mensaje
            return json_encode(["status"=>true, "msg" => "Exito al desencriptar el archivo"]);
        }
        catch(Error $e){

            return json_encode(["status"=>false, "msg" => $e]);

        }

    }
}


?>