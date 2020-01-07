<?php
function connect($host, $user, $pass, $db){
//    Ühendus
    $link = mysqli_connect($host,$user,$pass,$db);

//    Kui ühendust ei tekkinud
    if($link===false){
        echo "Probleem andmebaasiga ühendamisel";
        exit;
    }

//    Väljastan ühenduse andmed
    return $link;
};

// Väljundita SQL päring
function query($sql, $link){
    $result = mysqli_query($link,$sql);
    if($result === false){
        echo "probleem päringuga: ".$sql."</br>";
    }
    return $result;
};

// Väljundiga SQL Päring
function get_data($sql,$link){
    $result = query($sql, $link);
    $data = array();
    while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $data[] = $row;
    }
    if(count($data)==0){
        return false;
    }
    return $data;
};