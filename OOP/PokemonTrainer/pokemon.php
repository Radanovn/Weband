<?php

class Trainer
{
    private $name;
    protected $number;
    protected $badges;
    protected $pokemons;
    private function __construct(string $name, int $number, $badges = 0, Pokemon $pokemons)
    {
        $this->name = $name;
        $this->number = $number;
        $this->badges = $badges;
        $this->pokemons = $pokemons;
    }

    protected function getName(): string
    {
        return $this->name;
    }

    protected function getNumbers(): int
    {
        return $this->number;
    }

    protected function getBadges(): int
    {
        return $this->badges;
    }

    protected function badges(): int
    {
        return $this->badges++;
    }

}


class Pokemon
{

    private $name;
    protected $element;
    protected $health;

    private function __construct($name, $element, $health)
    {
        $this->name = $name;
        $this->element = $element;
        $this->health = $health;
    }

    protected function getName(): string
    {
        return $this->name;
    }

    protected function getElement(): string
    {
        return $this->element;
    }

    protected function gethealth(): string
    {
        return $this->health;
    }

    protected function minusHealth(): int
    {
        return $this->health -= 10;
    }
}

$input = [
'Pesho Charizard Fire 100',
'Gosho Squirtle Water 38',
'Pesho Pikachu Electricity 10',
'Tournament',
'Fire',
'Electricity',
'End',
];
for ($i=0; $i < count($input); $i++) { 
    $pokemon = array_shift($input);
    $pokemon = explode(' ', $pokemon);
if($pokemon[0] == "Tournament") {
    while($pokemon === 'End') {
        
    }
}

}



print_r($pokemon);
print_r($input);
