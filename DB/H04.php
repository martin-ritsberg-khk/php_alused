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

$sql= 'INSERT INTO kliendid SET '.
    'enimi = "Karu", '.
    'pnimi = "Poeg", '.
    'kontakt = "karupoeg@puhh.ee"';

$result = query($sql,$ikt);
if($result){
    echo "<p>Andmebaasis on listatud ".mysqli_affected_rows($ikt)." ridu</p>";
    echo "<p>Viimane muutetud ID on ".mysqli_insert_id($ikt)."</p>";
}


?>

</body>
</html><?php
