<?php 
include "classes.php";

// Data symulation
$authorsData = [
    1 => ['id' => 1, 'f_name' => 'George', 'l_name' => 'Orwell'],
    2 => ['id' => 2, 'f_name' => 'Jane', 'l_name' => 'Austen'],
    3 => ['id' => 3, 'f_name' => 'Stephen', 'l_name' => 'King'],
];

$booksData = [
    ['title' => '1984', 'author_id' => 1, 'year' => 1949, 'pages' => 328, 'price' => 10.99],
    ['title' => 'Animal Farm', 'author_id' => 1, 'year' => 1945, 'pages' => 112, 'price' => 8.50],
    ['title' => 'Pride and Prejudice', 'author_id' => 2, 'year' => 1813, 'pages' => 278, 'price' => 9.99],
    ['title' => 'The Shining', 'author_id' => 3, 'year' => 1977, 'pages' => 447, 'price' => 14.99],
];

$ebooksData = [
    ['title' => 'Pride and Prejudice', 'author_id' => 2, 'year' => 1998, 'pages' => 400, 'price' => 5.99, 'fileSize' => 2.4, 'format' => 'PDF'],
];

// 2. logic creating objects

// I am creating objects
$authors = [];
foreach($authorsData as $id => $data){
    $authors[$id] = new Author($data['id'], $data['f_name'], $data['l_name']);
}



// library: ebooks
 $myEbookLibrary = new Library();
    foreach($ebooksData as $eBookData){
        $author = $authors[$eBookData['author_id']];
        $myEbookLibrary->addBookItem(new Ebook($eBookData['title'],$author, $eBookData['pages'], $eBookData['year'], $eBookData['price'], $eBookData['fileSize'],$eBookData['format']));
    }

   
 $myLibrary = new Library();
    foreach($booksData as $data){
        $author = $authors[$data['author_id']];
        $myLibrary->addBookItem(new Book($data['title'],$author, $data['pages'],$data['year'], $data['price']));
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library system using OOP</title>
    <link rel="stylesheet" href="css/style.min.css">
</head>
<body>
<main class="container"> 
    <h1 class="top-title">Books</h1>
    <section class="list">
     
       
                <?php echo $myLibrary->showAllCatalog(); ?>
           
          
       
    </section>

    <h1 class="top-title">Ebooks</h1>
    <section class="list">
        <?php echo $myEbookLibrary->showAllCatalog(); ?>
    </section>

</main>
</body>
</html>