<?php 

session_start();
require '../config/connect.php';

$id = $_POST['id_auto']; 
$query = $pdo->prepare("SELECT * FROM `product`
  INNER JOIN `brands` ON product.id_brand = brands.id_brand
  INNER JOIN `type_box` ON product.id_box = type_box.id_type
  WHERE `id_product` = :id_auto
");
$query->execute([':id_auto' => $id]);

$row = $query->fetch(PDO::FETCH_OBJ);

$response = [
  "status" => 200,
  "message" => "Успешно обновлён",
  "values" => $row
];
http_response_code(200);
echo json_encode($response);

?>