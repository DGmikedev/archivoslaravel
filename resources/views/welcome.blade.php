<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <title>Gestor archvios | Home</title>
    <style>
        .highcharts-figure,
.highcharts-data-table table {
    min-width: 400px;
    max-width: 400px;
    margin: 1em auto;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tbody tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

.highcharts-description {
    margin: 0.3rem 10px;
}

    </style>

</head>
<body>
    <?php
// Configuración
$archivo_original = 'archivo.xml';
$archivo_cifrado = 'archivo.enc';

$clave = openssl_random_pseudo_bytes(32); // 256 bits
$iv = openssl_random_pseudo_bytes(16);    // 128 bits

// Leer contenido original
$data = Storage::get($archivo_original);  //file_get_contents($archivo_original);

echo $data;
/*
// Rellenar si es necesario (openssl lo hace internamente en CBC)
$data_cifrada = openssl_encrypt($data, 'aes-256-cbc', $clave, OPENSSL_RAW_DATA, $iv);
*/
echo bin2hex($clave) . "   -    ". bin2hex($iv);


/*
// Guardar archivo cifrado (IV + datos cifrados)
file_put_contents($archivo_cifrado, $iv . $data_cifrada);

// Guardar clave para pruebas (no hacerlo en producción así)
file_put_contents('clave.key', $clave);

echo "✅ Archivo encriptado como $archivo_cifrado\n";
*/
?>
    <div id="container"> </div>


</body>
</html>