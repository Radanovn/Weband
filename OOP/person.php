<?php

class Person
{

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;

        $count = 0;
        if ($this->age > 40) {
            $str =  $this->name . " " . $this->age . " ";
            $array = explode(" ", $str);
            foreach ($array as $per) {
                echo $per . "\n";
                $count++;
            }
            
            echo $count;
        }
    }
}

$person = new Person('Pesho', '40');
$person1 = new Person('Gosho', '58');
$person2 = new Person('aosho', '98');
$person3 = new Person('kosho', '68');

