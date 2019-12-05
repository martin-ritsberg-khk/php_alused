<?php

$AutoCSV = fopen("auto.csv","r") or die("Autode faili ei leitud");
while(!feof($AutoCSV)){
    $Rida = fgetcsv($AutoCSV,filesize($AutoCSV),",");
    if(strlen($Rida[0])<5 or strlen($Rida[1])<5 or substr($Rida[1],0,2)-substr($Rida[0],0,2)<0){
        echo "Sellel real on andmed valesti sisestatud";
    } else {
        $Kestvus = [substr($Rida[1],0,2)-substr($Rida[0],0,2)];
        if(substr($Rida[1],3,2)-substr($Rida[0],3,2)<0){
            $Kestvus[0]--;
            $Kestvus[1]=substr($Rida[1],3,2)-substr($Rida[0],3,2)+60;
        } else {
            $Kestvus[1]=substr($Rida[1],3,2)-substr($Rida[0],3,2);
        }
        echo "See sõit kestis: ".$Kestvus[0].":".str_pad($Kestvus[1],2,"0",STR_PAD_LEFT);
    }
    echo "<br>";
}
echo "<br>";


$Tootajad = fopen("tootajad.csv", "r") or die("Töötajate faili ei leitud");
$Mehed = [];
$Naised = [];

while(!feof($Tootajad)){
    $Rida = fgetcsv($Tootajad, filesize($Tootajad),";");
    if($Rida[1]=="m"){
        array_push($Mehed,$Rida[2]);
    } elseif ($Rida[1]=="n") {
        array_push($Naised,$Rida[2]);
    }
}

$MeesteKeskmine = round(array_sum($Mehed)/count($Mehed), 2);
$NaisteKeskmine = round(array_sum($Naised)/count($Naised),2);
echo "Meeste keskmine on ".$MeesteKeskmine."€ ja Naiste keskmine on ".$NaisteKeskmine."€<br>";
if($MeesteKeskmine==$NaisteKeskmine){
    echo "Mehed ja Naised on keskmiselt tasustatud võrdselt";
} elseif ($MeesteKeskmine>$NaisteKeskmine){
    echo "Mehed on keskmiselt tasustatud ".($MeesteKeskmine-$NaisteKeskmine)."€ võrra rohkem kui Naised";
} elseif ($MeesteKeskmine<$NaisteKeskmine){
    echo "Naised on keskmiselt tasustatud ".($NaisteKeskmine-$MeesteKeskmine)."€ võrra rohkem kui Mehed";
}
echo "<br>";

echo "Meeste suurim palk on ".max($Mehed)."€ ja naiste suurim palk on ".max($Naised)."€<br>";
if(max($Mehed)==max($Naised)){
    echo "Meeste ja Naiste suurmad palgad on võrdsed";
} elseif (max($Mehed)>max($Naised)){
    echo "Meeste suurim palk on ".(max($Mehed)-max($Naised))."€ võrra suurem kui Naiste";
} elseif (max($Mehed)<max($Naised)){
    echo "Naiste suurim palk on ".(max($Naised)-max($Mehed))."€ võrra suurem kui Meeste";
}
