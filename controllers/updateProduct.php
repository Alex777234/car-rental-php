<?php 

session_start();
require '../config/connect.php';

$id = $_POST['id_auto'];
$brand = $_POST['id_brand'];
$name = $_POST['name'];
$box = $_POST['id_box'];
$year = $_POST['year'];
$capacity = $_POST['capacity'];
$rental = $_POST['rental'];


if (!empty($_FILES['image']['tmp_name'])) {
  $path = __DIR__ . "/upload-files/" . md5($_FILES['image']['tmp_name']).time() . ".png";
  if (copy($_FILES['image']['tmp_name'], $path)) {
    $img = md5($_FILES['image']['tmp_name']).time() . ".png";
  }
}

if ($brand == '' || $name == '' || $box == '' || $year == '' || $capacity == '' || $rental == '') {
  $response = [
    "status" => 400,
    "message" => "Проверьте правильность полей"
  ];
  http_response_code(400);
  echo json_encode($response);
} 
else {
  $query = $pdo->prepare("UPDATE `product` 
  SET `id_brand` = :brand, `name_auto` = :name, `id_box` = :id_box, `year_release` = :year_release, `engine_capacity` = :engine, `price_rental` = :rental
  WHERE `id_product` = :id_auto");
  $query->execute([
    ':brand' => $brand,
    ':name' => $name,
    ':id_box' => $box,
    ':year_release' => $year,
    ':engine' => $capacity,
    ':rental' => $rental,
    ':id_auto' => $id
  ]);

  $response = [
    "status" => 200,
    "status_id" => 1,
    "message" => "Успешно обновлён"
  ];
  http_response_code(200);
  echo json_encode($response);
}


?>