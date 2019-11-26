<?php
date_default_timezone_set('Europe/Tallinn');
echo date('d.m.Y G:i' , time())."<br>";
echo date('d.m.Y G:i' , mktime(12,31,0,3,20,2013))."<br>";
switch (date("D", time())){
    case "Mon":
        echo "Esmaspäeav";
        break;
    case "Tue":
        echo "Teisipäev";
        break;
    case "Wen":
        echo "Kolmapäev";
        break;
    case "Thu":
        echo "Neljapäev";
        break;
    case "Fri":
        echo "Reede";
        break;
    case "Sat":
        echo "Laupäev";
        break;
    case "Sun":
        echo "Pühapäev";
        break;
};
echo "<br>";

if (date("N", time()) > 5) {
    echo "Täna on nädalavahetus<br>";}
elseif (date("G", time()) >= 17) {
    echo "Tööpäev on juba lõppenud";}
else {
    echo "Tööpäeva lõpuni on jäänud ".(16-date("G", time()))." tundi ja ".(60-date("i", time()))." minutit";
}
echo "<br>";

if (date("G", time()) > 17) {
    echo "Tere õhtust";
}
elseif (date("G", time()) > 11) {
    echo "Tere päevast";
}
elseif (date("G", time()) > 5) {
    echo "Tere hommikust";
}
else {
    echo "Mine magama";
}
echo "<br>";

echo date_diff(date_create("1980-11-06"), date_create("1989-04-11"))->format("Ta minus %y aastat ja %m kuud vanem");
echo "<br>";

if ((date("Y", time()) - date("Y", mktime(0, 0, 0, 11, 4, 1989))) % 10 === 0) {
    echo "Sel aastal on mul juubel";
} else {
    echo "Sel aastal ei ole mul juubel";
}