<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Koodi taaskasutamine</title>
</head>
<body>
<header>
    <nav>
        <a href="index.php">Avaleht</a>
        <a href="index.php?leht=portfoolio">Portfoolio</a>
        <a href="index.php?leht=kaart">Kaart</a>
        <a href="index.php?leht=kontakt">Kontakt</a>
    </nav>
</header>
<main>
    <?php
    if(!empty($_GET["leht"])){
        $leht = htmlspecialchars($_GET['leht']);
        if(is_file($leht.'.html')){
            $lubatud = array('portfoolio','kaart','kontakt');
            if(in_array($leht, $lubatud)==true){
                include($leht.'.html');
            } else {
                echo 'Antud leht pole korrektne!';
            }
        } else {
            echo 'Lehte ei leitud!';
        }
    } else {
    ?>
    <h1>AVALEHT</h1>
    <p>Lorem ipsum dolor sit amet, per cu possit cetero. Eum at eripuit denique mnesarchum, ea ipsum consequat sed, nibh placerat argumentum an has. Putant volumus necessitatibus ut cum, sit dolor qualisque voluptatum et. Possit oporteat conceptam ea vim. No iudico graeco est, simul interesset ad vis.</p>
    <?php
    }
    ?>
</main>
</body>
</html>
<?php
