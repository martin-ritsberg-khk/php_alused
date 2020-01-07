<?php
class Car {
    public $tank;

    public function fill($float)
    {
        $this-> tank += $float;

        return $this;
    }

    public function ride($float)
    {
        $km = $float;
        $liters = $km/10;
        $this-> tank -= $liters;

        return $this;
    }
}

$bmw = new Car();

$tank = $bmw -> fill(40) -> ride(200) -> tank;

echo "The number of liters left in the tank: " . $tank . " liters.";