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

$koolid = 'SELECT 2015,Kool FROM koolid2015 WHERE Kool LIKE "%!search!%"';

searchForm($koolid,$ikt);


?>

</body>
</html>