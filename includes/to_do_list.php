<?php 
$stmt = $pdo->query("SELECT * FROM todo_list ORDER BY id DESC");
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
                    <label for="task-<?php echo $task['id']; ?>"> <?php echo $task['id']; ?>. <?php echo $task['item_name']; ?></label>
                    <div class="btn-container">
                        <!-- <a class="btn-delete" href="delete">Delete</a> -->
                        <a class="btn-edit" href="index.php?action=edit&id=1" >Edit</a>
                    </div>
                </li>
            <?php } 
            }?>             
</ul>