<?php 
    session_start();
        require_once "../config/db.php";

        // var_dump($_POST); 
        // die();
        include "../src/task-actions.php";
        $db = new Conn();
        // $pdo = $db->getPdo(); //connection PDO
        $taskManager = new TaskManager($db->getPdo());

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!isset($_POST['action'])){
                die('No action');
            };
            switch($_POST['action']){
            case 'add':
                 $taskManager->sessionAlert($taskManager->addTask($_POST['task']), 'Task added successfully', 'Error adding task');
                break;
            case 'delete':
                  $taskManager->sessionAlert($taskManager->deleteTask($_POST['id']), 'Task deleted successfully', 'Error deleting task');
                break;
            case 'update':
                $taskManager->sessionAlert($taskManager->updateTask($_POST['id'], $_POST['item_name']), 'Task updated', 'Error updating task');
                break;
            case 'toggle_status':
                $taskManager->sessionAlert($taskManager->toggleTaskStatus($_POST['id']), 'Status updated', 'Error updating status');
                break;
            }
            header('Location: ../index.php');
            exit;

        }
?>