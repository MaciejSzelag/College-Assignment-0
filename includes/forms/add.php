





<form  action="processes/process.php" method="POST">
    <label for="todo-input">Add new task</label>
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['token']; ?>">
    <input type="hidden" name="action" value="add">
    <input type="text" id="todo-input" name="task" placeholder="Add a new task" required>
    <div class="btn-wrap">
        <button class="btn-wide" type="submit" name="submit_task">Add</button>
    </div>
</form>