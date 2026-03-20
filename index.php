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
    <p><?php echo date("D d F Y")?></p>
   </div>
   <div class="nav-list">
     <ul>
      <li><a href="">All tasks</a></li>
      <li><a href="">Add</a></li>
    </ul>
   </div>

  </nav>
    <main>
        <h1>To-Do List</h1>

        <section class="section-form">
            <form id="todo-form">
                <label for="todo-input">Add new task</label>
                <input type="text" id="todo-input" placeholder="Add a new task" required>
                <button type="submit">Add</button>
            </form>
        </section>

        <section class="section-todo-list">
            <ul id="todo-list">
              <li>
                    <!-- <input type="checkbox" id="task-1"> -->
                    <label for="task-1">Buy a milk</label>
                    <button type="button">Delete</button>
                </li><li>
                    <!-- <input type="checkbox" id="task-1"> -->
                    <label for="task-1">Buy a milk</label>
                    <button type="button">Delete</button>
                </li>
                <li>
                    <!-- <input type="checkbox" id="task-1"> -->
                    <label for="task-1">Buy a milk</label>
                    <button type="button">Delete</button>
                </li>
                <li>
                    <!-- <input type="checkbox" id="task-1"> -->
                    <label for="task-1">Buy a milk</label>
                    <button type="button">Delete</button>
                </li>
                <li>
                    <!-- <input type="checkbox" id="task-1"> -->
                    <label for="task-1">Buy a milk</label>
                    <button type="button">Delete</button>
                </li>
                <li>
                    <!-- <input type="checkbox" id="task-1"> -->
                    <label for="task-1">Buy a milk</label>
                    <button type="button">Delete</button>
                </li>
                <li>
                    <!-- <input type="checkbox" id="task-1"> -->
                    <label for="task-1">Buy a milk</label>
                    <button type="button">Delete</button>
                </li>
            </ul>
        </section>
    </main>

</body>
</html>