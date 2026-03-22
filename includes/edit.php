<form id="todo-form">
    <label for="todo-input">Edit task</label>
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['token']; ?>">
    <input type="hidden" name="action" value="add">
    <input type="text" id="todo-input" value="Edit task" required>
    <div class="btn-wrap">
        <button type="submit">Submit</button> 
        <a href="index.php">Cancel</a> 
    </div>
</form>