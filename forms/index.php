<!doctype html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP - Vormid</title>
</head>
<body>
<h1>Vormid</h1>
<h2>Pood OÜ</h2>
<form action="tellimine.php" method="get">
    <label for="td1">Toode 1</label> <input id="td1" type="text" name="t1"><br>
    <label for="td2">Toode 2</label> <input id="td2" type="text" name="t2"><br>
    <label for="td3">Toode 3</label> <input id="td3" type="text" name="t3"><br>
    <input type="submit" value="Saada">
</form>
<h2>Ruumala</h2>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get">
    <div>
        <label for="shape">Kujundi tüüp</label>
        <select id="shape" name="shape">
            <option value="sphere" <?php echo $_GET['shape']==="sphere"?"selected ":""; ?> >Kera</option>
            <option value="cone" <?php echo $_GET['shape']==="cone"?"selected":""; ?>>Koonus</option>
            <option value="cylinder" <?php echo $_GET['shape']==="cylinder"?"selected":""; ?>>Silinder</option>
        </select>
    </div>
    <div>
        <label for="radius">Raadius</label>
        <input id="radius" name="radius" type="number" value="<?php echo $_GET['radius']??0; ?>">
    </div>
    <div>
        <label for="height">Kõrgus</label>
        <input id="height" name="height" type="number" value="<?php echo $_GET['height']??0; ?>">
    </div>
    <input type="submit" value="Arvuta">
</form>
<div style="padding: 10px">
<?php
    $shape = $_GET["shape"];
    $_GET["radius"]<=0?$shape = "viga":$radius = $_GET["radius"];
    $_GET["height"]<=0?$shape = "viga":$height = $_GET["height"];

    switch ($shape) {
        case "sphere":
            echo "Ruumala on: ".round(pow($radius,3),2);
            break;
        case "cone":
            echo "Ruumala on: ".round((1/3)*pi()*pow($radius,2)*$height,2);
            break;
        case "cylinder":
            echo "Ruumala on:".round(pi()*pow($radius,2)*$height,2);
            break;
        case "viga":
            echo "Palun sisestage korrektsed andmed.";
            break;
    }
?>
</div>
</body>
</html>