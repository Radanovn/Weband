<?php

//A car model is uqicue.

// $input = "AudiA4 23 0.3 BMW-M2 45 0.42 Drive BMW-M2 56 Drive AudiA4 5 Drive AudiA4 13 End";


// $input = [
//     '2',
//     'AudiA4 23 0.3',
//     'BMW-M2 45 0.42',
//     'Drive BMW-M2 56',
//     'Drive AudiA4 5',
//     'Drive AudiA4 13',
//     'End'
// ];

$input = [
'3',
'AudiA4 18 0.34',
'BMW-M2 33 0.41',
'Ferrari-488Spider 50 0.47',
'Drive Ferrari-488Spider 97',
'Drive Ferrari-488Spider 35',
'Drive AudiA4 85',
'Drive AudiA4 50',
'End'
];


$cars = [];

class Car
{
    public $model;
    public $fuel;
    public $fuelCost1km;
    public $distance;

    public function __construct(string $model, float $fuel, float $fuelCost1km)
    {
        $this->model = $model;
        $this->fuel = $fuel;
        $this->fuelCost1km = $fuelCost1km;
        $this->distance = 0;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getFuel(): float
    {
        return $this->fuel;
    }

    public function getDistance(): float
    {
        return $this->distance;
    }

    public function drive($amountOfKm) :void
    {
        if ($this->fuel >= $amountOfKm * $this->fuelCost1km) {
            $this->fuel = round(($this->fuel - $amountOfKm * $this->fuelCost1km), 2);
            $this->distance += $amountOfKm;
        } else {
            echo "Insufficient fuel for the drive";
        }
    }
}

$numOfCars = intval(array_shift($input));

for ($i = 0; $i < $numOfCars; $i++) {
    $car = array_shift($input);
    $car = explode(' ', $car);
    $car = new Car($car[0], $car[1], $car[2]);

    array_push($cars, $car);
}

while ($input != 'End') {

    $car = array_shift($input);
    $car = explode(' ', $car);

    for ($i = 0; $i < count($cars); $i++) {
        $currentCar = $cars[$i];

        if ($car[1] === $currentCar->getModel()) {
            $currentCar->Drive($car[2]);
        break;
        }
    }


break;
}



foreach ($cars as $car) {

    echo $car->getModel() . ' ' . number_format($car->getFuel(), 2, ".", '')
        . ' ' . $car->getDistance() . '<br>';
}
