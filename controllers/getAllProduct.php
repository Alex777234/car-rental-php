<?php 

session_start();
require '../config/connect.php';

$query = $pdo->query("SELECT * FROM `product` INNER JOIN `type_box` ON product.id_box = type_box.id_type ORDER BY `id_product`");
$row = $query->fetchAll(PDO::FETCH_OBJ);

if ($row > 0) {
  $response = [
    "status" => 200,
    "message" => "Запрос успешно обработан",
    "status_id" => 0,
    "values" => $row
  ];
  http_response_code(200);
  echo json_encode($response);
} else {
  $response = [
    "status" => 204,
    "message" => "Автомобили не найдены",
    "status_id" => 0,
    "values" => $row
  ];
  http_response_code(204);
  echo json_encode($response);
}

?>