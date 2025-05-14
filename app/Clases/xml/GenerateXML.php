<?php

namespace App\Clases\xml;

use Spatie\ArrayToXml\ArrayToXml;

use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\HeaderUtils;

class GenerateXML
{
    public function xmlfromarray($array, $root, $d, $codificacion){

        $xmlout = new ArrayToXml($array, $root, $d, $codificacion); //::convert($array);

        $xml = $xmlout->toxml();

        return $xml;



        // dump($xml);

        //return $xml;

        // dump($xmlout);

        // $arrayToXml = new ArrayToXml($array);
        // $arrayToXml->addProcessingInstruction('xml-stylesheet', 'type="text/xsl" href="base.xsl"');
        // $result = $arrayToXml->toXml();
/*
        $fallback = str_replace('%', '', Str::ascii("XMLOUT.xml"));



         return new Response($xmlout, 200, [
                'Content-Type' => 'application/xml',
                'Content-Disposition' => HeaderUtils::makeDisposition('inline', "XMLOUT.xml", $fallback),
            ]); */


    }
}