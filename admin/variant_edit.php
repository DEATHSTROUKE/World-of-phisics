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
<?
function create_form()
{
    $a = '' ?>
    <div class="task">
        <div class="wrapper">
            <strong class="num__text strong__num">Задание № <input class="num__text" type="text" value=""
                                                                  name="number" required></strong>
            <input name="orig_num" value="-1" style="display: none">
        </div>
        <div class="wrapper">
            <strong>Текст задания</strong>
            <textarea name="text" class="task__text" required></textarea>
        </div>
        <div class="wrapper">
            <strong>Ответ на задание</strong>
            <span><input class="answer__text" value="" name="answer" required></span>
        </div>
        <div class="wrapper">
            <span><button class="btn__load">Загрузить картинку</button></span>
        </div>
        <hr class="line">
    </div>
    <? return $a;
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
    <link rel="stylesheet" href="/admin/variant_edit/variant_edit.css">
</head>
<body>
<header>
    <? require_once '../header.php' ?>
</header>
<section class="main">
    <div class="container">
        <h2>Редактирование варианта</h2>
        <div class="actions">
            <button onclick="add_form()">Добавить</button>
            <button>Удалить</button>
        </div>
        <?
        $sql_rec = 'SELECT task, num, answer FROM tasks WHERE exam = ? and variant = ?';
        $res = $pdo->prepare($sql_rec);
        $res->execute([(int)$_POST['exam'], (int)$_POST['var']]);
        ?>
        <input name="exam" value="<? echo $_POST['exam'] ?>" style="display: none">
        <input name="variant" value="<? echo $_POST['var'] ?>" style="display: none">
        <div class="tasks">
            <? while ($row = $res->fetch(PDO::FETCH_ASSOC)): ?>
                <div class="task">
                    <div class="wrapper">
                        <strong class="num__text strong__num">Задание № <input name="number"
                                                                               class="num__text" type="text" required
                                                                               value="<? echo $row['num'] ?>"></strong>
                        <input name="orig_num" value="<? echo $row['num'] ?>" style="display: none">
                    </div>
                    <div class="wrapper">
                        <strong>Текст задания</strong>
                        <textarea name="text" required class="task__text"><? echo $row['task'] ?></textarea>
                    </div>
                    <div class="wrapper">
                        <strong>Ответ на задание</strong>
                        <span><input name="answer" required class="answer__text"
                                     value="<? echo $row['answer'] ?>"></span>
                    </div>
                    <div class="wrapper">
                        <span><button class="btn__load">Загрузить картинку</button></span>
                    </div>
                    <hr class="line">
                </div>
            <? endwhile; ?>
        </div>
        <button id="send" class="btn__blue" onclick="send()">Сохранить</button>
    </div>
</section>
<footer>
    <? require_once '../footer.php' ?>
</footer>
<script>
    function add_form() {
        document.querySelector('.tasks').innerHTML += `<? create_form() ?>`
    }
</script>
<script src="variant_edit/variant_edit.js"></script>
</body>
</html>
