<?php 
    session_start();
        require_once "../config/db_connect.php";

        // var_dump($_POST); 
        // die();

       include "../src/task-actions.php";

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!isset($_POST['action'])){
                die('No action');
            };

            switch($_POST['action']){
            case 'add':
                if(addTask($pdo, $_POST['task'])){
                    $_SESSION['message'] = "<span class='alert-success'>Task added successfully</span>";
                }else{
                    $_SESSION['message'] = "<span class='alert-error'>Error adding task to data base</span";
                };
                break;
            case 'delete':
                if(deleteTask($pdo, $_POST['id'])){
                    $_SESSION['message'] = "<span class='alert-success'>Task deleted successfully</span>";
                }else{
                    $_SESSION['message'] = "<span class='alert-error'>Error deleting task</span>";
                };
                break;
            case 'update':
                if(updateTask($pdo, $_POST['id'], $_POST['item_name'])){
                    $_SESSION['message'] = "<span class='alert-success'>Task has been updated successfully</span>";
                }else{
                    $_SESSION['message'] = "<span class='alert-error'>Error updating task</span>";
                };
                break;
            case 'toggle_status':
                if(toggleTaskStatus($pdo, $_POST['id'])){
                    $_SESSION['message'] = "<span class='alert-success'>Status updated</span>";
                }else{
                    $_SESSION['message'] = "<span class='alert-error'>Error updating status</span>";
                }
            }
            header('Location: ../index.php');
            exit;

        }
?>