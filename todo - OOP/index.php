<?php 
   

    session_start();
    // ---------------------------CSRF-------------------------------
    // csrf 
    // creating csrf token id if doesn't exist 

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
        <div class="date">
            <p>
                <?php echo date("D d F Y")?>
            </p>
        </div>
        <div class="nav-list">
            <?php 
            require_once "config/db.php";

            $db = new Conn();
            $pdo = $db->getPdo();
            $stmt = $pdo->query("SELECT COUNT(*) as total, SUM(status = 1) as done, SUM(status = 0) as todo FROM tasks");
            $countTasks = $stmt->fetch();
                ?>
                <ul>
                    <li class="li-counter todo">Tasks to do: <?php echo $countTasks['todo'] != 0 ? $countTasks['todo'] : "0"; ?></li>
                    <li class="li-counter done">Tasks completed: <?php echo $countTasks['done'] != 0 ? $countTasks['done'] : "0"; ?></li>
                    <li><a href="../OOP-Library System/">Task C - OOP - library system</a></li>
                </ul>
 
        </div>
        <?php if(isset($_SESSION['message'])): ?>
            <div id="popMSG">
                <?php 
                    echo $_SESSION['message']; 
                    unset($_SESSION['message']);
                ?>
            </div>
        <?php endif; ?>
    </nav>
    <main>
        <div class="container">
            <div class="wrap">  
                <section class="section-form">
                   <?php 
                        include $formMode === 'edit' ? 'includes/forms/edit.php' : 'includes/forms/add.php';
                   ?>              
                </section>
            </div>
            <div class="wrap">           
                <section class="section-todo-list">
                    <h1>To-Do List</h1>
                    <?php 
                        include 'includes/to_do_list.php';
                   ?>
                </section>
            </div>
        </div>
    </main>
<script src="js/script.js"></script>
</body>

</html>