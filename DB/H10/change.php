<?php
if(isset($_GET["enimi"]) && isset($_GET["pnimi"]) && isset($_GET["kontakt"]) && isset($_GET["id"])){
    require_once "../config.php";
    require_once "../db_funct.php";
    require_once "../output.php";
    $ikt = connect(HOST,USER,PASS,DB);
    mysqli_set_charset($ikt,"utf8");

    $sql= 'UPDATE kliendid SET '.
        'enimi = "'.$_GET["enimi"].'", '.
        'pnimi = "'.$_GET["pnimi"].'", '.
        'kontakt = "'.$_GET["kontakt"].'"'.
        'where ID = '.$_GET["id"];

    query($sql,$ikt);

    require_once "client_table.php";
} else {
    echo "<p>Failed isset</p>";
}