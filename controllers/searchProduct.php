<?php 

session_start();
require '../config/connect.php';

$name = $_POST['name']; 
$query = $pdo->prepare("SELECT * FROM `product`WHERE `name_auto` LIKE ?");
$params = ["%$name%"];
$query->execute($params);

$row = $query->fetchAll(PDO::FETCH_OBJ);

$response = [
  "status" => 200,
  "message" => "Запрос успешно обработан",
  "status_id" => 1,
  "values" => $row
];
http_response_code(200);
echo json_encode($response);


?>