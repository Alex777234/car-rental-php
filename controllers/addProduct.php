<?php 

session_start();
require '../config/connect.php';

$brand = $_POST['id_brand'];
$name = $_POST['name'];
$img = $_POST['image'];
$box = $_POST['id_box'];
$year = $_POST['year'];
$capacity = $_POST['capacity'];
$rental = $_POST['rental'];


if (!empty($_FILES['image']['tmp_name'])) {
  $path = __DIR__ . "/upload-files/" . md5("asdjla32423vxvmxzc90820434mnasdm324").time() . ".png";
  if (copy($_FILES['image']['tmp_name'], $path)) {
    $img = md5("asdjla32423vxvmxzc90820434mnasdm324").time() . ".png";
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
  $query = $pdo->prepare("INSERT INTO `product` (`id_brand`, `name_auto`, `img_auto`, `id_box`, `year_release`, `engine_capacity`, `price_rental`)
  VALUES (:brand, :name, :img, :id_box, :year_release, :engine, :rental)");
  $query->execute([
    ':brand' => $brand,
    ':name' => $name,
    ':img' => $img,
    ':id_box' => $box,
    ':year_release' => $year,
    ':engine' => $capacity,
    ':rental' => $rental
  ]);

  $response = [
    "status" => 201,
    "message" => "Успешно добавлен"
  ];
  http_response_code(201);
  echo json_encode($response);
}


?>