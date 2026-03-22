<ul id="todo-list">
            <?php for ($i = 1; $i < 51; $i++): ?>
                <li>
                    <!-- <input type="checkbox" id="task-<?php echo $i; ?>"> -->
                    <label for="task-<?php echo $i; ?>"> Task no <?php echo $i; ?></label>
                    
                    <div class="btn-container">
                        <!-- <a class="btn-delete" href="delete">Delete</a> -->
                        <a class="btn-edit" href="index.php?action=edit&id=1" >Edit</a>
                    </div>
                </li>
            <?php endfor; ?>
                       
</ul>