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
if ($_GET['class'] == '9') {
    $sql_rec = "SELECT numbers FROM var_oge WHERE id = ?";
    $exam = 0;
} elseif ($_GET['class'] == '11') {
    $sql_rec = "SELECT numbers FROM var_ege WHERE id = ?";
    $exam = 1;
}
$var = (int)$_GET['var'];
$sql_rec = "SELECT task FROM tasks WHERE exam = ? and variant = ?";
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
    <link href="variants/variants.css" rel="stylesheet">
</head>
<body>
<header><?php require_once '../header.php' ?></header>
<h2>Удачи)</h2>
<? while ($row = $res->fetch(PDO::FETCH_ASSOC)): ?>
    <div class="container">
        <div class="question">
            <? echo $row['task'] ?>
        </div>
        <div class="picture">

        </div>
        <input type="text">
    </div>
<? endwhile; ?>
</body>
</html>