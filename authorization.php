<?php 
  session_start();
  if ($_SESSION['user']) {
    header("Location: /");
  }
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Главная | Liberti car</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <section class="authorization">
    <div class="container authorization__content">
      <form class="form-auth">
        <div class="logo">
          <a href="index.php" class="logo__btn">Liberti car</a>
          <p class="logo__desc">Прокат автомобилей</p>
        </div>
        <h3 class="form-auth__title">Авторизация</h3>
        <input type="email"  name="email" placeholder="Введите email" class="form-auth__input">
        <input type="password"  name="password" placeholder="Введите пароль" class="form-auth__input">
        <button type="submit" class="btn form-auth__btn" id="authUserBtn">Войти</button>
        <a href="registration.php" class="form-auth__link">Регистрация нового аккаунта</a>
      </form>
  </section>

  <script src="js/posts/authUsers.js"></script>>
</body>

</html>