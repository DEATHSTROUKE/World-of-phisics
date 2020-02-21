<?php
require_once '../db.php';
if (!isset($_SESSION['user_login'])) {
    ?>
    <script>
        alert('Вы не зарегистрированы');
        location.href = '/registration/promo.php';
    </script> <?php
}
if (isset($_SESSION['class'])) {
    $class = $_SESSION['class'];
} elseif (isset($_GET['class'])) {
    $class = $_GET['class'];
    $_SESSION['class'] = $class;
} else {
    $sql_rec = "SELECT class FROM users WHERE email = ?";
    $res = $pdo->prepare($sql_rec);
    $res->execute([$email]);
    $row = $res->fetch(PDO::FETCH_ASSOC);
    if ($row['class'] == 0) {
        ?>
        <script>
            location.href = '/pages/choose.php'
        </script>
        <?php
    } else {
        $class = $row['class'];
    }
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
    <link href="variants/variants.css" rel="stylesheet">
</head>
<body>
<header><?php require_once '../header.php' ?></header>
<h2>Выберите вариант</h2>
<?php
if ($class <= 9) {
    $sql_rec = 'SELECT DISTINCT variant FROM tasks WHERE exam = ? ORDER BY variant';
    $res = $pdo->prepare($sql_rec);
    $res->execute([0]);
} else {
    $sql_rec = 'SELECT DISTINCT variant FROM tasks WHERE exam = ? ORDER BY variant';
    $res = $pdo->prepare($sql_rec);
    $res->execute([1]);
}
?>
<? while ($row = $res->fetch(PDO::FETCH_ASSOC)): ?>
    <div class="container">
        <div class="variant">
            <form method="get">
                <div class="var__text">
                    Вариант №<? echo $row['variant'] ?>
                </div>
                <a href= <? echo "/pages/solution.php?class=" . $_GET['class'] . "&var=" . $row['variant'] ?>>Вперед</a>
            </form>
        </div>
    </div>
<? endwhile; ?>
</body>
</html>


