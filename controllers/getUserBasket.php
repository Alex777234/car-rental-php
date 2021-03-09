<?php 

session_start();
require '../config/connect.php';

$id_user = $_SESSION['user']['id']; 
$query = $pdo->prepare("SELECT * FROM `user_cart`
  INNER JOIN `product` ON user_cart.id_product = product.id_product
  WHERE `id_user` = :user ORDER BY `date_rental`
");
$query->execute([':user' => $id_user]);

$row = $query->fetchAll(PDO::FETCH_OBJ);

$response = [
  "status" => 200,
  "message" => "Запрос успешно обработан",
  "values" => $row
];
http_response_code(200);
echo json_encode($response);

?>