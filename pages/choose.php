<?php
require_once '../db.php';
if (!isset($_SESSION['user_login'])) {
    ?>
    <script>
        alert('Вы не зарегистрированы');
        location.href = '/registration/promo.php';
    </script> <?php
}

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Мир физики</title>
    <link href="choose/choose.css" rel="stylesheet">
</head>
<body>
<header><?php require_once '../header.php' ?></header>
<div class="container">
    <h2 class="title">Выберите экзамен</h2>
    <div class="exam exam__oge">
        <form method="get" action="/pages/variants.php?">
            <div class="exam__text">
                Готовиться к ОГЭ
            </div>
            <input type="text" value="9" name="class" style="display: none">
            <input type="submit" class="exam__btn" value="Вперед">
        </form>
    </div>
    <div class="exam exam__ege">
        <form method="get" action=/pages/variants.php?">
            <div class="exam__text">
                Готовиться к ЕГЭ
            </div>
            <input type="text" value="11" name="class" style="display: none">
            <input type="submit" class="exam__btn" value="Вперед">
        </form>
    </div>
</div>
</body>
</html>
