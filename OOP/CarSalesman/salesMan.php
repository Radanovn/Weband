<?php
class Car
{
    public $model;
    public $engine;
    public $weigth;
    public $color;

    public function __construct(string $model, Engine $engine, string $weigth, string $color)
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->weigth = $weigth;
        $this->color = $color;
    }
    public function getModel(): string
    {
        return $this->model;
    }

    public function getEngine(): Engine
    {
        return $this->engine;
    }

    public function getWeigth(): string
    {
        return $this->weigth;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function __toString()
    {
        $output = '';
        $output .= $this->getModel() . "<br>";
        $output .= '    ' . $this->getEngine() . "<br>";
        $output .= '    ' . 'Weigth:' . $this->getWeigth() . "<br>";
        $output .= '    ' . 'Color:' . $this->getColor() . "<br>";

        return $output;
    }
}


class Engine
{
    public $model;
    public $power;
    public $dispacement;
    public $efficency;

    public function __construct(string $model, string $power, string $displacement, string $efficency)
    {
        $this->model = $model;
        $this->power = $power;
        $this->displacement = $displacement;
        $this->efficency = $efficency;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getPower(): string
    {
        return $this->power;
    }

    public function getdisplacement(): string
    {
        return $this->displacement;
    }

    public function getefficiency(): string
    {
        return $this->efficency;
    }

    public function __toString()
    {
        $output = $this->getModel() . ':' . "<br>";
        $output .= '    ' . 'Power:' . $this->getPower() . ':' . "<br>";
        $output .= '    ' . 'Displacement:' . $this->getDisplacement() . "<br>";
        $output .= '    ' . 'Efficiency:' . $this->getEfficiency() . "<br>";

        return $output;
    }
}

$input = [
    '2',
    'V8-101 220 50',
    'V4-33 140 28 B',
    '3',
    'FordFocus V4-33 1300 Silver',
    'FordMustang V8-101',
    'VolkswagenGolf V4-33 Orange',
];

// $input = [
//     '4',
// 'DSL-10 280 B',
// 'V7-55 200 35',
// 'DSL-13 305 55 A+',
// 'V7-54 190 30 D',
// '4',
// 'FordMondeo DSL-13 Purple',
// 'VolkswagenPolo V7-54 1200 Yellow',
// 'VolkswagenPassat DSL-10 1375 Blue',
// 'FordFusion DSL-13',
// ];

$cars = [];
$engines = [];

$numOfEngines = intval(array_shift($input));

for ($i = 0; $i < $numOfEngines; $i++) {
    $car = array_shift($input);
    $car = explode(' ', $car);

    if (count($car) == 2) {
        $displacement = "n/a";
        $efficency = "n/a";
    } else if (count($car) == 3) {
        if (is_numeric($car[2])) {
            $displacement = $car[2];
            $efficency = "n/a";
        } else {
            $effciency = $car[2];
            $displacement = "n/a";
        }
    } else if (count($car) == 4) {
        $displacement = $car[2];
        $efficency = $car[3];
    }
    $engine = new Engine($car[0], $car[1], $displacement, $efficency);
    $engines[$car[0]] = $engine;
}

$numOfCars = intval(array_shift($input));

for ($i = 0; $i < $numOfCars; $i++) {
    $car = array_shift($input);
    $car = explode(' ', $car);

    if (count($car) == 2) {
        $weigth = "n/a";
        $color = "n/a";
    } else if (count($car) == 3) {
        if (is_numeric($car[2])) {
            $weigth = $car[2];
            $color = "n/a";
        } else {
            $weigth = "n/a";
            $color = $car[2];
        }
    } else if (count($car) == 4) {
        $weigth = $car[2];
        $color = $car[3];
    }

    if (key_exists($car[1], $engines)) {
        $currentEngine = $engines[$car[1]];
    }

    $newCar = new Car($car[0], $currentEngine, $weigth, $color);
    $cars[] = $newCar;
}




foreach ($cars as $car) {

    echo $car;
    echo "<br>";

}
