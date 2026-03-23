<?php 
    include 'db_connect.php';
    session_start();
    // ---------------------------CSRF-------------------------------
    // csrf 
    // creating csrf token id it doesnt exist 

    if(empty($_SESSION['token'])){
        $_SESSION['token'] = bin2hex(random_bytes(32));
    }

    // checking when sending
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['token']){
             die('Security Error: Invalid CSRF token');
        }
    }
    // ---------------------------CSRF-------------------------------

    // ---------------------------form to display-------------------------------
    // form display - add or edit
    $formMode = isset($_GET['action']) && $_GET['action'] === 'edit'?'edit' : 'add';
    // ---------------------------form to display-------------------------------
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>My To Do List</title>
    <link rel="stylesheet" href="css/style.min.css">
</head>

<body>
    <nav>
        <div>
            <p>
                <?php echo date("D d F Y")?>
            </p>
        </div>
        <div class="nav-list">
            <ul>
                <li><a href="index.php">All tasks</a></li>
                <li><a href="index.php">Add</a></li>
            </ul>
        </div>

    </nav>
    <main>
      
        <div class="container">
            <div class="wrap">
                   
                <section class="section-form">
                   <h1>To-Do List</h1>
                   <?php 
                   
                   if ($formMode === 'edit'){
                        include 'includes/edit.php';
                   }else{
                        include 'includes/add.php';
                   }
                   ?>
                
                </section>
            </div>

            <div class="wrap">
                <section class="section-todo-list">
                    <?php 
                        include 'includes/to_do_list.php';
                   ?>
                </section>
            </div>
        </div>
    </main>



</body>

</html>