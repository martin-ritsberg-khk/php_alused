<!doctype html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP - Tekst</title>
</head>
<body>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get">
    <div>
        <label for="case">Esimene täht suureks, teised väikseks</label>
        <br>
        <input id="case" name="case" type="text" value="<?php echo $_GET['case']??""; ?>">
    </div>
    <div>
        <label for="dot">Tähtede vahele punktide panemine</label>
        <br>
        <input id="dot" name="dot" type="text" value="<?php echo $_GET['dot']??""; ?>">
    </div>
    <div>
        <label for="replace">Sõna(noob, loll, puupea) asendamine</label>
        <br>
        <input id="replace" name="replace" type="text" value="<?php echo $_GET['replace']??""; ?>">
    </div>
    <div>
        <label for="email">E-maili aadressi loomine nimest ja täpitähtede asendamine</label>
        <br>
        <input id="email" name="email" type="text" value="<?php echo $_GET['email']??""; ?>">
    </div>
    <input type="submit" value="Arvuta">
</form>
<div style="padding: 10px">
    <?php
    $case = $_GET["case"];
    $dot = $_GET["dot"];
    $replace = $_GET["replace"];
    $email = $_GET["email"];

    echo ucfirst(strtolower($case));
    echo "<br>";

    for( $i = 0; $i < strlen($dot); $i++ ) {
        echo strtoupper($dot[$i]).".";
    };
    echo "<br>";

    $badwords = ["noob", "loll", "puupea"];
    $pattern = '/\b('.implode('|', $badwords).')/i';
    echo preg_replace($pattern,"***",$replace);
    echo "<br>";

    $badletters = [
        "ö" => "o",
        "ä" => "a",
        "ü" => "y",
        "õ" => "o",
        "Ö" => "O",
        "Ä" => "A",
        "Ü" => "Y",
        "Õ" => "O"
    ];
    $email = strtolower(strtr($email,$badletters));
    if (count(str_word_count($email, 1))>1) {
        echo current(str_word_count($email, 1)).".".end(str_word_count($email, 1))."@khk.ee";
    } elseif (count(str_word_count($email, 1))==1) {
        echo current(str_word_count($email, 1))."@khk.ee";
    };
    ?>
</div>
</body>
</html>