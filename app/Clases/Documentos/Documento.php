<?php

enum TipoDoc: string
{
    case FACTURA = "f";
    case RECIBO  = "r";
    case INFORME = "i";
    case CARTA   = "c";
}

enum TipoMoneda: string
{
    case MXN = "peso"; 
    case DLL = "dolar";
}

enum FormatoFecha: string
{
    case AMERICANA = 'm-d-Y';
    case NACIONAL = 'd-m-Y';
}

class Fecha
{
    public static function tipoFecha(string $fecha, string $tipo_fecha = 'N',): string
    {
        return  "TipoFecha = $tipo_fecha - $fecha";
    }
}


class Documento
{
    public TipoDoc $tipo_doc;      // tipo de documento   Informe, Factura, Recibo etc ....
    public string $fecha;          // fecha de documento
    public string $tipo_fecha;     // americana - nacional
    public string $emisor;         // que departamento lo emite 
    public string $receptor;       // para quiebn es el documento 
    public string $estado_doc;     // borrador, eleborado, entregado 
    public TipoMoneda $moneda;
    public string $total;          // solo facturas 
    public string $observaciones;  
    public string $firma;          // sello digital de gerente

    public function __construct(
        
        string $_fecha,
        string $tipo_fecha,
        string $_emisor,
        string $_receptor,
        string $_estado_doc,
        $_firma = "",
        $_total = "",
        $_observaciones = "",
        TipoDoc $_tipo_doc = TipoDoc::CARTA,
        TipoMoneda $_moneda = TipoMoneda::MXN
    ){

        $this->tipo_doc = $_tipo_doc;
        $this->fecha = $_fecha;
        $this->emisor = $_emisor;
        $this->receptor = $_receptor;
        $this->estado_doc = $_estado_doc;
        $this->moneda = $_moneda;
        $this->total = $_total;
        $this->observaciones = $_observaciones;
        $this->firma = $_firma;

       echo Fecha::tipoFecha($this->fecha, 'A');



    }
}
$carta = new Documento(

    "30-12-2025",       //$fecha,
    "A",                //$ipo_fecha,
    "CONTA-B",          //$emisor,
    "CLIENTE:0526",     //$receptor,
    "0",                //$estado_doc,
    "1af1dfa857bf1d8814fe1af8983c18080019922e557f15a8a3366a403c8212a29", // $_firma
    "1500",             //$_total,
    "N/A",              //$_observaciones,
    TipoDoc::FACTURA,   //TipoDoc $_tipo_doc
    TipoMoneda::MXN     //TipoMoneda $_moneda

);








// C:\laragon\www\archivoslaravel\app\Clases\Documentos\Documento.php





/*
------ Requerimiento ------------------

Tipo de documento
Número o folio
Fecha de emisión
Emisor (empresa o persona)
Receptor (cliente o destinatario)
Estado del documento (borrador, emitido, cancelado)
Moneda
Total
Observaciones
Firma o sello digital (si aplica)

------- Funcionalidad heredable --------

Generar estructura del documento
Calcular totales
Validar información mínima
Exportar a PDF
Exportar a XML
Cambiar estado del documento
Mostrar encabezado y pie
*/


