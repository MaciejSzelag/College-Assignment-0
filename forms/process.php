


    <?php 
    session_start();
        require_once "../db_connect.php";

        // var_dump($_POST); 
        // die();

        function addTask($db, $taskName){

            $taskName = trim($taskName);

            if(empty($taskName)){
                return false;
            }

            $sql = "INSERT INTO todo_list (item_name) VALUES (:task)";
            $stmt = $db->prepare($sql);

            return $stmt->execute([
                ':task' => $taskName
            ]);
        }

        function deleteTask($db,$id){
            if(empty($id)){
                return false;
            }

            $sql = "DELETE FROM todo_list WHERE id = :id";
            $stmt = $db->prepare($sql);
            return $stmt->execute([':id'=>$id]);

        }
        function updateTask($db, $id, $taskName){
            $taskName = trim($taskName);

           
            if (empty($id) || $taskName === '') {
                return false;
            }

            $sql = "UPDATE todo_list SET item_name = :task WHERE id = :id";
            $stmt = $db->prepare($sql);
            return $stmt->execute([
                ':task' => $taskName,
                ':id' => $id
            ]);
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!isset($_POST['action'])){
                die('No action');
            };


            switch($_POST['action']){
            case 'add':
                if(addTask($pdo, $_POST['task'])){
                    $_SESSION['message'] = "Task added successfully";
                }else{
                    $_SESSION['message'] = "Error adding task to data base";
                };
                break;
            case 'delete':
                if(deleteTask($pdo, $_POST['id'])){
                    $_SESSION['message'] = "Task deleted successfully";
                }else{
                    $_SESSION['message'] = "Error deleting task";
                };
                break;
            case 'update':
                if(updateTask($pdo, $_POST['id'], $_POST['item_name'])){
                    $_SESSION['message'] = "Task has been updated successfully";
                }else{
                    $_SESSION['message'] = "Error updating task";
                };
                break;
            }


            header('Location: ../index.php');
            exit;

        }
        // else{

        //     error_reporting(E_ALL);
        //     ini_set('display_errors', 1);

        //     echo "<pre>";
        //     print_r($_POST);
        //     echo "</pre>";

        // }


    ?>