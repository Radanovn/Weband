<?php

class Employee
{
    function __construct($name, $salary, $position, $department, $email = 'n/a', $age = -1)
    {

        $this->name = $name;
        $this->salary = $salary;
        $this->position = $position;
        $this->department = $department;
        $this->email = $email;
        $this->age = $age;
    }

    public $name;
    public $salary;
    public $position;
    public $department;
    public $email;
    public $age;
}
$people = [];

$pesho = new Employee('Pesho', '120.00', 'Dev', 'Development', 'pesho@abv.bg');
$toncho = new Employee('Toncho', '333.33', 'Manager', 'Marketing', $email="n/a", 33);
$ivan = new Employee('Ivan', '840.00', 'ProjectLeader', 'Development', 'ivan@abv.bg');
$gosho = new Employee('Gosho', '0.20', 'Freeloader', 'Nowhere', $email="n/a", '18');
Array_push($people, $pesho, $toncho, $ivan, $gosho);


$departments = [];

// Group departments
foreach ($people as $person => $value) {
    if (array_key_exists($value->department, $departments)) {
        $departments[$value->department][] = $value->salary;
    } else {
        $departments[$value->department] = [$value->salary]; 
    } 
}

$departments = array_map(function($a) {
    return array_sum($a) / count($a);
}, $departments);

$maxs = array_keys($departments, max($departments));
$highestDepartment = $maxs[0];

echo "Highest average salary: " . $highestDepartment;

// usort($departments, function($a, $b) {
//     return $a->salary < $b->salary;
// });

// print_r($departments);
// echo ' <br> ';
// echo "Highest Average Salary:" . $people[0]->name;



// foreach ($people as $person => $value) {
//      . 
//     echo '<br>';
// }






