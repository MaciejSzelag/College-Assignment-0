<?php 
include 'db_connect.php';
$stmt = $pdo->query("SELECT * FROM todo_list ORDER BY id");
$tasks = $stmt->fetchAll();

?>


<ul id="todo-list">
    <?php 
            if(empty($tasks)){
                ?>
    <li>
        <label> There is no tasks</label>
    </li>
    <?php
            }else{
               foreach($tasks as $task){ ?>
    <li>
        <span >
            <?php echo $task['id']; ?>.
            <?php echo $task['item_name']; ?>
        </span>
        <div class="btn-container">
            <!-- <a class="btn-delete" href="delete">Delete</a> -->
            <a class="btn-edit" href="index.php?action=edit&id=<?php echo $task['id']; ?>">Edit</a>
            <form action="forms/process.php" method="POST" style="display:inline;">

                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['token']; ?>">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?php echo $task['id']; ?>">

                <button type="submit" class="btn-delete">
                    Delete
                </button>

            </form>

        </div>
    </li>
    <?php } 
            }?>
</ul>