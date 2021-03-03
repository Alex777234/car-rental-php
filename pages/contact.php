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
      <a class="cabinet">Личный кабинет</a>
      <a class="cabinet_hide">
        <img src="../img/user.svg" alt="Иконка пользователя">
      </a>
      <div class="drop-cabinet drop__cabinet">
        <a href="../authorization.php" class="drop-cabinet__link">Авторизация</a>
        <a href="../registration.php" class="drop-cabinet__link">Регистрация</a>
        <!-- <a href="#" class="drop-cabinet__link">Выход</a> -->
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
            <li class="nav-list__item"><a href="autopark.php" class="nav-list__link">Автопарк</a></li>
            <li class="nav-list__item"><a href="price.php" class="nav-list__link">Тарифы</a></li>
            <li class="nav-list__item"><a href="about.php" class="nav-list__link">О компании</a></li>
            <li class="nav-list__item"><a class="nav-list__link" active>Контакты</a></li>
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
                    <li class="drop-menu-list__item"><a href="autopark.php" class="drop-menu-list__link">Автопарк</a>
                    </li>
                    <li class="drop-menu-list__item"><a href="price.php" class="drop-menu-list__link">Тарифы</a>
                    </li>
                    <li class="drop-menu-list__item"><a href="about.php" class="drop-menu-list__link">О
                        компании</a>
                    </li>
                    <li class="drop-menu-list__item"><a class="drop-menu-list__link" active>Контакты</a>
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
    <section class="contact">
      <div class="container">
        <div class="row contact__content">
          <img src="../img/about/porshe_911.png" alt="porshe_911" class="contact__image">
          <div class="col-xl-12">
            <div class="contact__graphic">
              <h3 class="contact__title">График работы</h3>
              <p class="contact__text">Пон. - Пят., С 9:00 ДО 21:00</p>
            </div>
            <address class="address">
              <p class="address__text">г. Новосибирск, ул. Кирова 228</p>
            </address>
            <div class="contact__info">
              <span>Номер телефона: <a href="tel:88054561456">8 (805) 456 14-56</a></span>
              <span>Запасной номер: <a href="tel:89651231353">8 (965) 123 13-53</a></span>
              <span>Email: <a href="mailto:example-po4ta@mail.ru">example-po4ta@mail.ru</a></span>
            </div>
          </div>
        </div>
      </div>
    </section>
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
              <li class="footer-nav-list__item"><a href="autopark.php" class="footer-nav-list__link">Автопарк</a>
              </li>
              <li class="footer-nav-list__item"><a href="price.php" class="footer-nav-list__link">Тарифы</a>
              </li>
              <li class="footer-nav-list__item"><a href="about.php" class="footer-nav-list__link">О
                  компании</a>
              </li>
              <li class="footer-nav-list__item"><a class="footer-nav-list__link">Контакты</a>
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
  <script src="../js/main.js"></script>
</body>

</html>