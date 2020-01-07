<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            box-sizing: border-box;
        }
         #change-row{
             position: fixed;
             left: 50%;
             top: 25%;
             transform: translateX(-50%);
             padding: 20px;
             background-color: whitesmoke;
             z-index: 100;
         }
         #close-change-row{
             position: absolute;
             font-weight: bold;
             top: 10px;
             right: 10px;
         }
        .hide{
            opacity: 0;
            pointer-events: none;
        }
        .row-form{
            display: flex;
            flex-wrap: wrap;
            width: 300px;
            justify-content: space-between;
        }
        .row-form>div{
            flex-basis: 100%;
            margin: 5px;
            display: flex;
            justify-content: space-between;
        }
        .center-btn{
            margin: 10px auto 0;
            padding: 5px 10px;
        }
        :nth-child()
    </style>
</head>
<body>

<h1>Kliendid</h1>

<hr>

<div id="change-row" class="hide row-form">
    <button onclick="closeChangeRow()" id="close-change-row">X</button>
    <h2>Muuda klienti</h2>
    <div><label for="enimi-change">Eesnimi</label><input type="text" id="enimi-change"></div>
    <div><label for="pnimi-change">Perenimi</label><input type="text" id="pnimi-change"></div>
    <div><label for="kontakt-change">Kontakt</label><input type="text" id="kontakt-change"></div>
    <button onclick="commitChange()" class="center-btn">Saada</button>
</div>

<div class="row-form">
    <h2>Loo uus klient</h2>
    <div><label for="enimi">Eesnimi</label><input type="text" id="enimi"></div>
    <div><label for="pnimi">Perenimi</label><input type="text" id="pnimi"></div>
    <div><label for="kontakt">Kontakt</label><input type="text" id="kontakt"></div>
    <button onclick="newRow()" class="center-btn">Saada</button>
</div>

<hr>

<h2>Kliendi andmed</h2>
<div id="container-table">
<?php
require_once "config.php";
require_once "db_funct.php";
require_once "output.php";
$ikt = connect(HOST,USER,PASS,DB);
mysqli_set_charset($ikt,"utf8");

require_once "H10/client_table.php";
?>
</div>

<script>
    let gID;
    function newRow(){
        if(document.getElementById("enimi").value !== "" && document.getElementById("pnimi").value !== "" && document.getElementById("kontakt").value !== "") {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    let container = document.getElementById("container-table");
                    container.removeChild(container.childNodes[0]);
                    container.innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "H10/new.php?enimi=" + document.getElementById("enimi").value + "&pnimi=" + document.getElementById("pnimi").value + "&kontakt=" + document.getElementById("kontakt").value, true);
            xhttp.send();
        }
    }
    function deleteRow(ID){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("delete-"+ID).parentNode.parentNode.remove();
            }
        };
        xhttp.open("GET", "H10/delete.php?id="+ID, true);
        xhttp.send();
    }
    function changeRow(ID, tableRow){
        gID = ID;
        document.getElementById("enimi-change").value = document.querySelector("#container-table>table>tbody>:nth-child("+tableRow+")>:nth-child(1)").innerText;
        document.getElementById("pnimi-change").value = document.querySelector("#container-table>table>tbody>:nth-child("+tableRow+")>:nth-child(2)").innerText;
        document.getElementById("kontakt-change").value = document.querySelector("#container-table>table>tbody>:nth-child("+tableRow+")>:nth-child(3)").innerText;
        document.getElementById("change-row").classList.remove("hide");
    }
    function commitChange(ID=gID){
        if(document.getElementById("enimi-change").value !== "" && document.getElementById("pnimi-change").value !== "" && document.getElementById("kontakt-change").value !== ""){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    let container = document.getElementById("container-table");
                    container.removeChild(container.childNodes[0]);
                    container.innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "H10/change.php?enimi=" + document.getElementById("enimi-change").value + "&pnimi=" + document.getElementById("pnimi-change").value + "&kontakt=" + document.getElementById("kontakt-change").value + "&id=" + ID, true);
            xhttp.send();
            document.getElementById("change-row").classList.add("hide");
        }
    }
    function closeChangeRow(){
        document.getElementById("change-row").classList.add("hide");
    }
</script>

</body>
</html>