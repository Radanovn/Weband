<?php

class Book
{
    private $title;
    private $author;
    private $price;

    public function __construct(string $author, string $title, int $price)
    {
        $this->setTitle($title);
        $this->setTitle($author);
        $this->setPrice($price);
    }

    public function setTitle($title)
    {
        if (strlen(trim($title)) < 3) {
            throw new Exception("Title not valid!");
        }
        $this->title = $title;
    }

    public function setAuthor($author)
    {
        if (!ctype_digit($author)) {
            throw new Exception("Author is not valid");
        }
        $this->author = $author;
    }

    public function setPrice($price)
    {
        if ($price <= 0) {
            throw new Exception("Price is not valid!");
        }
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }
}

class GoldenEditionBook extends Book
{

    public function getPrice()
    {
        return parent::getPrice() * 1.3;
    }
}
$books = [];

$input = [
    'Ivo Andonov',
    'Under Cover',
    '10',
    'STANDARD'
];


for ($i=0; $i < count($input); $i++) { 
    
    $author = $input[0];
    $title = $input[1];
    $price = intval($input[2]);
    $book = $input[3];

    if ($book === "STANDARD") {
        $standart = new Book($author, $title, $price);
        $books[] = $standart;

    } else if ($book === "GOLD") {
        $gold = new GoldenEditionBook($author, $title, $price);
        $books[] = $gold;

    } else {
        throw new Exception("Type is not valid!");
    }
}

if($input[3] === "STANDARD") {
    echo "OK" . ' <br>  ' . $standart->getPrice($price);
} else if ($input[3] === "GOLD") {
    echo "OK" . ' <br>  ' . $gold->getPrice($price);

}
