<?php
require_once "db.php";

$login = trim($_POST['login']);
$pwd = trim($_POST['password']);
if (!empty($login) && !empty($pwd)) {
    $sql_rec = "SELECT id FROM users WHERE login = ?";
    $res = $pdo->prepare($sql_rec);
    $res->execute([$login]);
    $row = $res->fetch(PDO::FETCH_ASSOC);
    if (!$row['id']) {
        $pwd = password_hash($pwd, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(login, password) VALUES (?, ?)";
        $rec = $pdo->prepare($sql);
        $rec->execute([$login, $pwd]);
        echo 'Аккаунт успешно зарегистрирован';
    } else {
        echo 'Пользователь с таким именем уже существует';
    }
} else {
    header('Location: http://test.ru/signin.php');
    exit();
}
