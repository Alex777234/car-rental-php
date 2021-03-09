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
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="css/style.css">
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
        <?php
          if ($_SESSION['user'] || $_SESSION['admin']) {
            if ($_SESSION['user']) {
              echo $_SESSION['user']['name'];
            } else {
              echo $_SESSION['admin']['name'];
            }
          } else {
            echo '<img src="img/user.svg" alt="Иконка пользователя">';
          }
        ?>
      </a>
      <div class="drop-cabinet drop__cabinet">
        <?php 
          if ($_SESSION['user'] || $_SESSION['admin']) {
            echo '<a href="pages/cabinet.php" class="drop-cabinet__link_empty">Личный кабинет</a>';
            echo '<a href="controllers/exitUser.php" class="drop-cabinet__link_empty">Выход</a>';
          } else {
            echo '<a href="authorization.php" class="drop-cabinet__link">Авторизация</a>';
            echo '<a href="registration.php" class="drop-cabinet__link">Регистрация</a>';
          }
        ?>
      </div>
    </div>
  </header>

  <main>
    <section class="navigation">
      <div class="container navigation__block">
        <div class="logo">
          <a class="logo__btn">Liberti car</a>
          <p class="logo__desc">Прокат автомобилей</p>
        </div>
        <nav class="nav">
          <ul class="nav-list">
            <li class="nav-list__item"><a class="nav-list__link" active>Главная</a></li>
            <li class="nav-list__item"><a href="/pages/autopark.php" class="nav-list__link">Автопарк</a></li>
            <li class="nav-list__item"><a href="/pages/price.php" class="nav-list__link">Тарифы</a></li>
            <li class="nav-list__item"><a href="/pages/about.php" class="nav-list__link">О компании</a></li>
            <li class="nav-list__item"><a href="/pages/contact.php" class="nav-list__link">Контакты</a></li>
            <?php
              if ($_SESSION['admin']) {
                echo '<li class="nav-list__item"><a href="/pages/admin-panel.php" class="nav-list__link">| Работа с БД</a></li>';
              }
            ?>
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
                    <li class="drop-menu-list__item"><a class="drop-menu-list__link" active>Главная</a></li>
                    <li class="drop-menu-list__item"><a href="pages/autopark.php"
                        class="drop-menu-list__link">Автопарк</a>
                    </li>
                    <li class="drop-menu-list__item"><a href="pages/price.php" class="drop-menu-list__link">Тарифы</a>
                    </li>
                    <li class="drop-menu-list__item"><a href="pages/about.php" class="drop-menu-list__link">О
                        компании</a>
                    </li>
                    <li class="drop-menu-list__item"><a href="pages/contact.php"
                        class="drop-menu-list__link">Контакты</a>
                    </li>
                    <?php
                      if ($_SESSION['admin']) {
                        echo '<li class="drop-menu-list__item"><a href="/pages/admin-panel.php" class="drop-menu-list__link">Работа с БД</a></li>';
                      }
                    ?>
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
    <section class="home home__main">
      <div class="container">
        <div class="row main">
          <div class="col-xl-6 .col-md-12">
            <div class="main__description">
              <h1 class="main__title">Прокат автомобилей в&nbsp;Новосибирске</h1>
              <p class="main__desc">
                &laquo;<span>Liberti car</span>&raquo; предлагает широкий выбор автомобилей разных классов
                и&nbsp;прозрачные условия
                работы
              </p>
              <a href="pages/autopark.php" class="btn main__btn">Забронировать</a>
            </div>
          </div>
          <div class="col-xl-6 .col-md-12">
            <div class="main__image">
              <img src="img/x5.png" alt="Изображение BMW X5">
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="offer">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="section-heading section__heading">
              <p class="section-heading__text">Почему стоит обратиться в&nbsp;нашу компанию</p>
              <h2 class="section-heading__title">Наши <span>Преимущества</span></h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-4 col-lg-4">
            <div class="offer-card">
              <img src="img/offer/icon_1.png" alt="Иконка преимущества" class="offer-card__img">
              <h3 class="offer-card__title">Аренда с 19 лет</h3>
              <p class="offer-card__text">Если Вам 19 лет и у Вас за плечами водительский стаж не менее года, у нас Вы
                сможете взять любую машину стоимостью до 2500 руб/сутки</p>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4">
            <div class="offer-card">
              <img src="img/offer/icon_2.png" alt="Иконка преимущества" class="offer-card__img">
              <h3 class="offer-card__title">Договор за 20 минут</h3>
              <p class="offer-card__text">Оформление всех необходимых документов займет у Вас не более 20 минут. Вам
                понадобятся паспорт и водительское удостоверение</p>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4">
            <div class="offer-card">
              <img src="img/offer/icon_3.png" alt="Иконка преимущества" class="offer-card__img">
              <h3 class="offer-card__title">Подача в любое место</h3>
              <p class="offer-card__text">Вы можете забрать автомобиль в нашем офисе, либо мы можем доставить его в
                любой аэропорт или по указанному адресу Новосибирска</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="news">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="section-heading section__heading">
              <p class="section-heading__text">Узнай о&nbsp;новых поступлениях самый первый</p>
              <h2 class="section-heading__title">Наши <span>Новинки</span></h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class=" news-card">
              <div class="news-card__image">
                <img src="img/news/car_1.png" alt="Изображение автомобиля" class="news-card__img">
              </div>
              <h3 class="news-card__title">BMW 320</h3>
              <a href="pages/autopark.php" class="btn news-card__btn">В каталог</a>
              <div class="news-card__info">
                <span class="news-card__setting">
                  <img src="img/news/settings.svg" alt="Иконка карточки">
                  АКПП</span>
                <span class="news-card__setting">
                  <img src="img/news/calendar.svg" alt="Иконка карточки">
                  2020</span>
                <span class="news-card__setting">
                  <img src="img/news/paper.svg" alt="Иконка карточки">
                  2.0 л</span>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class=" news-card">
              <div class="news-card__image">
                <img src="img/news/car_2.png" alt="Изображение автомобиля" class="news-card__img">
              </div>
              <h3 class="news-card__title">Mercedes-Benz GLC</h3>
              <a href="pages/autopark.php" class="btn news-card__btn">В каталог</a>
              <div class="news-card__info">
                <span class="news-card__setting">
                  <img src="img/news/settings.svg" alt="Иконка карточки">
                  АКПП</span>
                <span class="news-card__setting">
                  <img src="img/news/calendar.svg" alt="Иконка карточки">
                  2018</span>
                <span class="news-card__setting">
                  <img src="img/news/paper.svg" alt="Иконка карточки">
                  2.0 л</span>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class=" news-card">
              <div class="news-card__image">
                <img src="img/news/car_3.png" alt="Изображение автомобиля" class="news-card__img">
              </div>
              <h3 class="news-card__title">Audi A6 AT 2.0</h3>
              <a href="pages/autopark.php" class="btn news-card__btn">В каталог</a>
              <div class="news-card__info">
                <span class="news-card__setting">
                  <img src="img/news/settings.svg" alt="Иконка карточки">
                  АКПП</span>
                <span class="news-card__setting">
                  <img src="img/news/calendar.svg" alt="Иконка карточки">
                  2019</span>
                <span class="news-card__setting">
                  <img src="img/news/paper.svg" alt="Иконка карточки">
                  2.0 л</span>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class=" news-card">
              <div class="news-card__image">
                <img src="img/news/car_4.png" alt="Изображение автомобиля" class="news-card__img">
              </div>
              <h3 class="news-card__title">Audi Q5</h3>
              <a href="pages/autopark.php" class="btn news-card__btn">В каталог</a>
              <div class="news-card__info">
                <span class="news-card__setting">
                  <img src="img/news/settings.svg" alt="Иконка карточки">
                  АКПП</span>
                <span class="news-card__setting">
                  <img src="img/news/calendar.svg" alt="Иконка карточки">
                  2018</span>
                <span class="news-card__setting">
                  <img src="img/news/paper.svg" alt="Иконка карточки">
                  2.0 л</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="info">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="section-heading section__heading section__heading_left">
              <p class="section-heading__text">Получить автомобиль проще простого</p>
              <h2 class="section-heading__title">Автопрокат с компанией <span>Liberti car</span></h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-12">
            <ul class="info-list">
              <li class="info-list__item">Низкие цены (от&nbsp;1350&nbsp;рублей)</li>
              <li class="info-list__item">Длительная аренда</li>
              <li class="info-list__item">Большой выбор современных транспортных средств от&nbsp;эконом
                до&nbsp;VIP-класса</li>
              <li class="info-list__item">Модели любого класса с&nbsp;дополнительными опциями, заказ авто
                с&nbsp;водителем
              </li>
              <li class="info-list__item">Отсутствие рисков</li>
              <li class="info-list__item">Собственный автосервис, вся техника регулярно проходит диагностику
                и&nbsp;в&nbsp;случае необходимости ремонтируется</li>
              <li class="info-list__item">Быстрое оформление, предоставление услуг по&nbsp;аренде лицам, имеющим
                водительское удостоверение и&nbsp;достигших 19-тилетнего возраста</li>
              <li class="info-list__item">Выбор моделей любого класса</li>
              <li class="info-list__item">Регулярные скидки и&nbsp;бонусы, льготные условия аренды постоянным клиентам
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer class="footer">
    <div class="container">
      <div class="row footer__content">
        <div class="col-xl-4 col-md-12">
          <address class="address">
            <p class="address__text">г. Новосибирск, ул. Кирова 228</p>
          </address>
          <div class="phone phone_left">
            <a href="tel:88054561456" class="phone__btn">8 (805) 456 14-56</a>
            <p class="phone__desc">Пн-Пт, с 9:00 до 21:00</p>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <h4 class="footer__title">Навигация</h4>
          <nav class="footer-nav">
            <ul class="footer-nav-list">
              <li class="footer-nav-list__item"><a class="footer-nav-list__link">Главная</a></li>
              <li class="footer-nav-list__item"><a href="pages/autopark.php" class="footer-nav-list__link">Автопарк</a>
              </li>
              <li class="footer-nav-list__item"><a href="pages/price.php" class="footer-nav-list__link">Тарифы</a>
              </li>
              <li class="footer-nav-list__item"><a href="pages/about.php" class="footer-nav-list__link">О
                  компании</a>
              </li>
              <li class="footer-nav-list__item"><a href="pages/contact.php" class="footer-nav-list__link">Контакты</a>
              </li>
            </ul>
          </nav>
        </div>
        <div class="col-xl-4 col-md-6">
          <h4 class="footer__title">Личный кабинет</h4>
          <nav class="footer-nav">
            <ul class="footer-nav-list">
              <li class="footer-nav-list__item"><a href="authorization.php" class="footer-nav-list__link">Авторизация</a></li>
              <li class="footer-nav-list__item"><a href="registration.php" class="footer-nav-list__link">Регистрация</a></li>
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

  <script src="js/main.js"></script>
</body>

</html>