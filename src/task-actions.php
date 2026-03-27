 <?php
        function addTask($db, $taskName){
            $taskName = trim($taskName);
            if(empty($taskName))  return false;
            
            $sql = "INSERT INTO tasks (item_name) VALUES (:task)";
            $stmt = $db->prepare($sql);

            return $stmt->execute([
                ':task' => $taskName
            ]);
        }

        function deleteTask($db,$id){
            if(empty($id)) return false;
            $sql = "DELETE FROM tasks WHERE id = :id";
            $stmt = $db->prepare($sql);
            return $stmt->execute([':id'=>$id]);

        }
        function updateTask($db, $id, $taskName){
            $taskName = trim($taskName);

            if (empty($id) || $taskName === '') return false;
            
            $sql = "UPDATE tasks SET item_name = :task WHERE id = :id";
            $stmt = $db->prepare($sql);
            return $stmt->execute([
                ':task' => $taskName,
                ':id' => $id
            ]);
        }
        function toggleTaskStatus($db, $id){
            if(empty($id)) return false;

            $sql = "UPDATE tasks SET status = NOT status WHERE id = :id";
            $stmt = $db->prepare($sql);
            return $stmt->execute([':id'=>$id]);
        }