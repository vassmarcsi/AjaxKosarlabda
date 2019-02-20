<?php

require_once '../config/connect.php';

if (isset($_POST['mez'])) {

    $mez = $_POST['mez'];

    $sql = "SELECT * FROM jatekos WHERE mez='$mez';";
    $res = $conn->query($sql);

    if (!$res) {
        die("Hiba a lekérdezés során!");
    }



    if ($res->num_rows == 1) {
        $row = $res->fetch_row();

        $html = "<table class='table table-hover'>"
                . "<tr>"
                . "<th>Mezszám</th>"
                . "<th>Név</th>"
                . "<th>Magasság</th>"
                . "<th>Poszt</th>"
                . "</tr>";


        $html .= "<tr class='egyik'>"
                . "<td>{$row[0]}</td>"
                . "<td>{$row[1]}</td>"
                . "<td>{$row[2]}</td>"
                . "<td>{$row[3]}</td>"
                . "</tr>";

        $html .= "</table>";

        echo $html;
    }

    /*
      while ($row = $res->fetch_assoc()) {
      $html .= "<tr>"
      . "<td>{$row['mez']}</td>"
      . "<td>{$row['nev']}</td>"
      . "<td>{$row['magassag']}</td>"
      . "<td>{$row['post']}</td>"
      . "</tr>";
      }
     */

    $conn->close();
}

