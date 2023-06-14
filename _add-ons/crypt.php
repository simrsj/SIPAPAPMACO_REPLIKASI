<?php

// KEY:
$customkey = "SIPAPAPMACORSJPROVJABAR";

function encryptString($string, $key)
{
	$iv = random_bytes(16);
	$encrypted = openssl_encrypt($string, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
	$encrypted = base64_encode($iv . $encrypted);
	return $encrypted;
}

function decryptString($encryptedString, $key)
{
	$data = base64_decode($encryptedString);
	$iv = substr($data, 0, 16);
	$encrypted = substr($data, 16);
	$decrypted = openssl_decrypt($encrypted, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
	return $decrypted;
}
