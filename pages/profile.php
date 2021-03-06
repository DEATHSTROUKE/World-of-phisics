<?php require_once "../db.php";
session_start();
if (!isset($_SESSION['user_login'])) {
    ?>
    <script>
        alert('Вы не зарегистрированы');
        location.href = '/registration/promo.php';
    </script> <?php
}
$sql_rec = "SELECT email, name, surname, class from users WHERE email = ?";
$res = $pdo->prepare($sql_rec);
$res->execute([$_SESSION['user_login']]);
$row = $res->fetch(PDO::FETCH_ASSOC);
$name = $row['name'];
$surname = $row['surname'];
$email = $row['email'];
$class = $row['class'];
$class = ($class == 0) ? 'Не выбран' : $class;
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates:400,600,700|Montserrat:400,600,700&display=swap&subset=cyrillic,cyrillic-ext"
          rel="stylesheet">
    <link href="profile/profile.css" rel="stylesheet">
    <title>Мир физики</title>
</head>
<body>
<?php require_once '../header.php' ?>
<section class="info">
    <div class="container">
        <div class="title">
            <h3>Профиль</h3>
        </div>
        <div class="data">
            <div class="data__block">
                <div class="data__text">Фамилия</div>
                <input type="text" readonly class="data__inf" value="<?php echo $surname ?>">
            </div>
        </div>
        <div class="data">
            <div class="data__block">
                <div class="data__text">Имя</div>
                <input type="text" readonly class="data__inf" value="<?php echo $name ?>">
            </div>
        </div>
        <div class="data">
            <div class="data__block">
                <div class="data__text">Email</div>
                <input type="text" readonly class="data__inf" value="<?php echo $email ?>">
            </div>
        </div>
        <div class="data">
            <div class="data__block">
                <div class="data__text">Класс</div>
                <input type="text" readonly class="data__inf" value="<?php echo $class ?>">
            </div>
        </div>
    </div>
</section>
</body>
</html>