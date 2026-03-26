<?php 
include 'config/db_connect.php';
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
                $i = 1;
               foreach($tasks as $task){ ?>

               
              <li class="<?= $task['completed'] ? 'completed' : '' ?>">

                <span >
                    <span class="is_completed"> <?php echo $task['completed'] ? '&#9989;' : '&#11093;' ?></span>
                    <?php echo $i; ?>.
                    <?php echo $task['item_name']; ?>
                   
                   
                </span>
                <div class="btn-container">
                    <!-- <a class="btn-delete" href="delete">Delete</a> -->
                     <form method="POST" action="processes/process.php" style="display:inline;">
                        <input type="hidden" name="action" value="toggle_status">
                        <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['token']; ?>">
                        
                        <button type="submit" class="btn-status">
                            <?php echo $task['completed'] ? '&#9989 Done' : '&#11093 Mark as done'; ?>
                        </button>
                    </form>

                    <?php if(!$task['completed']){ ?>
                    <a class="btn-edit" href="index.php?action=edit&id=<?php echo $task['id']; ?>">Edit</a>

                    <?php }; ?>
                    <form action="processes/process.php" method="POST" style="display:inline;">

                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['token']; ?>">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                     
                            <button type="submit" class="btn-delete">
                                Delete
                            </button>
                  
                    </form>

                </div>
            </li>
            <?php
            $i++; } 
            }?>
</ul>