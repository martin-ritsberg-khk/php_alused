<?php
if(isset($_GET["id"])){
    require_once "../config.php";
    require_once "../db_funct.php";
    require_once "../output.php";
    $ikt = connect(HOST,USER,PASS,DB);
    mysqli_set_charset($ikt,"utf8");

    query("DELETE FROM kliendid where ID = ".$_GET["id"], $ikt);

    $sql = "Select enimi, pnimi, kontakt, ID as 'delete', ID as 'change' from kliendid";
    $result = get_data($sql, $ikt);
    foreach ($result as $rowNr => $row){
        $row["delete"] = '<a onclick="deleteRow('.$row["delete"].')" id="delete-'.$row["delete"].'">Kustuta</a>';
        $row["change"] = '<a onclick="changeRow('.$row["change"].')" id="change-'.$row["change"].'">Muuda</a>';
        $result[$rowNr]=$row;
    }
    table($result,["Eesnimi","Perenimi","Kontakt","Kustutamine","Muutmine"]);
}