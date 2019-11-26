<!doctype html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP - Vormid - Tellmine</title>
</head>
<body>
<h1>Tellimus</h1>
<?php
//get - $_GET
//post - $_POST
//lisab vormist saadud andmed muutujasse
$toode1 = $_GET['t1'];
$toode2 = $_GET['t2'];
$toode3 = $_GET['t3'];

echo 'Toode 1: '.$toode1.'tk<br>';
echo 'Toode 2: '.$toode2.'tk<br>';
echo 'Toode 3: '.$toode3.'tk<br>';
echo "<pre>";
var_dump($_GET);
echo "</pre>";
?>
</body>
</html>