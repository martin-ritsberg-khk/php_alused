<?php
//andmebaasi ühendus
require_once "includes/config.php";
//sql päring
$koik_koolid = 'SELECT * FROM koolid2015';
//päring andmebaasi
$result = $conn->query($koik_koolid);
//päringu tulemusi kokku
$numrows = $result->num_rows;
?>
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OOP</title>
</head>

<body>
<h1>Harjutus 01</h1>
<?php
echo "Ridu kokku: $numrows";
?>

<?php
mysqli_close($conn);
?>
</body>
</html>