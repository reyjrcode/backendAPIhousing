<?php
require "db.php";
$results = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
 
    $dataArguments = [
    
        ':firstname' => $_POST['firstname'],
        ':lastname' => $_POST['lastname'],
        ':username' => $_POST['username'],
        ':password' => $_POST['password'],
        // ':password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
        
    ];
    $queryString = "";

   
       
        $queryString = "INSERT INTO USER (firstname,lastname,username,PASSWORD, status) VALUES (:firstname,:lastname,:username, :password,'active')";
    

    try {
        $stmt = $conn->prepare($queryString);
        $stmt->execute($dataArguments);
        
        // $results['user_id'] = $user_id ? $user_id : $conn->lastInsertId();
        
        $results['user'] = $conn->query("SELECT firstname FROM user WHERE firstname={$_POST['firstname']}")->fetchAll(PDO::FETCH_OBJ);
        
        echo json_encode($results);
    } catch (PDOException $e){
        var_dump($e);
    }
    
}
?>