<!--<?php
//include('phpsqlajax_dbinfo.php');
//include_once "lib/swift_required.php";

$calcTime = $_POST['calcTime'];
$newUser = $_POST['name'];
$newCompany = $_POST['company'];
$newEmail = $_POST['email'];
$newDate = date("Y-m-d");
$newPhone = $_POST['phone'];

if (isset($newUser)) {

    $username = "root";
    $password = "DellOptiplexGL5100";
    $database = "skyforce_central";
    $server = "localhost";


    ini_set('max_execution_time', 3600);

// Opens a connection to a MySQL server
    $connection = mysqli_connect($server, $username, $password, $database);
    if (!$connection) {
        die('Not connected : ' . mysqli_error($connection));
    }

    function esc($connection, $st) {
        return mysqli_real_escape_string($connection, $st);
    }

    mysqli_set_charset($connection, 'utf8');

    $query = "INSERT JurBot.__document35(`Date`, `SpecifiedUserName`, `SpecifiedCompany`, `SpecifiedEmail`, `SpecifiedPhone`) VALUES('$newDate', '$newUser', '$newCompany', '$newEmail', '$newPhone')";

    $result = mysqli_query($connection, $query)
            or die(mysqli_error($connection));

    $result = "ok";
}

/* include('phpsqlajax_dbinfo.php');
  include("includes/savelog.php");

  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $login = $_POST['login'];

  if (isset($login)) {
  if (!empty($username) and ! empty($password)) {
  $sql = mysqli_query($connection, "SELECT * FROM __catalog5 WHERE login='$username' AND password='$password'");
  $count = mysqli_num_rows($sql);

  $result = mysqli_fetch_array($sql);
  if ($count == 1) {

  if ($result['status'] == 'Active') {
  session_start();
  $USERID = $result['ID'];
  $PRIVILEGE = $result['privilege'];
  $isAdmin = $result['admin'] == 1 ? 1 : 0;
  $_SESSION['GPSUSERID'] = $USERID;
  $_SESSION['GPSUSERNAME'] = $username;
  $_SESSION['GPSPRIVILEGE'] = $PRIVILEGE;
  $_SESSION['ISADMIN'] = $isAdmin;
  SaveLog($GPSUSERID, 'User Loged in to the system : ' . $username . '');
  header('location:index.php');

  } else {
  $ermsg = "Ваша учетная запись заблокирована. Пожалуйста обратитесь в службу поддержки!";
  logMessage("./log/login.txt", $username);
  }
  } else
  $ermsg = "Неправильное имя пользователя или пароль! Попробуйте еще раз...";
  } else
  $ermsg = "Пустые имя пользователя и/или пароль! Попробуйте еще раз...";
  } */
?>-->

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
            />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta
            name="description"
            content="Юридическая и транзакционная AI-платформа,которая предназначена для автоматического составления юридических
            документов и совершения сделок онлайн для юридических, так и физических лиц."
            />
        <title>Юридическая помощь | lexpart.by: Юрист онлайн</title>
        <link rel="stylesheet" href="assets/styles/font-awesome.min.css" />
        <link rel="stylesheet" href="assets/styles/animate.min.css" />
        <link
            href="https://fonts.googleapis.com/css?family=Oswald:400,300,700"
            rel="stylesheet"
            type="text/css"
            />
        <link rel="stylesheet" href="assets/styles/common.css" />
        <link rel="stylesheet" href="assets/styles/index.css" />
    </head>
    <body>
        <header class="header">
            <div class="header__info">
                <div class="header__container">
                    <p class="header__info-text">Начать легко</p>
                    <div class="header__info-contacts">
                        <a href="mailto:lexpart@navispy.com"
                           ><i class="fa fa-envelope-o"></i> lexpart@navispy.com</a
                        >
                        <a href="tel:+375(29) 172-10-70"
                           ><i class="fa fa-tablet"></i> +375 29 172-10-70</a
                        >
                    </div>
                </div>
            </div>
            <div class="header__nav">
                <div class="header__container">
                    <div class="header__nav-logo__wrapper">
                        <a class="header__nav-logo" href="index.php"
                           ><img src="assets/image/startup/logo.png" alt="logo"
                              /></a>
                    </div>
                    <div class="header__nav-toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <nav class="header__nav-menu">
                        <a class="header__nav-item" href="#about" id="aboutLink"
                           >О программе</a
                        >
                        <a class="header__nav-item" href="#tariffs" id="tariffsLink"
                           >Тарифы</a
                        >
                        <span class="header__nav-item disabled">Обратный звонок</span>
                        <a class="header__nav-item" href="reg"
                           >Зарегистрировать юр.лицо</a
                        >
                        <a class="header__nav-item" href="skyforce/">Войти</a>
                    </nav>
                </div>
            </div>
        </header>
        <main id="main">
            <section class="section promo">
                <div class="section__container">
                    <div class="promo__info">
                        <div class="promo__info-text">
                            <div class="promo__info-heading heading">
                                <h2>Программа LEXPART</h2>
                            </div>
                            <div class="promo__info-tagline">
                                <p>
                                    Создавайте документы, заключайте сделки в режиме онлайн!
                                </p>
                            </div>
                        </div>
                        <form class="promo__form" action="index.php" method="POST" id="header-form">
                            <div class="promo__form-caption">
                                <h2>
                                    <?php
                                    if (isset($result)) {
                                        echo "Заявка отправлена";
                                    } else {
                                        echo "Заполните заявку";
                                    }
                                    ?>
                                </h2>
                            </div>
                            <div class="promo__form-input">
                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    required
                                    autocomplete="off"
                                    placeholder="Имя"
                                    />
                            </div>
                            <div class="promo__form-input">
                                <input
                                    type="text"
                                    id="phone"
                                    required
                                    autocomplete="off"
                                    name="phone"
                                    placeholder="Номер телефона"
                                    />
                            </div>
                            <div class="promo__form-input">
                                <input
                                    type="text"
                                    id="company"
                                    required
                                    autocomplete="off"
                                    name="company"
                                    placeholder="Название компании"
                                    />
                            </div>
                            <div class="promo__form-input">
                                <input
                                    type="text"
                                    name="email"
                                    id="mail"
                                    required
                                    autocomplete="off"
                                    placeholder="Электронная почта"
                                    />
                            </div>
                            <div class="promo__form-button">
                                <button type="submit" id="submitHeaderFormRequest">
                                    Отправить заявку
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <section class="section about" id="about">
                <div class="section__container">
                    <div class="about__heading heading">
                        <h2>О «LEXPART»</h2>
                    </div>
                    <div class="about__info">
                        <p>
                            Платформа LEXPART - это международная юридическая и транзакционная
                            AI-платформа, которая предназначена для автоматического
                            составления юридических документов и совершения сделок онлайн, как
                            для юридических, так и физических лиц. Платформа интегрируется с
                            бухгалтерскими программами для обмена данными и может сама
                            выступать в качестве программы облачной бухгалтерии
                        </p>
                        <ul class="about__info-list">
                            <li class="about__info-item">
                                Все продукты платформы переведены и адаптированы под
                                законодательство страны присутствия проекта.
                            </li>
                            <li class="about__info-item">
                                Платформа обеспечивает совершение международных сделок между
                                субъектами, находящимися в разных странах.
                            </li>
                            <li class="about__info-item">
                                Сервис "LEXPART" позволяет подготовить судебные документы онлайн
                                для истца из одной страны в судебные органы другой страны.
                            </li>
                            <li class="about__info-item">
                                С помощью сервиса возможна подготовка многоязычных документов.
                            </li>
                        </ul>
                        <img
                            class="right-shape"
                            src="assets/image/startup/footer-right-shape.png"
                            alt="world"
                            />
                    </div>
                </div>
            </section>
            <section class="section benefits">
                <div class="section__container">
                    <div class="benefits__heading heading">
                        <h2>Удобная платформа для любого бизнеса</h2>
                    </div>
                    <div class="benefits__list">
                        <div class="benefits__item">
                            <span class="benefits__item-icon"
                                  ><i class="fa fa-lightbulb-o" aria-hidden="true"></i
                                ></span>
                            <h3>Экономия трудозатрат</h3>
                            <p>
                                Сервис позволяет значительно сократить трудозатраты на все виды
                                работ с юридическими документами (на 50-70%).
                            </p>
                        </div>
                        <div class="benefits__item">
                            <span class="benefits__item-icon"
                                  ><i class="fa fa-credit-card" aria-hidden="true"></i
                                ></span>
                            <h3>Экономия Вашего времени и денежных средств</h3>
                            <p>
                                Существенно экономит время и деньги Заказчика за счет скорости
                                подготовки документов и снижения стоимости юридических
                                документов.
                            </p>
                        </div>
                        <div class="benefits__item">
                            <span class="benefits__item-icon">
                                <i class="fa fa-level-up" aria-hidden="true"></i
                                ></span>
                            <h3>Оптимизация бизнес-процессов</h3>
                            <p>
                                Все документы соответствуют внутренним регламентам компании и
                                согласовываются на 40% быстрее.
                            </p>
                        </div>
                        <div class="benefits__item">
                            <span class="benefits__item-icon">
                                <i class="fa fa-cloud-upload" aria-hidden="true"></i
                                ></span>

                            <h3>Собственный центр обработки данных (дата-центр)</h3>
                            <p>
                                Обеспечивает надежность связи и передачи данных между отдельными
                                серверами и их пользователями.
                            </p>
                        </div>
                        <div class="benefits__item">
                            <span class="benefits__item-icon">
                                <i class="fa fa-comments" aria-hidden="true"></i
                                ></span>

                            <h3>Онлайн-платформа</h3>
                            <p>
                                Все условия сделок можно обсудить через внутренний видео-чат или
                                мессенджер.
                            </p>
                        </div>
                        <div class="benefits__item">
                            <span class="benefits__item-icon">
                                <i class="fa fa-life-bouy" aria-hidden="true"></i
                                ></span>

                            <h3>Уникальность и адаптивность</h3>
                            <p>
                                Адаптирование и перевод продуктов платформы под законодательство
                                страны присутствия проекта.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section team">
                <div class="section__container">
                    <div class="team__heading heading">
                        <h2>Эта программа для Вас, если</h2>
                    </div>
                    <div class="team__list">
                        <div class="team__member">
                            <img
                                src="assets/image/main/startup.png"
                                alt="
                                start a startup"
                                />
                            <div class="team__description">
                                <h4>ВЫ - ЗАПУСКАЕТЕ СТАРТАП</h4>
                            </div>
                        </div>
                        <div class="team__member">
                            <img src="assets/image/main/boss.png" alt="boss" />
                            <div class="team__description">
                                <h4>ВЫ - РУКОВОДИТЕЛЬ ПРЕДПРИЯТИЯ</h4>
                            </div>
                        </div>
                        <div class="team__member">
                            <img src="assets/image/main/bookeeper.png" alt="bookkeeper" />
                            <div class="team__description">
                                <h4>ВЫ - БУХГАЛТЕР ПРЕДПРИЯТИЯ</h4>
                            </div>
                        </div>
                        <div class="team__member">
                            <img src="assets/image/main/lawyer.png" alt="lawyer" />
                            <div class="team__description">
                                <h4>ВЫ - ЮРИСТ ПРЕДПРИЯТИЯ</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section tariffs" id="tariffs">
                <div class="section__container">
                    <div class="tariffs__heading heading">
                        <h2>Тарифы</h2>
                    </div>
                    <div class="tariffs__list">
                        <div class="tariffs__item">
                            <h5 class="tariffs__item-heading">ТЕСТОВЫЙ</h5>
                            <h5 class="tariffs__item-price">0,99 BYN</h5>
                            <button class="tariffs__item-button">Выбрать</button>
                        </div>
                        <div class="tariffs__item">
                            <h5 class="tariffs__item-heading">СТАНДАРТНЫЙ</h5>
                            <h5 class="tariffs__item-price">28 BYN</h5>
                            <button class="tariffs__item-button">Выбрать</button>
                        </div>
                        <div class="tariffs__item">
                            <h5 class="tariffs__item-heading">ОПТИМАЛЬНЫЙ</h5>
                            <h5 class="tariffs__item-price">59 BYN</h5>
                            <button class="tariffs__item-button">Выбрать</button>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section partners">
                <div class="section__container">
                    <div class="partners__heading heading">
                        <h2>НАШИ ПАРТНЕРЫ</h2>
                    </div>
                    <div class="partners__container">
                        <div class="partners__image">
                            <img
                                src="assets/image/startup/circle-img3.png"
                                alt="Адвокатское бюро Льва Бориса"
                                />
                        </div>
                        <div class="partners__image">
                            <img
                                src="assets/image/startup/circle-img2.png"
                                alt="Белхард Академия"
                                />
                        </div>
                        <div class="partners__image">
                            <img src="assets/image/startup/circle-img4.png" alt="АльфаБанк" />
                        </div>
                    </div>
                </div>
            </section>
            <section class="section service">
                <div class="section__container">
                    <div class="service__heading heading">
                        <h2>
                            Вы можете узнать другие возможности<a href="index.php">
                                сервиса Lexpart
                            </a>
                        </h2>
                        <p>Свяжитесь с нами</p>
                    </div>
                    <div class="service__buttons">
                        <div class="service__button">
                            <a href="mailto:lexpart@navispy.com">Написать нам</a>
                        </div>
                        <div class="service__button">
                            <a href="tel:+375(29) 172-10-70">Связаться с нами</a>
                        </div>
                    </div>

                    <div class="service__container-fluid">
                        <img
                            class="left-shape"
                            src="assets/image/startup/footer-left-shape.png"
                            alt="world"
                            />
                        <img
                            class="right-shape"
                            src="assets/image/startup/footer-right-shape.png"
                            alt="world"
                            />
                    </div>
                </div>
            </section>
        </main>
        <footer class="footer">
            <div class="footer__container">
                <div class="footer__info">
                    <div class="footer__contact">
                        <h3>ООО "ЛЕКСПАРТ-ПРО"</h3>
                        <p>Адрес: г. Минск, ул. Мельникайте, 2, оф. 1601</p>
                        <p>Телефон: +375 29 172-10-70</p>
                        <p>E-mail: lexpart@navispy.com</p>
                    </div>
                    <form class="footer__form">
                        <p class="footer__form-heading">БУДЬТЕ В КУРСЕ НОВОСТЕЙ LEXPART</p>
                        <input type="email" placeholder="EMAIL ADDRESS" />
                        <input type="submit" value="Начать" />
                        <div class="footer__form-nav">
                            <button class="footer__form-privacy" type="button">
                                Политика конфиденциальности
                            </button>
                            <button class="footer__form-terms" type="button">
                                Пользовательское соглашение
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </footer>

        <script defer src="assets/scripts/jquery-2.1.1.min.js"></script>
        <script defer src="assets/scripts/headerHandler.js"></script>
        <script defer src="assets/scripts/buttonsHandler.js"></script>
    </body>
</html>
