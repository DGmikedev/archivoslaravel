<?php

namespace App\Clases\websecurity\encriptacionTexto;

class Encripttexto {

    static public function encripttexto($texto){

        $data_cifrada = openssl_encrypt( $texto, 'aes-256-cbc', hex2bin(env('KEY32')), OPENSSL_RAW_DATA, hex2bin(env('IV')) );

        return  base64_encode($data_cifrada);

    }

}