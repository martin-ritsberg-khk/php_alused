<?php
// SQL-i andmetest tabel

function table($data, $titles = false){
    echo '<table>';

    echo '<thead>';
    echo '<tr>';
    if ($titles) {
        foreach ($titles as $title) {
            echo '<th>' . $title . '</th>';
        }
    } else {
        foreach ($data[0] as $title => $value){
            echo '<th>' . $title . '</th>';
        }
    }
    echo '</tr>';
    echo '</thead>';

    echo '<tbody>';
    foreach ($data as $row){
        echo '<tr>';
        foreach ($row as $value){
            echo '<td>'.$value.'</td>';
        }
        echo '</tr>';
    }
    echo '</tbody>';

    echo '</table>';
}

function searchForm ($sql, $conn){
    require_once "db_funct.php";
    echo '
    <form action="" method="get">
		<input type="text" name="find">
		<input type="submit" value="Search"> 
	</form>';
    if(isset($_GET['find'])){
        $sql = str_replace('!search!',$_GET['find'],$sql);
        $result = get_data($sql,$conn);
        table($result);
    }
}

function addDataForm ($sql, $conn, $label1 = false, $label2 = false, $label3 = false){
    require_once "db_funct.php";
    echo '
    <form action="" method="get">';
    if($label1){
        echo '<label for="add1">'.$label1.' </label>';
    }
	echo '<input type="text" id="add1" name="add1" required>';
    if($label1){
        echo '<br>';
    }
    if($label2){
        echo '<label for="add2">'.$label2.' </label>';
    }
	echo '<input type="text" id="add2" name="add2" required>';
    if($label2){
        echo '<br>';
    }
    if($label3){
        echo '<label for="add2">'.$label3.' </label>';
    }
	echo '<input type="text" id="add3" name="add3" required>';
    if($label3){
        echo '<br>';
    }
	echo '<input type="submit" value="Insert"> 
	</form>';
    if(isset($_GET['add1']) && isset($_GET['add2']) && isset($_GET['add2'])){
        $sql = str_replace('!add1!',$_GET['add1'],$sql);
        $sql = str_replace('!add2!',$_GET['add2'],$sql);
        $sql = str_replace('!add3!',$_GET['add3'],$sql);
        query($sql,$conn);
        echo "<p>Andmebaasis on listatud ".mysqli_affected_rows($conn)." ridu</p>";
        echo "<p>Viimane muutetud ID on ".mysqli_insert_id($conn)."</p>";
        return true;
    }
    return false;
};