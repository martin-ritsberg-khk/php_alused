<?php
session_start();
?>
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

if(!empty($_SESSION["username"])){
    echo "<p>Welcome, ".$_SESSION["username"]."!</p>";
    echo "<a href='logout.php'>Log out</a>";
} else {

    loginForm();

    if (!empty($_POST["username"]) && !empty($_POST["pass"])) {
        $username = $_POST["username"];
        $pass = $_POST["pass"];

        $sql = "SELECT * from users where username='" . $username . "' and pass='" . md5($pass) . "'";
        $result = get_data($sql, $ikt);

        if (count($result) === 1) {
            $_SESSION["username"] = $result[0]["username"];
            $_SESSION["role"] = $result[0]["role"];
        }
    }
}
?>

</body>
</html>