<!-- class declaration -->

<?php 
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



// class: blueprint for creating objects

class Product {
    protected string $title; //protected let children (book) see this field
    protected float $price;

    public function __construct(string $title, float $price){
        $this->title =  $title;
        $this->setPrice($price); // setter in the construct
    }
  
    // setter with validation - example of encapsulation

    //it allows to inform that price cannot be below 0; validate data integrity
    public function setPrice(float $price){
        if($price < 0){
            throw new Exception("Price cannot be less than 0!");
        }
        $this->price = $price;
    }
        //Polymorphizm - this method will be overridden in child classes
    public function getInfo(): string {
        return "Porduct: {$this->title}, Price: £{$this->price}";
    }

}



//inheritance (Book extends Product) - Book clss inherits properties and methods from Product

class Book extends Product{
    public Author $author; // composition - using an object inside another object
    private int $pages; // privete - only this class sees it.
    public int $year;
   

    public function __construct(string $title, Author $author, int $pages,int $year, float $price)
    {
        // calling the parent constructor  - inheritence
        parent::__construct($title, $price);
        $this->author = $author;
        $this->pages = $pages;
        $this->year = $year;
    }

    //polymphorism  - overriding the parent'sgetInfo method

    public function getInfo(): string
    {
       return "
        <h1 class='title'>Book: {$this->title}</h1>
        <ul style='list-style: none; padding: 0;'>
            <li><strong>Author:</strong> {$this->author->firstName} {$this->author->lastName}</li>
            <li><strong>Published:</strong> {$this->year}</li>
            <li><strong>Pages:</strong> {$this->pages}</li>
            <li><strong>Price:</strong> <span style='color: green; font-weight: bold;'>£" . number_format($this->price, 2) . "</span></li>
        </ul>
    ";
    }

}

class Ebook extends Book {
    private float $fileSize;
    private string $format;

    public function __construct(string $title, Author $author, int $pages,int $year, float $price, float $fileSize, string $format = "EPUB"){

        // data from class Book (constructor) 
        parent::__construct($title, $author, $pages, $year, $price);
        
        $this->fileSize = $fileSize;
        $this->format = $format;

    }
    //polymphorism  - overriding the parent'sgetInfo method
    // overwriting getInfo() - adding informations oabout a file 

    public function getInfo():string {
        $bookBaseInfo = parent::getInfo(); // retrieving the list form call Book

        return str_replace("</ul>", "
            <li><strong>Format:</strong> {$this->format}</li>
            <li><strong>File Size:</strong> {$this->fileSize} MB</li>
        </ul>", $bookBaseInfo);
    }
}

class Library {

//one array bc of Polymorphism
    private array $bookItems = [];

        //any object - instance of Product
        public function addBookItem(Product $bookItem){
            $this->bookItems[] = $bookItem;
        }
    //single method displays book and ebooks
        public function showAllCatalog(){
            foreach($this->bookItems as $book){
                echo "<div class='box'> {$book->getInfo() }</div>";

            }

        }


}
