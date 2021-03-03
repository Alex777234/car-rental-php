<?php 

session_start();

require '../config/connect.php';

$username = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['pass'];

$query = $pdo->prepare("SELECT `email` FROM `users` WHERE `email` = :email");
$query->execute([':email' => $email]);
$row = $query->fetch(PDO::FETCH_OBJ);


if ($username == '' || $email == '' || $pass == '') {
  $response = [
    "status" => 400,
    "message" => "Проверьте правильность полей"
  ];
  echo json_encode($response);
  exit();
} 
else {
  if ($row > 0) {
    $response = [
      "status" => 400,
      "message" => "Пользователь ".$email." уже существует"
    ];
    echo json_encode($response);
    exit();
  } else {
    $pass = md5($pass);
    $query = $pdo->prepare("INSERT INTO `users` (`name`, `email`, `password`) VALUES (:name, :email, :password)");
    $query->execute([':name' => $username, ':email' => $email, ':password' => $pass]);


    $user = $pdo->prepare("SELECT * FROM `users` WHERE `email` = :email");
    $user->execute([':email' => $email]);
    $count = $user->fetch(PDO::FETCH_OBJ);

    $_SESSION['user'] = [
      "id" => $count->id_user,
      "name" => $count->name,
      "email" => $count->email
    ];

    $response = [
      "status" => 201,
      "message" => "Успешная регистрация!"
    ];
    echo json_encode($response);
  }
}


?>