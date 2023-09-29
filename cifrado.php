<?php

/**
 * Funciones para cifrar y descifrar datos utilizando OpenSSL.
 *
 * @link https://github.com/mroblesdev
 * @author mroblesdev
 */

/**
 * Cifra los datos utilizando OpenSSL.
 *
 * @param string $datos Los datos que se van a cifrar.
 * @param array $opciones Opciones adicionales como 'key' (clave de cifrado) y 'method' (método de cifrado).
 *
 * @return string Los datos cifrados como una cadena codificada en base64.
 *
 * @throws InvalidArgumentException Si la clave de cifrado no se proporciona o si el método de cifrado no es válido.
 */

function cifrado($datos, $opciones = [])
{
    $password = $opciones['key'] ?? '';
    $metodo = $opciones['method'] ?? '';

    if (empty($password)) {
        throw new InvalidArgumentException('Debe agregar una clave de cifrado.');
    }

    if (empty($metodo) || !in_array($metodo, openssl_get_cipher_methods())) {
        throw new InvalidArgumentException('Debe agregar un método de cifrado válido.');
    }

    $ivSize = openssl_cipher_iv_length($metodo);
    $iv = openssl_random_pseudo_bytes($ivSize);
    $datosCifrados = openssl_encrypt($datos, $metodo, $password,  OPENSSL_RAW_DATA, $iv);

    return base64_encode($iv . $datosCifrados);
}

/**
 * Descifra los datos utilizando OpenSSL.
 *
 * @param string $datos Los datos cifrados como una cadena codificada en base64.
 * @param array $opciones Opciones adicionales como 'key' (clave de cifrado) y 'method' (método de cifrado).
 *
 * @return string Los datos descifrados.
 *
 * @throws InvalidArgumentException Si la clave de cifrado no se proporciona o si el método de cifrado no es válido.
 *
 */
function descifrar($datos, $opciones = [])
{
    $password = $opciones['key'] ?? '';
    $metodo = $opciones['method'] ?? '';

    if (empty($password)) {
        throw new InvalidArgumentException('Debe agregar una clave de cifrado');
    }

    if (empty($metodo) || !in_array($metodo, openssl_get_cipher_methods())) {
        throw new InvalidArgumentException('Debe agregar un método de cifrado válido');
    }

    $datos = base64_decode($datos);
    $ivSize = openssl_cipher_iv_length($metodo);
    $iv = substr($datos, 0, $ivSize);
    $datosCifrados = substr($datos, $ivSize);

    return openssl_decrypt($datosCifrados, $metodo, $password, OPENSSL_RAW_DATA, $iv);
}
