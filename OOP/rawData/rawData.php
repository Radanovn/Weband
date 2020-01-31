<?php
class Car
{
    public $model;
    public $engine;
    public $cargo;
    public $tires;

    public function __construct(string $model, Engine $engine, Cargo $cargo, array $tires)
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->cargo = $cargo;
        $this->tires = $tires;
    }
}

class Tire
{
    public $pressure;
    public $age;

    public function __construct(float $pressure, int $age)
    {
        $this->pressure = $pressure;
        $this->age = $age;
    }

    public function isPressure()
    {
        return $this->pressure < 1;
    }
}


class Cargo
{
    public $weigth;
    public $type;
    public function __construct(int $weigth, string $type)
    {
        $this->weigth = $weigth;
        $this->type = $type;
    }
}

class Engine
{
    public $speed;
    public $power;

    public function __construct(int $speed, int $power)
    {

        $this->speed = $speed;
        $this->power = $power;
    }
}

// $input = [
//     '2',
//     'ChevroletAstro 200 180 1000 fragile 1.3 1 1.5 2 1.4 2 1.7 4',
//     'Citroen2CV 190 165 1200 fragile 0.9 3 0.85 2 0.95 2 1.1 1',
//     'fragile'
// ];


$input = [
    '4',
    'ChevroletExpress 215 255 1200 flamable 2.5 1 2.4 2 2.7 1 2.8 1',
    'ChevroletAstro 210 230 1000 flamable 2 1 1.9 2 1.7 3 2.1 1',
    'DaciaDokker 230 275 1400 flamable 2.2 1 2.3 1 2.4 1 2 1',
    'Citroen2CV 190 165 1200 fragile 0.8 3 0.85 2 0.7 5 0.95 2',
    'flamable'

];

$carCount = intval(array_shift($input));
$cars = [];

for ($i = 0; $i < $carCount; $i++) {
    $car = array_shift($input);
    $car = explode(" ", $car);

    list(
        $model, $engineSpeed, $enginePower, $weigth, $cargoType,
        $tire1Pressure, $tire1Age,
        $tire2Pressure, $tire2Age,
        $tire3Pressure, $tire3Age,
        $tire4Pressure, $tire4Age
    ) = $car;

    $engine = new Engine(intval($engineSpeed), intval($enginePower));
    $cargo = new Cargo(intval($weigth), $cargoType);
    $tires = [new Tire(
        $tire1Pressure,
        $tire1Age,
        $tire2Pressure,
        $tire2Age,
        $tire3Pressure,
        $tire3Age,
        $tire4Pressure,
        $tire4Age
    )];

    $currentCar = new Car($model, $engine, $cargo, $tires);
    $cars[] = $currentCar;
}
 

if ($input[0] === 'fragile') {
    foreach ($cars as $car) {
        if ($car->cargo->type === 'fragile') {
            foreach ($car->tires as $tire) {
                if ($tire->isPressure()) {
                    echo $car->model . " <br> ";
                    break;
                }
            }
        }
    }
} else if ($input[0] === 'flamable') {
    foreach ($cars as $car) {
        if ($car->cargo->type === 'flamable') {
            if ($car->engine->power > 250) {

                echo $car->model . " <br> ";
            }
        }
    }
}
