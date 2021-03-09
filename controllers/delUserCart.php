<?php 

session_start();
require '../config/connect.php';

$id_prod = $_POST['id_product']; 
$id = $_SESSION['user']['id']; 
$query = $pdo->prepare("DELETE FROM `user_cart` WHERE `id_user` = :user AND `id_product` =:product");
$query->execute([':user' => $id, ':product' => $id_prod]);

$query = $pdo->prepare("SELECT * FROM `user_cart`
  INNER JOIN `product` ON user_cart.id_product = product.id_product
  WHERE `id_user` = :user ORDER BY `date_rental`
");
$query->execute([':user' => $id_user]);

$row = $query->fetchAll(PDO::FETCH_OBJ);

$response = [
  "status" => 200,
  "status_id" => 1,
  "message" => "Бронь успешно отменена",
  "values" => $row
];
http_response_code(200);
echo json_encode($response);

?>