
<?php 
    include 'config/db_connect.php';

    $id = $_GET['id'] ?? null;
    if($id){
        $stmt = $pdo->prepare("SELECT id, item_name FROM tasks WHERE id = :id");
        $stmt->execute([':id'=> $id]);
        $task = $stmt->fetch();
    }
    if(!$task){
        die("Task was not found");
    }
?>
<form action="processes/process.php" method="POST" >
    <label for="todo-input">Edit task</label>
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['token']; ?>">
    <input type="hidden" name="action" value="update">
    <input type="hidden" name="id" value="<?php echo $task['id']; ?>">

    <input type="text" name="item_name" value="<?php echo htmlspecialchars($task['item_name'])  ?>" required>
    <div class="btn-wrap">
        <button type="submit">Submit</button> 
        <a class="btn-cancel" href="index.php">Cancel</a> 
    </div>
</form>