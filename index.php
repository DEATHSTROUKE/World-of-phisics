<?php require_once "db.php";
if (!isset($_SESSION['user_login'])) {
    ?>
    <script>
        alert('Вы не зарегистрированы');
        location.href = '/registration/promo.php';
    </script> <?php
} ?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates:400,600,700|Montserrat:400,600,700&display=swap&subset=cyrillic,cyrillic-ext"
          rel="stylesheet">
    <link href="/main/main.css" rel="stylesheet">
    <title>Мир физики</title>
</head>
<body>
<header class="header">
    <?php require_once 'header.php' ?>
    <div class="container">
        <div class="intro">
            <div class="intro__title">
                Онлайн школа <br> физики
            </div>
            <div class="suptitle">
                <input type="submit" class="intro__btn" value="О нас">
            </div>
        </div>
</header>
<section>
    <div class="container">
        <div class="about__title">
            О нас
            <hr class="line__title">
        </div>
        <div class="prepare">
            <div class="pre__text">
                Готовься к предстоящим экзаменам
                <input type="submit" class="btn__blue" value="Вперед">
            </div>
            <img src="images/img2.jpg" alt="" class="pre__img">
        </div>
    </div>
</section>
<section>
    <div class="container">
        <hr class="line__title">
        <div class="prepare">
            <img src="images/img1.jpg" alt="" class="pre__img pre__img2">
            <div class="pre__text">
                Получай домашние задания от преподавателя
                <input type="submit" class="btn__blue" value="Посмотреть">
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <hr class="line__title">
        <div class="prepare">
            <div class="pre__text">
                Улучшай свой рейтинг и соревнуйся
                <input type="submit" class="btn__blue" value="Рейтинг">
            </div>
            <img src="images/rating.jpg" alt="" class="pre__img pre__img3">
        </div>
    </div>
</section>
<footer class="footer">
    <div class="container">
        <div class="footer__logo">
            <img src="images/logo.png" alt="Мир физики" class="footer__logo__img">
            <div class="header__logo__text footer__logo__text">Мир физики</div>
        </div>
    </div>
</footer>
</body>
</html>