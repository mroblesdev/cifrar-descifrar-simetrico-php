# Cifrado y descifrado simétrico de datos con OpenSSL en PHP

Este proyecto consiste en una librería PHP que ofrece funciones para cifrar y descifrar datos de forma segura mediante el uso de la biblioteca OpenSSL.

## Requerimientos 📋

- PHP 7 o superior
- Extensión [openssl](https://www.php.net/manual/es/book.openssl.php)

## Uso 💻

Agrega la librería:

``` PHP
require 'cifrado.php';
```

Configura la contraseña y método de cifrado:

``` PHP
$opciones = [
    'key' => 'ABCD-123.xyz',
    'method' => 'aes-256-ctr'
];
```

Cifrar datos:

``` PHP
$textoPlano = "Un texto a cifrar";

try {
    $textoCifrado = cifrado($textoPlano, $opciones);
} catch (Exception $e) {
    echo $e->getMessage();
}
```

Descifrar datos:

``` PHP
$textoCifrado = "..";

try {
    $textoPlano = descifrar($textoCifrado, $opciones);
} catch (Exception $e) {
    echo $e->getMessage();
}
```

## Expresiones de Gratitud 🎁

- Comenta a otros sobre este proyecto 📢
- Invitame una cerveza 🍺 o un café ☕ [Da clic aquí](https://www.paypal.com/paypalme/markorobles?locale.x=es_XC.).
- Da las gracias públicamente 🤓.
