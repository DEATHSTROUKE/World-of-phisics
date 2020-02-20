<?php
//require_once '../db.php';
session_start();
if (!isset($_SESSION['user_login']) or $_SESSION['role'] != 'admin') {
    ?>
    <script>
        location.href = '/index.php';
    </script>
    <?php
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
    <link rel="stylesheet" href="/admin/admin_panel/admin_panel.css">
</head>
<body>
<header>
    <? require_once '../header.php' ?>
</header>
<section class="main">
    <div class="container">
        <div class="links">
            <a class="links__text" href="/admin/users.php">Пользователи</a>
            <a class="links__text" href="/admin/tasks.php">Задания</a>
        </div>
    </div>
</section>
<footer>
    <? require_once '../footer.php' ?>
</footer>
</body>
</html>
