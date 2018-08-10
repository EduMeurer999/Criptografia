<?php


$chave = $_POST['chave'];
$tipo = $_POST['tipo'];
$fn = $_POST['fn'];



//Algoritmo cripta e decripta AES
$return = "";
$input = "";
switch ($tipo) {
    case "AES":
        $method = 'aes-256-cbc';
        for ($i = 0; $i < 16; $i++) {
            $iv .= chr(0x0);
        }
        if ($fn == 'cript') {
            $texto = $_POST['texto'];
            $encrypted = base64_encode(openssl_encrypt($texto, $method, $chave, OPENSSL_RAW_DATA, $iv));
            $return = $encrypted;
            $input = "C";
        }
        else if ($fn == 'des'){
            $texto = $_POST['textoC'];
            $decrypted = openssl_decrypt(base64_decode($texto), $method, $chave, OPENSSL_RAW_DATA, $iv);
            $return = $decrypted;
            $input = "D";
        }
        else{
            $return = "erro";
        }
        break;
    case "DES":
        break;
    case "Blowfish":
        break;
    case "Twofish":
        break;
}
echo 

//