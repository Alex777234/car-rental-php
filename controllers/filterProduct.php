<?php 

session_start();
require '../config/connect.php';
$brand = $_POST["id_brand"];
$price_min = $_POST["price_min"];
$price_max = $_POST["price_max"];

if ($brand == '' && $price_min == '' && $price_min == '') {
  $response = [
    "status" => 400,
    "message" => "Проверьте правильность полей"
  ];
  http_response_code(400);
  echo json_encode($response);
  exit();
} else {
  if ($price_min == '' || $price_max == '') {
    $query = $pdo->prepare("SELECT * FROM `product` WHERE `id_brand` = :id");
    $query->execute([':id' => $brand]);
    $row = $query->fetchAll(PDO::FETCH_OBJ);
  
    $response = [
      "status" => 200,
      "message" => "Запрос успешно обработан",
      "status_id" => 2,
      "values" => $row
    ];
    http_response_code(200);
    echo json_encode($response);
  } elseif ($brand == '') {
    $query = $pdo->prepare("SELECT * FROM `product` WHERE `price_rental` > :price_min AND `price_rental` <= :price_max");
    $query->execute([
      ':price_min' => $price_min,
      ':price_max' => $price_max
      ]);
    $row = $query->fetchAll(PDO::FETCH_OBJ);
    $response = [
      "status" => 200,
      "message" => "Запрос успешно обработан",
      "status_id" => 2,
      "values" => $row
    ];
    http_response_code(200);
    echo json_encode($response);
  } else {
    $query = $pdo->prepare("SELECT * FROM `product` WHERE `id_brand` = :id AND `price_rental` > :price_min AND `price_rental` <= :price_max");
    $query->execute([
      ':id' => $brand,
      ':price_min' => $price_min,
      ':price_max' => $price_max
      ]);
    $row = $query->fetchAll(PDO::FETCH_OBJ);
  
    $response = [
      "status" => 200,
      "message" => "Запрос успешно обработан",
      "status_id" => 2,
      "values" => $row
    ];
    http_response_code(200);
    echo json_encode($response);
  }
}


// if ($brand == '') {
//   $query = $pdo->prepare("SELECT * FROM `product` WHERE `price_rental` > :price_min AND `price_rental` <= :price_max");
//   $query->execute([
//     ':price_min' => $price_min,
//     ':price_max' => $price_max
//     ]);
//   $row = $query->fetchAll(PDO::FETCH_OBJ);
//   $response = [
//     "status" => 200,
//     "message" => "Запрос успешно обработан",
//     "status_id" => 2,
//     "values" => $row
//   ];
//   http_response_code(200);
//   echo json_encode($response);
// } elseif ($brand == '' || $price_min == '' || $price_max == '') {
//   $response = [
//     "status" => 400,
//     "message" => "Проверьте правильность полей",
//   ];
//   http_response_code(200);
//   echo json_encode($response);

// } else {
//   $query = $pdo->prepare("SELECT * FROM `product` WHERE `id_brand` = :id AND `price_rental` > :price_min AND `price_rental` <= :price_max");
//   $query->execute([
//     ':id' => $brand,
//     ':price_min' => $price_min,
//     ':price_max' => $price_max
//     ]);
//   $row = $query->fetchAll(PDO::FETCH_OBJ);

//   $response = [
//     "status" => 200,
//     "message" => "Запрос успешно обработан",
//     "status_id" => 2,
//     "values" => $row
//   ];
//   http_response_code(200);
//   echo json_encode($response);
// }

?>