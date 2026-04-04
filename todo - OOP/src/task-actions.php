 <?php
        class TaskManager {
            private $db;  //connection PDO          

            public function __construct($dataBaseConnection){
                $this->db = $dataBaseConnection;
            }

            public function stmt($sql){
                  return   $this->db->prepare($sql);
            }

            public function addTask($taskName) {
                 $taskName = trim($taskName);
                    if(empty($taskName))  return false;
            
                    $sql = "INSERT INTO tasks (item_name) VALUES (:task)";
                    $stmt = $this->stmt($sql);

                    return $stmt->execute([
                        ':task' => $taskName
                        ]);
            }

            public function deleteTask($id){
                if(empty($id)) return false;

                $sql = "DELETE FROM tasks WHERE id = :id";
                $stmt = $this->stmt($sql);

                return $stmt->execute([':id' => $id]);
            }

            public function updateTask($id, $taskName){
                    $taskName = trim($taskName);
                    if(empty($id) || $taskName === '') return false;

                    $sql = "UPDATE tasks SET item_name = :task WHERE id = :id";
                    $stmt = $this->stmt($sql);
                    return $stmt->execute([
                        ':task'=>$taskName,
                        ':id'=>$id
                    ]);
            }

            public function toggleTaskStatus($id){
                if(empty($id)) return false;

                $sql = "UPDATE tasks SET status = NOT status WHERE id = :id";
                $stmt = $this->stmt($sql);

                return $stmt->execute([
                    ':id'=>$id
                ]);
            }
             public function sessionAlert($objectName, $msgAlertSuccess, $msgAlertError){
                if($objectName){
                    $_SESSION['message'] = "<span class='alert-success'>". $msgAlertSuccess ."</span>";
                }else{

                    $_SESSION['message'] = "<span class='alert-error'>". $msgAlertError ."</span>";
                };
             }
         

        }