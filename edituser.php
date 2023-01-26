
// require "db.php";
// $results = [];
// if ($_SERVER['REQUEST_METHOD'] == 'POST'){
   
    

//     try {
       
//         $stmt=$conn->prepare("UPDATE user set firstname=:firstname, lastname=:lastname, username=:username, password=:password where id=:id");
//         $stmt->execute([':firstname'=>$_POST['firstname'],
//         ':lastname' => $_POST['lastname'],
//         ':username' => $_POST['username'],
//         ':password'=>($_POST['password']),
//         ':id'=>(int)$_POST['id']]);
        
      
//        if($stmt){
//             $results['output'] = 'success';
//             $Users = $conn->query("SELECT * from user  ")->fetchAll(PDO::FETCH_OBJ);
//             $results['Users'] = $Users;
//        }
//        else{
//             $results['output'] = 'error';
//        }

//     echo json_encode($results);
//     } catch (PDOException $e){
//         var_dump($e);
//     }
// }

<?php
require "db.php";
$results = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
   
    

    try {
       
        // $stmt=$conn->prepare("UPDATE user set firstname=:firstname, lastname=:lastname, username=:username, password=:password where id=:id");
        $stmt=$conn->prepare("UPDATE user set firstname=:firstname, lastname=:lastname, username=:username, password=:password,department_id=:department_id where id=:id");
        $stmt->execute([':firstname'=>$_POST['firstname'],
        ':lastname' => $_POST['lastname'],
        ':username' => $_POST['username'],
        ':password'=>($_POST['password']),
        ':department_id'=>($_POST['department_id']),
        ':id'=>(int)$_POST['id']]);
        
      
       if($stmt){
            $results['output'] = 'success';
            $Users = $conn->query("SELECT * from user  ")->fetchAll(PDO::FETCH_OBJ);
            $results['Users'] = $Users;
       }
       else{
            $results['output'] = 'error';
       }

    echo json_encode($results);
    } catch (PDOException $e){
        var_dump($e);
    }

   
}
?>
?>