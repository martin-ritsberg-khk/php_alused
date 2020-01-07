<?php
class Car {
    public $comp;
    public $color = 'beige';
    public $hasSunRoof = true;

    public function hello() {
        return "beep";
    }
}

$bmw = new Car();
$mercedes = new Car();
$audi = new Car();

$mercedes -> color = "green";
$bmw -> color = "blue";
$audi -> color = "orange";

$mercedes -> comp = "Mercedes Benz";
$bmw -> comp = "BMW";
$audi -> comp = "Audi";