<?php
header('Content-Type: application/json');
$conn = null;
$DB_HOST = 'localhost';
$DB_NAME = 'dblogin';
$DB_USER = 'root';
$DB_PASSWORD = '';

try {
    $conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e){
    var_dump($e);
}
// var_dump($conn);

?>