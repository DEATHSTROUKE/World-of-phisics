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
//        echo 'Аккаунт успешно зарегистрирован';
        header('Location: ../index.php');
        exit();
    } else {
//        echo 'Пользователь с таким именем уже существует';
        header('Location: signup.php');
        exit();
    }
} else {
    header('Location: signup.php');
    exit();
}
