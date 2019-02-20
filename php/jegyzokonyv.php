<?php

require_once '../config/connect.php';

if (isset($_POST['mez'])) {

    $mez = $_POST['mez'];

    $sql = "SELECT * FROM jegyzokonyv WHERE mez='$mez';";
    $res = $conn->query($sql);

    if (!$res) {
        die("Hiba a lekérdezés során!");
    }

    $html = "<table class='table table-hover'>"
            . "<tr>"
            . "<th>Azonosító</th>"
            . "<th>Mezszám</th>"
            . "<th>Be</th>"
            . "<th>Ki</th>"
            . "<th>Kísérlet</th>"
            . "<th>Jó dobás</th>"
            . "</tr>";

    $szamlalo = 0;

    while ($row = $res->fetch_assoc()) {
        if ($szamlalo % 2 == 0) {
            $html .= "<tr class='egyik'>";
        } else {
            $html .= "<tr class='masik'>";
        }
        $html .= "<td>{$row['az']}</td>"
                . "<td>{$row['mez']}</td>"
                . "<td>{$row['be']}</td>"
                . "<td>{$row['ki']}</td>"
                . "<td>{$row['bkis']}</td>"
                . "<td>{$row['bjo']}</td>"
                . "</tr>";
        $szamlalo++;
    }

    $html .= "</table>";

    echo $html;
    $conn->close();
}


