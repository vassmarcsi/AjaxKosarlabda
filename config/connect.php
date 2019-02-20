<?php

$host = "localhost";
$user = "root";
$pwd = "";
$db = "kosarlabda";
$port = 3306;

$conn = new mysqli($host, $user, $pwd, $db, $port);

if ($conn -> connect_errno){
    die("Hiba a csatlakozás során.". $conn -> connect_error);
    //die("Hiba a csatlakozás során.".$connect_error); //így jó???
}

$conn ->set_charset("utf8");

if($conn -> errno){
    echo ("Karakterkódolási hiba!".$conn -> error);
}
