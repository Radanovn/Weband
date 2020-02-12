<?php

class Person {
    protected $name;
    protected $age;

    public function __construct(string $name, int $age)
    {
        $this->setName($name);
        $this->setAge($age);
    }

    protected function setName(string $name) {
        if(strlen($name) < 3) {
            throw new Exception("Name's length shoult not be less than 3 symbols");
        }

        $this->name = $name;
    }

    protected function setAge(int $age) {
        if ($age < 1) {
            throw new Exception("Age must be positive!");
        }

        $this->age = $age;
    }
}

class Child extends Person {
    protected function setAge(int $age) {
        if($age > 15 ) {
            throw new Exception("Child's age must be less than 16");
        }

        $this->age = $age;
    }

    protected function setName(string $name) {
        if(strlen($name) < 3) {
            throw new Exception("Name's length shoult not be less than 3 symbols");
        }

        $this->name = $name;
    }
}
$people = [];

$child = new Child('Chocho', 11);
$people[] = $child;

var_dump($people);