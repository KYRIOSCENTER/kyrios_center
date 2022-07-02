<?php

function openCypher ($action='encrypt',$string=false)
{
    $action = trim($action);
    $output = false;

    $myKey = 'SarA';
    $myIV = 'LuciA';
    $encrypt_method = 'AES-256-CBC';

    $secret_key = hash('sha256',$myKey);
    $secret_iv = substr(hash('sha256',$myIV),0,16);

    if ( $action && ($action == 'encrypt' || $action == 'decrypt') && $string )
    {
        $string = trim(strval($string));

        if ( $action == 'encrypt' )
        {
            $output = openssl_encrypt($string, $encrypt_method, $secret_key, 0, $secret_iv);
        };

        if ( $action == 'decrypt' )
        {
            $output = openssl_decrypt($string, $encrypt_method, $secret_key, 0, $secret_iv);
        };
    };

    return $output;
};

/* $myText = '081108';
$myText_encrypted = openCypher('encrypt',$myText);
echo $myText_encrypted;
echo "<br>";
$myText_decrypted = openCypher('decrypt',$myText_encrypted);
echo $myText_decrypted;
 */
?>