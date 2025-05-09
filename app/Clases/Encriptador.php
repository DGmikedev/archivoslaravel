<?php
// Configuración
$archivo_original = 'archivo.xml';
$archivo_cifrado = 'archivo.enc';
$clave = openssl_random_pseudo_bytes(32); // 256 bits
$iv = openssl_random_pseudo_bytes(16);    // 128 bits

// Leer contenido original
$data = file_get_contents($archivo_original);

// Rellenar si es necesario (openssl lo hace internamente en CBC)
$data_cifrada = openssl_encrypt($data, 'aes-256-cbc', $clave, OPENSSL_RAW_DATA, $iv);

// Guardar archivo cifrado (IV + datos cifrados)
file_put_contents($archivo_cifrado, $iv . $data_cifrada);

// Guardar clave para pruebas (no hacerlo en producción así)
file_put_contents('clave.key', $clave);

echo "✅ Archivo encriptado como $archivo_cifrado\n";

?>