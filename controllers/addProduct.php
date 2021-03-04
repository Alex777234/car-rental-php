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

if ($brand == '' || $name == '' || $img == '' || $box == '' || $year == '' || $capacity == '' || $rental == '') {
  $response = [
    "status" => 400,
    "message" => "Проверьте правильность полей"
  ];
  http_response_code(400);
  echo json_encode($response);
  exit();
} 
else {
  $response = [
    "status" => 200,
    "message" => "Ok"
  ];
  http_response_code(200);
  echo json_encode($response);
}


?>