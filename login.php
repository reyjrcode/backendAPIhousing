<?php
require "db.php";

$results = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST'){


    try {
        // $stmt=$conn->prepare("SELECT * FROM USER WHERE id=:id");
       $stmt=$conn->prepare("SELECT * FROM USER WHERE id=:id and status='active'");
        $stmt->execute([':id'=>$_POST['id']]);
        $stmts=$stmt->fetch(PDO::FETCH_ASSOC);



        if($stmt){ 
            
            if($stmts['password'] == $_POST['password'])
            {
            $results['auth']='passed';
            $results['id']=$_POST['id'];
            }
            else
            $results['auth']='failed';
        }
        else
        $results['auth']='none';
        
        
        echo json_encode($results);
    } catch (PDOException $e){
        var_dump($e);
    }

}



?>