<?php 
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "e-learning_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch (PDOException $e) {
    echo "Failed " . $e->getMessage();
}    
?>