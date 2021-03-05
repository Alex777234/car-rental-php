<?php 

session_start();
require '../config/connect.php';

$id = $_POST['id_auto']; 
$query = $pdo->prepare("DELETE FROM `product` WHERE `id_product` = :id_auto");
$query->execute([':id_auto' => $id]);

$row = $query->fetch(PDO::FETCH_OBJ);

$response = [
  "status" => 200,
  "status_id" => 1,
  "message" => "Запись успешно удалена"
];
http_response_code(200);
echo json_encode($response);

?>