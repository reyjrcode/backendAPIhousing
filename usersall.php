<?php
require "db.php";

$results = [];
if ($_SERVER['REQUEST_METHOD'] == 'GET'){

    try {
        // $stmt=$conn->query("SELECT * FROM user WHERE STATUS='active' order by id")->fetchAll(PDO::FETCH_OBJ);
        // $stmt=$conn->query("SELECT * FROM user order by id")->fetchAll(PDO::FETCH_OBJ);
        // #select *, concat (id,' ',firstname,' ',lastname) as fullname from user  order by id 
        // $stmt=$conn->query("SELECT *, CONCAT (id,' ',firstname,' ',lastname) AS fullname FROM USER ORDER BY id")->fetchAll(PDO::FETCH_OBJ);
        $stmt=$conn->query("SELECT employee.id, employee.firstname, employee.lastname,employee.username,employee.password,employee.status, position.department_name, position.rate
        FROM USER employee INNER JOIN departmenttable POSITION ON employee.department_id=position.department_id ORDER BY id ")->fetchAll(PDO::FETCH_OBJ);

    $results['Users']=$stmt;

    echo json_encode($results);
    } catch (PDOException $e){
        var_dump($e);
    }

}
?>