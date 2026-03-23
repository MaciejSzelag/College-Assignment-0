<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $item_name = htmlspecialchars(trim($_POST["item_name"]));
        //trim: 

        // echo $item_name;
        var_dump($item_name);
    };