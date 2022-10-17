<?php 

$server_name='localhost';
$db_name='aspasieetmathieu';
$user_name='root';
$password = "";

// Si sur Windows $password = "";

try {
    $conn=mysqli_connect($server_name, $user_name, $password, $db_name) or die("Could not connect to database");
    $connectionString = "mysql:host=".$server_name.";dbname=".$db_name."";
    $pdo = new PDO($connectionString, $user_name, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}
