<?php

/**
 * Ejemplo de uso de funciones para cifrar y descifrar.
 *
 * @link https://github.com/mroblesdev
 * @author mroblesdev
 */

require 'cifrado.php';

$opciones = [
    'key' => 'ABCD-123.xyz',
    'method' => 'aes-256-ctr'
];

$texto = "Un mensaje secreto";

try {
    $textoCifrado = cifrado($texto, $opciones);
    echo 'Datos cifrado: ' . $textoCifrado . '<br>';
    echo 'Datos decifrados: ' . descifrar($textoCifrado, $opciones);
} catch (Exception $e) {
    echo $e->getMessage();
}
