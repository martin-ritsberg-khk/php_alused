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

echo "<pre>";
//print_r($ikt);
$result = get_data("select kool, kokku from koolid2015", $ikt);

echo '<h1>Harujutus 1</h1>';
echo '<p>Ridu kokku: '.count($result).'</p>';

table($result);

echo "<pre/>";

?>

</body>
</html>
