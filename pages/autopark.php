<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Главная | Liberti car</title>
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
<header class="header">
    <div class="container header__content">
      <address class="address">
        <p class="address__text">г. Новосибирск, ул. Кирова 228</p>
      </address>
      <a class="cabinet"><?php
        if ($_SESSION['user'] || $_SESSION['admin']) {
          if ($_SESSION['user']) {
            echo $_SESSION['user']['name'];
          } else {
            echo $_SESSION['admin']['name'];
          }
        } else {
          echo 'Личный кабинет';
        }
      ?></a>
      <a class="cabinet_hide">
        <img src="../img/user.svg" alt="Иконка пользователя">
      </a>
      <div class="drop-cabinet drop__cabinet">
        <?php 
          if ($_SESSION['user'] || $_SESSION['admin']) {
            echo '<a href="pages/cabinet.php" class="drop-cabinet__link_empty">Личный кабинет</a>';
            echo '<a href="controllers/exitUser.php" class="drop-cabinet__link_empty">Выход</a>';
          } else {
            echo '<a href="../authorization.php" class="drop-cabinet__link">Авторизация</a>';
            echo '<a href="../registration.php" class="drop-cabinet__link">Регистрация</a>';
          }
        ?>
      </div>
    </div>
  </header>

<main>
  <section class="navigation">
    <div class="container navigation__block">
      <div class="logo">
        <a href="../index.php" class="logo__btn">Liberti car</a>
        <p class="logo__desc">Прокат автомобилей</p>
      </div>
      <nav class="nav">
        <ul class="nav-list">
          <li class="nav-list__item"><a href="../index.php" class="nav-list__link">Главная</a></li>
          <li class="nav-list__item"><a class="nav-list__link" active>Автопарк</a></li>
          <li class="nav-list__item"><a href="price.php" class="nav-list__link">Тарифы</a></li>
          <li class="nav-list__item"><a href="about.php" class="nav-list__link">О компании</a></li>
          <li class="nav-list__item"><a href="contact.php" class="nav-list__link">Контакты</a></li>
        </ul>
      </nav>
      <div class="phone">
        <a href="tel:88054561456" class="phone__btn">8 (805) 456 14-56</a>
        <p class="phone__desc">Пн-Пт, с 9:00 до 21:00</p>
      </div>
      <div class="burger">
        <span class="burger__item"></span>
      </div>
      <div class="drop drop__block">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <nav class="drop-menu">
                <ul class="drop-menu-list">
                  <li class="drop-menu-list__item"><a href="../index.php" class="drop-menu-list__link">Главная</a>
                  </li>
                  <li class="drop-menu-list__item"><a class="drop-menu-list__link" active>Автопарк</a>
                  </li>
                  <li class="drop-menu-list__item"><a href="price.php" class="drop-menu-list__link">Тарифы</a>
                  </li>
                  <li class="drop-menu-list__item"><a href="about.php" class="drop-menu-list__link">О
                      компании</a>
                  </li>
                  <li class="drop-menu-list__item"><a href="contact.php" class="drop-menu-list__link">Контакты</a>
                  </li>
                </ul>
              </nav>

            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="drop-phone drop__phone">
                <a href="tel:88054561456" class="drop-phone__btn">8 (805) 456 14-56</a>
                <p class="drop-phone__desc">Пн-Пт, с 9:00 до 21:00</p>
              </div>
            </div>
          </div>
        </div>
        <button class="drop_close">&times</button>
      </div>
    </div>
  </section>
  <section class="autopark">
    <div class="container">
      <div class="row">
        <div class="col-xl-12 panel panel__content">
          <h2 class="panel__title">Найти авто</h2>
          <form class="panel-form panel-form__search">
            <input type="search" name="search" id="search" placeholder="Введите название авто">
            <button type="submit" class="btn panel-form__btn panel-form__btn_search" id="searchBtn">Найти</button>
          </form>
        </div>
        <div class="col-xl-3 filter">
          <h3 class="filter__title">Фильтр поиска</h3>
          <div class="filter__stamp">
            <h4 class="filter__subtitle">Марка авто</h4>
            <?php 
              require '../config/connect.php';
              $query = $pdo->query("SELECT * FROM `brands`");
              while($row = $query->fetch(PDO::FETCH_OBJ)) {
                echo '
                  <label for="'.$row->id_brand.'" class="filter__label">
                    <input type="checkbox" name="checkbox-name" id="'.$row->id_brand.'">
                    '.$row->name_brand.'
                  </label>
                ';
              }
            ?>
          </div>
          <div class="filter__price">
            <h4 class="filter__subtitle">Цена бронирования</h4>
            <div class="filter__price_row">
              <input type="text" name="price_min" placeholder="От">
              <input type="text" name="price_max" placeholder="До">
            </div>
          </div>
          <button class="btn filter__btn" id="filterBtn">Применить</button>
        </div>
        <div class="col-xl-9">
          <div class="row autopark__content">
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="drop-rental drop-rental__content">
    <div class="drop-rental__block">
      <h3 class="drop-rental__title">Бронирование авто</h3>
      <ul class="drop-rental-list">
        <li class="drop-rental-list__item">Название авто:<span id="span_name"></span></li>
        <li class="drop-rental-list__item">Аренда за сутки авто:<span id="span_rental"></span></li>
      </ul>
      <label for="date">
        Выберите конечную дату
        <input type="date" name="date" id="date">
      </label>
      <p class="drop-rental__price">Итого: <span id="span_price"></span></p>
      <button type="submit" class="btn drop-rental__btn" id="rentalBtn">Забронировать</button>
      <a href="#" class="drop-rental_close">&times;</a>
    </div>
  </div>
</main>

<footer class="footer">
  <div class="container">
    <div class="row footer__content">
      <div class="col-xl-4">
        <address class="address">
          <p class="address__text">г. Новосибирск, ул. Кирова 228</p>
        </address>
        <div class="phone phone_left">
          <a href="tel:88054561456" class="phone__btn">8 (805) 456 14-56</a>
          <p class="phone__desc">Пн-Пт, с 9:00 до 21:00</p>
        </div>
      </div>
      <div class="col-xl-4">
        <h4 class="footer__title">Навигация</h4>
        <nav class="footer-nav">
          <ul class="footer-nav-list">
            <li class="footer-nav-list__item"><a href="../index.php" class="footer-nav-list__link">Главная</a></li>
            <li class="footer-nav-list__item"><a class="footer-nav-list__link">Автопарк</a></li>
            <li class="footer-nav-list__item"><a href="price.php" class="footer-nav-list__link">Тарифы</a>
            </li>
            <li class="footer-nav-list__item"><a href="about.php" class="footer-nav-list__link">О
                компании</a>
            </li>
            <li class="footer-nav-list__item"><a href="contact.php" class="footer-nav-list__link">Контакты</a>
            </li>
          </ul>
        </nav>
      </div>
      <div class="col-xl-4">
        <h4 class="footer__title">Личный кабинет</h4>
        <nav class="footer-nav">
          <ul class="footer-nav-list">
            <li class="footer-nav-list__item"><a href="#" class="footer-nav-list__link">Авторизация</a></li>
            <li class="footer-nav-list__item"><a href="#" class="footer-nav-list__link">Регистрация</a></li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-12 politics">
        <small class="politics__text">©2018-2021 Все права защищены.</small>
      </div>
    </div>
  </div>
</footer>

<script src="../js/posts/getItemAll.js"></script>
<script src="../js/main.js"></script>
<script src="../js/posts/filterItem.js"></script>
</body>

</html>

<!-- <h2 class="panel__title">Найти авто</h2>
<input type="search" name="search" id="search" placeholder="Введите название авто"> -->