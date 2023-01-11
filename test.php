<?php
$options = [
    'cost' => 5,
];
$passwordku = "12345678";
$password_hash = password_hash($passwordku, PASSWORD_DEFAULT, $options);
echo $password_hash;
