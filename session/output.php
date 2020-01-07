<?php
require_once "config.php";
require_once "db_funct.php";

function loginForm (){
    echo '
    <form action="" method="post">
        <label for="username">Username: </label><input type="text" id="username" name="username"><br>
        <label for="pass">Password: </label><input type="text" id="pass" name="pass"><br>
        <input type="submit" value="Login">    
    </form>';
}