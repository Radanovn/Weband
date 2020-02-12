<?php

class Trainer
{
    public $name;
    public $number;
    public $badges;
    public $pokemons = [];
    public function __construct(string $name, int $badges = 0)
    {
        $this->name = $name;
        $this->badges = $badges;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getNumbers(): int
    {
        return $this->number;
    }

    public function getPokemons(): array
    {
        return $this->pokemons;
    }

    public function getBadges(): int
    {
        return $this->badges;
    }

    public function Badges(): int
    {
        return $this->badges++;
    }

    public function Pokemons(Pokemon $pokemon)
    {
        $this->pokemons[] = $pokemon;
    }

    public function countOfPokemons() {
        return count($this->pokemons);
    }

    public function pokemonCollection($collection) 
    {
        $this->pokemons = $collection;
    }

}


class Pokemon
{

    public $name;
    public $element;
    public $health;

    public function __construct($name, $element, $health)
    {
        $this->name = $name;
        $this->element = $element;
        $this->health = $health;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getElement(): string
    {
        return $this->element;
    }

    public function gethealth(): string
    {
        return $this->health;
    }

    public function minusHealth(): int
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

// $input = [
//     'Stamat Blastoise Water 18',
// 'Nasko Pikachu Electricity 22',
// 'Jicata Kadabra Psychic 90',
// 'Tournament',
// 'Fire',
// 'Electricity',
// 'Fire',
// 'End',
// ];

$trainersAndPokemons = [];
$namesOfTrainers = [];



for ($i = 0; $i < count($input); $i++) {
    if($input[0] === "Tournament") {
    break;
   }

   
    $input2 = array_shift($input);
    $input2 = explode(' ', $input2);


    $trainerName = $input2[0];
    $pokemonName = $input2[1];
    $pokemonElement = $input2[2];
    $pokemonHealth = intval($input2[3]);

    if(!in_array($trainerName, $namesOfTrainers)) {
        $pokemon = new Pokemon($pokemonName, $pokemonElement, $pokemonHealth);
        $trainer = new Trainer($trainerName);
        $trainer->Pokemons($pokemon);
        $trainersAndPokemons[] = $trainer;
        $namesOfTrainers[] = $trainerName;
    } else {
        $pokemon = new Pokemon($pokemonName, $pokemonElement, $pokemonHealth);
        foreach ($trainersAndPokemons as $trainerAndPokemon ) {
          if($trainerAndPokemon->getName() == $trainerName) {
              $trainerAndPokemon->Pokemons($pokemon);
          }
        }
    }
}

for ($i=0; $i < count($input); $i++) { 
    if($input[$i] === "End") {
     break;
    }
   

    foreach ($trainersAndPokemons as $trainerAndPokemon) {
        $pokemonsByTrainer = $trainerAndPokemon->getPokemons();
        
        foreach ($pokemonsByTrainer as $key => $pokemon) {
            
           if($pokemon->getElement() == $input[$i]) {
        
            
               $trainerAndPokemon->Badges();
           break;
           
           } else {
               $pokemon->minusHealth();
           }
        }
        
        $trainerAndPokemon->pokemonCollection($pokemonsByTrainer);
    }
}



foreach ($trainersAndPokemons as $trainerAndPokemon) {

   echo $trainerAndPokemon->getName() . ' ' . $trainerAndPokemon->getBadges() 
   . ' ' . $trainerAndPokemon->countOfPokemons() . ' <br> ' ;
}


