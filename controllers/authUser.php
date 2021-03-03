<?php 

session_start();

require '../config/connect.php';

$email = $_POST['email'];
$pass = $_POST['pass'];


if ($email == '' || $pass == '') {
  $response = [
    "status" => 400,
    "message" => "Проверьте правильность полей"
  ];
  http_response_code(400);
  echo json_encode($response);
  exit();
} 
else {
  $pass = md5($pass);

  $query = $pdo->prepare("SELECT * FROM `users` WHERE `email` = :email AND `password` = :pass");
  $query->execute([':email' => $email, ':pass' => $pass]);
  $row = $query->fetch(PDO::FETCH_OBJ);

  if ($row > 0) {
    $response = [
      "status" => 200,
      "message" => "Успешная авторизация!"
    ];

    $_SESSION['user'] = [
      "id" => $row->id_user,
      "name" => $row->name,
      "email" => $row->email
    ];

    http_response_code(200);
    echo json_encode($response);
  } else {
    $response = [
      "status" => 400,
      "message" => "Пользователь ".$row->email." не найден. Возможно, вы неправильно указали логин или пароль."
    ];
    http_response_code(400);
    echo json_encode($response);
  }
}


?>