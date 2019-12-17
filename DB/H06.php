<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<?php
require_once "config.php";
require_once "db_funct.php";
require_once "output.php";
$ikt = connect(HOST,USER,PASS,DB);
mysqli_set_charset($ikt,"utf8");

if(isset($_GET["delete"])){
    $name = get_data("Select enimi, pnimi from kliendid where ID =".$_GET["delete"], $ikt);
    query("DELETE FROM kliendid where ID = ".$_GET["delete"], $ikt);
    echo $name[0]["enimi"]." ".$name[0]["pnimi"]." kustutati andmebaasist";
}

$sql = "Select enimi, pnimi, kontakt, ID from kliendid";
$result = get_data($sql, $ikt);
foreach ($result as $rowNr => $row){
    $row["ID"] = '<a href="?delete='.$row["ID"].'">Kustuta</a>';
    $result[$rowNr]=$row;
}
table($result,["Eesnimi","Perenimi","Kontakt","Kustutamine"]);


?>

</body>
</html>
