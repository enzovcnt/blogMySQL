<?php

//factorise la connexion à la base de donnée et à pdo
function getPdo(){
    $host ="127.0.0.1";
    $port = "3306";
    $database = "blog base";
    $dbUsername = "blogBaseAdmin";
    $dbPassword = "IY4H389rYS[YMgKd";

    $pdo = new PDO("mysql:host=$host:$port;dbname=$database", $dbUsername, $dbPassword, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    return $pdo;

}