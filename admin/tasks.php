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

<?php
function variants($exam)
{
    global $pdo;
    $sql_rec = 'SELECT DISTINCT variant FROM tasks WHERE exam = ?';
    $res = $pdo->prepare($sql_rec);
    $res->execute([$exam]);
    $a = ''
    ?>
    <input name="exam" value="<? echo $exam ?>" style="display: none">
    <? while ($row = $res->fetch(PDO::FETCH_ASSOC)): ?>

    <? $a = $a . '' ?>
    <button type="submit" formaction="/admin/variant_edit.php" name="var" class="btn__variant"
            value="<? echo $row['variant'] ?>">Вариант №<? echo $row['variant'] ?></button>

<? endwhile; ?>
    <?php
    return $a;
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
    <link rel="stylesheet" href="/admin/tasks/tasks.css">
</head>
<body>
<header>
    <? require_once '../header.php' ?>
</header>
<section class="main">
    <div class="container">
        Варианты <br>
        <select onchange="change_ex()">
            <option value="student">ОГЭ</option>
            <option value="teacher">ЕГЭ</option>
        </select>
        <div class="actions">
            <button>Добавить</button>
            <button>Удалить</button>
        </div>
        <form action="/admin/variant_edit.php" method="post">
            <div id="variants">
            </div>
        </form>
    </div>
</section>
<footer>
    <? require_once '../footer.php' ?>
</footer>
<script>
    var ex = 0;
    change_ex();

    function change_ex() {
        if (ex == 0) {
            document.getElementById('variants').innerHTML = `<? variants(0); ?>`;
            ex = 1;
        } else {
            document.getElementById('variants').innerHTML = `<? variants(1); ?>`;
            ex = 0;
        }
    }
</script>
</body>
</html>
