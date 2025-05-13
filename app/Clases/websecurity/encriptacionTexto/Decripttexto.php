<?php

namespace App\Clases\websecurity\encriptacionTexto;

class Decripttexto {

    static public function decripttexto($texto_cifrado){

        $data_decifrada = openssl_decrypt( base64_decode($texto_cifrado), 'aes-256-cbc', hex2bin(env('KEY32')), OPENSSL_RAW_DATA, hex2bin(env('IV')) );

        return $data_decifrada;
        
    }

}