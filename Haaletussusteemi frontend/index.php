<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <meta name="description" content="">
    <meta name="keywords" content="HTML, KHK, klass, veebiarendus,">
    <meta name="author" content="Martin Ritsberg, Hannes Juurma, Malle Alaru">
    <meta name="robots" content="noindex">

    <style>

    </style>
</head>
<body>
<!-- Tehke mindagi ilusalt siia -->

<?php
@$conn = new mysqli('localhost', 'ritsberg_haaletu', 'Haal_par00l', 'ritsberg_haaletus'); // Palun mitte väärkasutada :P
if (mysqli_connect_errno()) {
    printf("Ühendusega mingi jama: %s\n", mysqli_connect_error());
    exit();
}
mysqli_set_charset($conn,"utf8");
date_default_timezone_set('Europe/Tallinn');
$koikTulemused = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM TULEMUSED"));
$koikHaaletajad = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM HAALETAJA"));
?>

<!--    Hääletamine    -->
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get" id="haaletan">
    <label for="haaletaja">Mina olen:</label>
    <select id="haaletaja" name="haaletaja">
        <?php
        // Kood mis looks andmebaasi põhjal valiku erinevatest hääletajatest, näidates nende nimesid
        foreach ($koikHaaletajad as $haaletaja){
            echo '<option value="'.$haaletaja[0].'">'.$haaletaja[1].' '.$haaletaja[2].'</option>';
        }
        ?>
    </select><br>
    <label for="tulemus">Hääletus kus ma hääletan:</label>
    <select id="tulemus" name="tulemus">
        <?php
        // Kood mis looks andmebaasi põhjal valiku erinevatest hääletus sessioonidest, möödunud või mitte veel alganud sessionid võik olla disabled ning valikutest võik olla näidatud algus ja lõpp arusaadaval kujul
        foreach ($koikTulemused as $tulemus){
            $algus = strtotime($tulemus[3]);
            $lopp = strtotime($tulemus[4]);
            $kinni = "selected";
            if(time()-$algus<0 || $lopp-time()<0){
                $kinni = "disabled";
            };
            echo '<option value="'.$tulemus[0].'" '.$kinni.' >'.$tulemus[0].'</option>';
        }
        ?>
    </select><br>
    <label>Minu Hääl:</label>
    <input id="haal-poolt" type="radio" name="haal" value="1"><label for="haal-poolt">Poolt</label>
    <input id="haal-vastu" type="radio" name="haal" value="0"><label for="haal-vastu">Vastu</label><br>
    <input type="submit" value="Hääletan">
</form>
<?php
// See kood saadab hääletuse tulemuse serverisse ja näitab serverist tulnud tagasisidet
    if(isset($_GET['haaletaja']) && isset($_GET['tulemus']) && isset($_GET['haal'])){
        $haaletaja = $_GET['haaletaja'];
        $tulemus = $_GET['tulemus'];
        $haal = $_GET['haal'];
        mysqli_query($conn,"CALL Haaletan(".$haaletaja.", ".$tulemus.", ".$haal.", @teave)");
        $tagasiside = mysqli_fetch_row(mysqli_query($conn, "SELECT @teave"));
        echo '<p class="tulemus">'.$tagasiside[0].'</p>';
    }
?>

<?php
mysqli_close($conn);
?>
</body>
</html>