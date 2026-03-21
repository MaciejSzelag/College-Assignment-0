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
                <li><a href="">All tasks</a></li>
                <li><a href="">Add</a></li>
            </ul>
        </div>

    </nav>
    <main>
      
        <div class="container">
            <div class="wrap">
                   
                <section class="section-form">
                   <h1>To-Do List</h1>
                    <form id="todo-form">
                        <label for="todo-input">Add new task</label>
                        <input type="text" id="todo-input" placeholder="Add a new task" required>
                        <button type="submit">Add</button>
                    </form>
                </section>
            </div>

            <div class="wrap">
                <section class="section-todo-list">
                    <ul id="todo-list">
            <?php for ($i = 1; $i < 51; $i++): ?>
                <li>
                    <!-- <input type="checkbox" id="task-<?php echo $i; ?>"> -->
                    <label for="task-<?php echo $i; ?>"> Task no <?php echo $i; ?></label>
                    
                    <div class="btn-container">
                        <button class="btn-delete" type="button">Delete</button>
                        <button class="btn-edit" type="button">Edit</button>
                    </div>
                </li>
            <?php endfor; ?>
                       
                    </ul>
                </section>
            </div>
        </div>
    </main>



</body>

</html>