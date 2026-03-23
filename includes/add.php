<form id="todo-form" action="forms/process.php" method="POST">
    <label for="todo-input">Add new task</label>
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['token']; ?>">
    <input type="hidden" name="action" value="add">
    <input type="text" id="todo-input" name="item_name" placeholder="Add a new task" required>
    <div class="btn-wrap">
        <button class="btn-wide" type="submit">Add</button>
    </div>
</form>