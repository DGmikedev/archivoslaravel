<?php

namespace App\Clases\websecurity;

class CreadorDeBytesAleatorios {

    static public function BytesAleatorios($multiplo){ 
        return  openssl_random_pseudo_bytes($multiplo); 
    }

}

