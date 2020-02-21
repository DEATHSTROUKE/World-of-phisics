<?php
require_once '../db.php';
if (!isset($_SESSION['user_login'])) {
    ?>
    <script>
        alert('Вы не зарегистрированы');
        location.href = '/registration/promo.php';
    </script> <?php
}
if (!isset($_GET['var'])) {
    ?>
    <script>
        alert('Выберите вариант');
        location.href = <? echo '/pages/variants.php?class=' . $_GET['class'] ?>;
    </script> <?php
}
if (!isset($_GET['class'])) {
    ?>
    <script>
        alert('Выберите экзамен для подготовки');
        location.href = '/pages/choose.php';
    </script> <?php
}
if ($_GET['class'] <= '9') {
    $sql_rec = "SELECT num, task FROM tasks WHERE exam = ? AND variant = ?";
    $exam = 0;
} else {
    $sql_rec = "SELECT num, task FROM tasks WHERE exam = ? AND variant = ?";
    $exam = 1;
}
$var = (int)$_GET['var'];
$res = $pdo->prepare($sql_rec);
$res->execute([$exam, $var]);
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Мир физики</title>
    <link href="solution/solution.css" rel="stylesheet">
</head>
<body>
<header><?php require_once '../header.php' ?></header>
<div id="content">
    <div class="container">
        <h2>Вариант № <? echo $var ?></h2>
        <input name="exam" value="<? echo $exam ?>" style="display: none">
        <input name="variant" value="<? echo $var ?>" style="display: none">
        <? while ($row = $res->fetch(PDO::FETCH_ASSOC)): ?>
            <div class="task">
                <div class="number">
                    <input name="num" value="<? echo $row['num'] ?>" style="display:none;">
                    <strong>Задание №<? echo $row['num'] ?></strong>
                </div>
                <div class="question">
                    <? echo $row['task'] ?>
                </div>
                <div class="picture">

                </div>
                <input type="text" name="ans">
                <hr>
            </div>
        <? endwhile; ?>
        <button onclick="finish()">Завершить тест</button>
    </div>
</div>
<script src="solution/solution.js"></script>
</body>
</html>