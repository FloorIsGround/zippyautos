<?php
$dsn = "mysql:host=localhost; dbname=zippyusedautos";
$username = 'root';
$password = 'upanddown1';
try {
    $db = new PDO($dsn, $username, $password);
}catch(PDOException $e){
    error_log($e->getMessage());
    die("Database connection is failed");
}