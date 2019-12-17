<?php

$sql = "Select enimi, pnimi, kontakt, ID as 'delete', ID as 'change' from kliendid";
$result = get_data($sql, $ikt);
$tableRow=0;
foreach ($result as $rowNr => $row){
    $tableRow++;
    $row["delete"] = '<button onclick="deleteRow('.$row["delete"].')" id="delete-'.$row["delete"].'">Kustuta</button>';
    $row["change"] = '<button onclick="changeRow('.$row["change"].', '.$tableRow.')" id="change-'.$row["change"].'">Muuda</button>';
    $result[$rowNr]=$row;
}
table($result,["Eesnimi","Perenimi","Kontakt","Kustutamine","Muutmine"]);