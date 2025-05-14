<?php

namespace App\Clases\xml;

use Spatie\ArrayToXml\ArrayToXml;

class GenerateXML
{
    public function xmlfromarray($array, $root, $d, $codificacion){

        $xmlout = new ArrayToXml($array, $root, $d, $codificacion); //::convert($array);

        $xml = $xmlout->toxml();

        return $xml;

    }
}