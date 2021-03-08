<?php 

session_start();
require '../config/connect.php';

$name = $_POST['name']; 
$query = $pdo->prepare("SELECT * FROM `product`WHERE `name_auto` LIKE ?");
$params = ["%$name%"];
$query->execute($params);

$row = $query->fetchAll(PDO::FETCH_OBJ);

if ($row == 0) {
  $response = [
    "status" => 400,
    "message" => "Данный авто не найден",
  ];
  http_response_code(400);
  echo json_encode($response);
} else {
  $response = [
    "status" => 200,
    "message" => "Запрос успешно обработан",
    "values" => $row
  ];
  http_response_code(200);
  echo json_encode($response);
}

?>