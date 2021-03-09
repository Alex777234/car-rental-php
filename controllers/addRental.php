<?php 

session_start();
require '../config/connect.php';

$product = $_POST['id_product'];
$user_id = $_SESSION['user']['id'];
$date = $_POST['date'];

if($user_id == '') {
  $response = [
    "status" => 400,
    "message" => "Бронировать автомобиль могут только зарегистрированные пользователи"
  ];
  http_response_code(400);
  echo json_encode($response);
  exit();
}

$query = $pdo->prepare("SELECT * FROM `user_cart` WHERE `id_user` = :user");
$query->execute([':user' => $user_id]);
$row = $query->fetch(PDO::FETCH_OBJ);

if ($row == 2) {
  $response = [
    "status" => 400,
    "message" => "Вы уже бронировали себе 2 авто. Отмените бронь в личном кабинете преждем чем забронировать новый автомобиль."
  ];
  http_response_code(400);
  echo json_encode($response);
  exit();
} else {
  if ($date == '') {
    $response = [
      "status" => 400,
      "message" => "Укажите конечный день бронирования"
    ];
    http_response_code(400);
    echo json_encode($response);
  } 
  else {
    $query = $pdo->prepare("INSERT INTO `user_cart` (`id_user`, `id_product`, `date_rental`)
    VALUES (:user, :product, :date)");
    $query->execute([
      ':user' => $user_id,
      ':product' => $product,
      ':date' => $date
    ]);
  
    $response = [
      "status" => 201,
      "message" => "Успешно добавлено"
    ];
    http_response_code(201);
    echo json_encode($response);
  }
  
}

?>