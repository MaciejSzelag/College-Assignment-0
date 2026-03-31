<!-- class declaration -->

<?php 
// Encapsulation and inherance 

class Product {
    protected string $title; //protected let children (book) see this field
    protected float $price;

    public function __construct(string $title, float $price){
        $this->title =  $title;
        $this->setPrice($price); // setter in the construct
    }
  
    // setter with validation - example of encapsulation

    //it allows to inform that price cannot be below 0;
    public function setPrice(float $price){
        if($price < 0){
            throw new Exception("Price cannot be less than 0!");
        }
        $this->price = $price;
    }

    public function getInfo(): string {
        return "Porduct: {$this->title}, Price: £{$this->price}";
    }

}


// information about author
class Author {
    public int $id;
    public string $firstName;
    public string $lastName;

    public function __construct($id,$fn,$ln){
        $this->id = $id;
        $this->firstName = $fn;
        $this->lastName = $ln;
    }

}


//inheritance (Book extends Product)

class Book extends Product{
    public Author $author; // composition
    private int $pages; // privete - only this class sees it
    public int $year;

    public function __construct(string $title, Author $author, int $pages,int $year, float $price)
    {
        // call out : parent's constructor - Producct
        parent::__construct($title, $price);
        $this->author = $author;
        $this->pages = $pages;
        $this->year = $year;
    }

    //polymphorism  - nadpisanie metody

    public function getInfo(): string
    {
        return "Book:'{$this->title}' by {$this->author->lastName}, Published: {$this->year}, Pages: {$this->pages}, Price: £{$this->price}";

    }

}
