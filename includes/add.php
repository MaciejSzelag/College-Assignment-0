<form id="todo-form">
    <label for="todo-input">Add new task</label>
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['token']; ?>">
    <input type="hidden" name="action" value="add">
    <input type="text" id="todo-input" placeholder="Add a new task" required>
    <button type="submit">Add</button>
</form>