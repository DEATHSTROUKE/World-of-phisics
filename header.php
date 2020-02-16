<?php //session_start() ?>
<link rel="stylesheet" href="/header/header.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<div class="menu">
    <div class="container">
        <div class="header__top">
            <div class="header__logo">
                <img src="/images/logo.png" alt="Мир физики" class="header__logo__img">
                <div class="header__logo__text">Мир физики</div>
            </div>
            <nav class="nav">
                <form method="get" class="nav__form">
                    <? if (isset($_SESSION['user_login'])): ?>
                        <button type="submit" formaction="/pages/profile.php" class="btn__profile"><i
                                    class="fa fa-user"></i></button>
                        <input type="submit" formaction="#" class="btn__bell"
                               value="">
                    <? else: ?>
                        <input type="submit" formaction="signin.php" class="btn__disactive"
                               value="Вход">
                        <input type="submit" formaction="signup.php" class="btn__disactive"
                               value="Регистрация">
                    <? endif; ?>
                </form>
            </nav>
            <div class="hamburger" onmouseover="btn_over(1)" onmouseout="btn_over(0)">
                <form method="get">
                    <div class="ham__menu">
                        <button formaction="#" type="button" class="btn__hamburger">
                            <hr class="line__hamburger">
                            <hr class="line__hamburger sec__line">
                        </button>
                        <div class="back__ham">
                            <? if (isset($_SESSION['user_login'])): ?>
                                <button class="btn__ham__menu" formaction="/index.php"><i class="fa fa-home"></i>
                                    Главная
                                </button>
                                <button class="btn__ham__menu" formaction="/pages/profile.php"><i
                                            class="fa fa-user"></i>
                                    Профиль
                                </button>
                                <button class="btn__ham__menu" formaction="/pages/variants.php"><i
                                            class="fa fa-graduation-cap"></i> Задачи
                                </button>
                                <? if ($_SESSION['role'] == 'teacher'): ?>
                                    <button class="btn__ham__menu" formaction="/pages/classes.php"><i
                                                class="fa fa-users"></i>
                                        Классы
                                    </button>
                                <? else: ?>
                                    <button class="btn__ham__menu" formaction="/pages/raiting.php"><i
                                                class="fa fa-star"></i>
                                        Рейтинг
                                    </button>
                                <? endif; ?>
                                <button class="btn__ham__menu" formaction="/registration/logout.php"><i
                                            class="fa fa-sign-out-alt"></i> Выйти
                                </button>
                            <? else: ?>
                                <button class="btn__ham__menu"
                                        onclick="alert('Для начала необходимо зарегистрироваться или авторизоваться)"><i
                                            class="fa fa-user"></i> Профиль
                                </button>
                                <button class="btn__ham__menu"
                                        onclick="alert('Для начала необходимо зарегистрироваться или авторизоваться)"><i
                                            class="fa fa-graduation-cap"></i> Задачи
                                </button>
                                <button class="btn__ham__menu"
                                        onclick="alert('Для начала необходимо зарегистрироваться или авторизоваться)"><i
                                            class="fa fa-star"></i> Рейтинг
                                </button>
                            <? endif; ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="/header/header.js"></script>


