<?php 

$host = "localhost";
$db_name = "car-rental";
$user = "root";
$pass = "root";

$dsn = "mysql:host=$localhost;dbname=$db_name";
$pdo = new PDO($dsn, $user, $pass);

?>