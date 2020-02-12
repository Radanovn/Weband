<?php

class Person
{
    public $name;
    public $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }


}

$people = [];

// $input = [
//     '3',
// 'Pesho 3',
// 'Gosho 4',
// 'Annie 5'
// ];
$input = [

   '5',
    'Steve 10',
    'Christopher 15',
    'Annie 4',
    'Ivan 35',
    'Maria 34',
];


$maxAgeValue = -1;
$maxAgeName = '';
$count = array_shift($input);

for ($i=0; $i < count($input); $i++) { 
    $input2 = array_shift($input);
    $input2 = explode(' ', $input2);
    $name = $input2[0];
    $age = intval($input2[1]);
    
    $person = new Person($name, $age);
    if($person->age > $maxAgeValue) {
        $maxAgeValue = $person->age;
        $maxAgeName = $person->name;
    }
}

if($maxAgeValue > -1) {

    echo $maxAgeName . " " . $maxAgeValue;
}


?>