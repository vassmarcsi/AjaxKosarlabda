<?php

require_once("../config/connect.php");

$sql = "SELECT * FROM jatekos;";
$res = $conn->query($sql);

if(!$res){
    die("Hiba a lekérdezés során!");
}

$html = "<select id='jatekos'>";
$html .= "<option value='%'> Válassz ki egy játékost </option>";
while ($row = $res -> fetch_assoc()){
    $html .= "<option value='{$row['mez']}'> {$row['nev']} </option>";
}
$html .= "</select>";

echo $html;

$conn->close();