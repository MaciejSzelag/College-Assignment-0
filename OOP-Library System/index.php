<?php 
include "classes.php";

// Tabela autorów
        $authorsData = [
            1 => ['id' => 1, 'f_name' => 'George', 'l_name' => 'Orwell'],
            2 => ['id' => 2, 'f_name' => 'Jane', 'l_name' => 'Austen'],
            3 => ['id' => 3, 'f_name' => 'Stephen', 'l_name' => 'King'],
        ];

        // Tabela książek (z kolumną author_id jako kluczem obcym)
        $booksData = [
            ['title' => '1984', 'author_id' => 1, 'year' => 1949, 'pages' => 328, 'price' => 10.99],
            ['title' => 'Animal Farm', 'author_id' => 1, 'year' => 1945, 'pages' => 112, 'price' => 8.50],
            ['title' => 'Pride and Prejudice', 'author_id' => 2, 'year' => 1813, 'pages' => 278, 'price' => 9.99],
            ['title' => 'The Shining', 'author_id' => 3, 'year' => 1977, 'pages' => 447, 'price' => 14.99],
        ];

        // first I have to create object(author) 

        $authors = [];
        foreach($authorsData as $id => $data){
            $authors[$id] = new Author($data['id'], $data['f_name'], $data['l_name']);
        }

        // right now i ahve to create library - and connect them using ID
        $library = [];
        foreach($booksData as $data){

            $author = $authors[$data['author_id']];

            $library[] = new Book (
                $data['title'], 
                $author,
                $data['year'],
                $data['pages'],
                $data['price']
            );


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
<main class="constainer">
    <h1>Library</h1>
    <section class="list">
        <?php
            foreach($library as $book){
        ?>
                    <div class="box">
                        <?php echo $book->getInfo(); ?>

                    </div>

       <?php };?>
    </section>


</main>



    
</body>
</html>