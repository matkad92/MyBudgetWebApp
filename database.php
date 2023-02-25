<?php

$config = require_once 'config.php';

try{
    $firstParam = "mysql:host={$config['host']};dbname={$config['database']};charset=utf8";
    $secParam = $config['user'];
    $thirdParam = $config['password'];
    $fourthParam = [PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

    $db = new PDO($firstParam, $secParam, $thirdParam, $fourthParam);

} catch (PDOException $error) {
    echo $error->getMessage();
    exit ('Database error!');
}

