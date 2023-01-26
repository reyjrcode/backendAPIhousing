<?php
require "db.php";
 
$results = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
   
    

    try {
       
        $stmt=$conn->prepare("DELETE from user where id=:id");
        $stmt->execute([':id'=>$_POST['id']]);

        if ($stmt)
            {
            $results['deleted'] = 'success';
            $Users=$conn->query("SELECT * from user")->fetchAll(PDO::FETCH_OBJ);
            $results['Users'] = $Users;
            }
        else
            $results['deleted'] = 'failed';
    
    echo json_encode($results);
    } catch (PDOException $e){
        var_dump($e);
    }

   
}
?>