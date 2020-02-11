<?php //require_once "../db.php";
session_start();
if (!isset($_SESSION['user_login'])) {
    header('Location: ../registration/promo.php');
    exit();
} else {
    echo $_SESSION['user_login'];
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
    <link href="profile/style_profile.css" rel="stylesheet">
    <title>Мир физики</title>
</head>
<body>
<header class="header">
    <div class="menu">
        <div class="container">
            <div class="header__top">
                <div class="header__logo">
                    <img src="../images/logo.png" alt="Мир физики" class="header__logo__img">
                    <div class="header__logo__text">Мир физики</div>
                </div>
                <nav class="nav">
                    <form method="get" action="../registration">
                        <input type="submit" formaction="#" class="btn__profile"
                               value="">
                        <input type="submit" formaction="../registration/logout.php" class="btn__bell"
                               value="">
                    </form>
                </nav>
                <div class="hamburger">
                    <hr class="line__hamburger">
                    <hr class="line__hamburger sec__line">
                </div>
            </div>
        </div>
    </div>
</body>
</html>