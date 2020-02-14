<?php
require_once "../db.php";

$email = trim($_POST['email']);
$pwd = trim($_POST['password']);
$name = trim($_POST['name']);
$surname = trim($_POST['surname']);

if (!empty($email) && !empty($pwd) && !empty($name) && !empty($surname)) {
    $sql_rec = "SELECT id FROM users WHERE email = ?";
    $res = $pdo->prepare($sql_rec);
    $res->execute([$email]);
    $row = $res->fetch(PDO::FETCH_ASSOC);
    if (!$row['id']) {
        $pwd = password_hash($pwd, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(email, password, name, surname) VALUES (?, ?, ?, ?)";
        $rec = $pdo->prepare($sql);
        $rec->execute([$email, $pwd, $name, $surname]);
        ?>
        <script>
            alert('Аккаунт успешно зарегистрирован');
            location.href = '/index.php';
        </script> <?php
    } else {
        ?>
        <script>
            alert('Данные email уже зарегистрирован');
            location.href = '/registration/signin.php';
        </script> <?php
    }
} else {
    ?>
    <script>
        alert('Заполните информацию о себе');
        location.href = '/registration/signin.php';
    </script> <?php
}
