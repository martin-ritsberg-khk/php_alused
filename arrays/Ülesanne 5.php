<?php
// Õppeained
$ained = array('matemaatika', 'eesti keel', 'inglise keel', 'füüsika', 'keemia');
foreach($ained as $nimekiri => $aine){
    echo $aine."<br/>";
}
echo "<br/>";
sort($ained);
foreach($ained as $nimekiri => $aine){
    echo $aine."<br/>";
}
echo "<br/>";

// Pallibisked
$nimed = array('Martin','Hardi','Juhan','Tiina','Sirje','Kaie');
$pallivisked = array(33, 32, 27, 11, 15, 28);

echo "Osalejate hulk: ".count($nimed)."<br/>";
echo "Keskmine tulemus: ".round(array_sum($pallivisked)/count($pallivisked),2)."<br/>";
echo  "Parim tulemus oli: ".max($pallivisked)."<br/>";
echo "Parima tulemuse sai: ".$nimed[array_keys($pallivisked,max($pallivisked),true)[0]]."<br/>"."<br/>";

// Raamatud
$raamatud = array(
    array("Pealkiri"=>"Konstitutsioon", "Autor"=>"J.Stalin", "Aasta"=>"1944"),
    array("Pealkiri"=>"Rahvasõbrad", "Autor"=>"V.I.Lenin", "Aasta"=>"1951"),
    array("Pealkiri"=>"Leninismi alustest", "Autor"=>"J.Stalin", "Aasta"=>"1945")
);
array_multisort(array_column($raamatud, "Pealkiri"), SORT_ASC, $raamatud);
foreach ($raamatud as $raamat){
    echo "Raamat: ";
    foreach($raamat as $meta=>$vaartus){
        echo "$meta: $vaartus&#9;";
    }
    echo "<br>";
}
echo  "Raamatuid kokku: ".count($raamatud);