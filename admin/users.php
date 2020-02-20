<?php
require_once '../db.php';
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
    <link rel="stylesheet" href="/admin/users/users.css">
</head>
<body>
<header>
    <? require_once '../header.php' ?>
</header>
<section class="main">
    <div class="container">
        Пользователи <br>
        <select>
            <option value="student">Ученики</option>
            <option value="teacher">Учителя</option>
        </select>
        <div class="actions">
            <button>Добавить</button>
            <button>Удалить</button>
        </div>
        <table border="1">
            <tr>
                <td>Фамилия</td>
                <td>Имя</td>
                <td>Email</td>
                <td>Учитель</td>
                <td>Страна</td>
                <td>Город</td>
                <td>Школа</td>
            </tr>
        </table>
    </div>
</section>
<footer>
    <? require_once '../footer.php' ?>
</footer>
</body>
</html>
