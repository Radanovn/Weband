<?php

class Person
{

    private $name;
    private $company;
    private $pokemon;
    private $parents;
    private $children;
    private $car;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setCompany(Company $company)
    {

        $this->company = $company;
    }

    public function getCompany()
    {
        return $this->company;
    }


    public function setPokemon(Pokemon $pokemon)
    {

        $this->pokemon = $pokemon;
    }

    public function getPokemon()
    {
        return $this->pokemon;
    }

    public function setParents(Parents $parents)
    {

        $this->parents = $parents;
    }

    public function getParents()
    {
        return $this->parents;
    }

    public function setChildren(Children $children)
    {

        $this->children = $children;
    }

    public function getChildren()
    {
        return $this->children;
    }

    public function setCar(Car $car)
    {

        $this->car = $car;
    }

    public function getCar()
    {
        return $this->car;
    }
}

class Company
{
    private $companyName;
    private $department;
    private $salary;

    public function __toString()
    {
        return $this->companyName . '  ' . $this->department . '  ' . $this->salary . '  ';
    }

    public function __construct(string $companyName, string $department, float $salary)
    {
        $this->companyName = $companyName;
        $this->department = $department;
        $this->salary = $salary;
    }

    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    public function getDepartment(): string
    {
        return $this->department;
    }

    public function getSalary(): int
    {
        return $this->salary;
    }
}

class Pokemon
{
    private $pokemonName;
    private $pokemonType;

    public function __construct(string $pokemonName, string $pokemonType)
    {
        $this->pokemonName = $pokemonName;
        $this->pokemonType = $pokemonType;
    }

    public function __toString()
    {
        return $this->pokemonName . '  ' . $this->pokemonType . '  ';
    }

    public function getPokemonName(): string
    {
        return $this->pokemonName;
    }

    public function getPokemonType(): string
    {
        return $this->pokemonType;
    }
}

class Parents
{
    private $parentName;
    private $parentBirthday;

    public function __construct(string $parentName, $parentBirthday)
    {
        $this->parentName = $parentName;
        $this->parentBirthday = $parentBirthday;
    }

    public function __toString()
    {
        return $this->parentName . '  ' . $this->parentBirthday . '  ';
    }

    public function getParentName(): string
    {
        return $this->parentName;
    }

    public function getParentBirthday(): string
    {
        return $this->parentBirthday;
    }
}

class Children
{
    private $childName;
    private $childBirthday;

    public function __construct(string $childName, int $childBirthday)
    {
        $this->childName = $childName;
        $this->childBirthday = $childBirthday;
    }

    public function __toString()
    {
        return $this->childName . '  ' . $this->childBirthday . '  ';
    }

    public function getChildName(): string
    {
        return $this->childName;
    }

    public function getChildBirthday(): string
    {
        return $this->childBirthday;
    }
}
class Car
{
    private $carModel;
    private $carSpeed;

    public function __construct($carModel, int $carSpeed)
    {
        $this->carModel = $carModel;
        $this->carSpeed = $carSpeed;
    }

    public function __toString()
    {
        return $this->carModel . '  ' . $this->carSpeed . '  ';
    }

    public function getCarModel(): string
    {
        return $this->carModel;
    }

    public function getCarSpeed(): string
    {
        return $this->carSpeed;
    }
}

$input = [
    'PeshoPeshev company PeshInc Management 1000.00',
    'TonchoTonchev car Trabant 30',
    'PeshoPeshev pokemon Pikachu Electricity',
    'PeshoPeshev parents PoshoPeshev 22/02/1920',
    'TonchoTonchev pokemon Electrode Electricity',
    'End',
    'TonchoTonchev'
];

$people = [];


for ($i = 0; $i < count($input); $i++) {
    if ($input[0] == 'End') {
        break;
    }

    $input2 = array_shift($input);
    $input2 = explode(" ", $input2);

    $name = $input2[0];

    if (!in_array($name, $people)) {
        $person = new Person($name);
    }

    switch ($input2[1]) {

        case "company":
            $companyName = $input2[2];
            $department = $input2[3];
            $salary = intval($input2[4]);
            $company = new Company($companyName, $department, $salary);

            $person->setCompany($company);
            break;

        case "pokemon":
            $pokemonName = $input2[2];
            $type = $input2[3];
            $pokemon = new Pokemon($pokemonName, $type);

            $person->setPokemon($pokemon);

            break;

        case "parents":
            $parentName = $input2[2];
            $birthDay = $input2[3];
            $parent = new Parents($parentName, $birthDay);

            $person->setParents($parent);
            break;

        case "children":
            $childName = $input2[2];
            $childBirthDay = $input2[3];
            $child = new Children($childName, $childBirthDay);

            $person->setChildren($child);
            break;

        case "car":
            $carModel = $input2[2];
            $carSpeed = $input2[3];
            $car = new Car($carModel, $carSpeed);

            $person->setCar($car);

            break;
    }

    $people[] = $person;
}

foreach ($people as $person) {

    if ($person->getName() == $input[2])
        echo $person->getName() .
            ' <br> ' .
            'Company:' . '<br>' . $person->getCompany().
            'Car:' . '<br>' . $person->getCar().
            'Pokemon:' . '<br>' . $person->getPokemon().
            'Parents:' . '<br>' . $person->getParents().
            'Children:' . '<br>' . $person->getChildren();
}

