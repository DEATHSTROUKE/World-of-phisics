<?php
require_once "db.php";


$login = trim($_POST['login']);
$pwd = trim($_POST['password']);
if (!empty($login) && !empty($pwd)) {
    $sql_rec = "SELECT login, password FROM users WHERE login = ?";
    $res = $pdo->prepare($sql_rec);
    $res->execute([$login]);
    $row = $res->fetch(PDO::FETCH_ASSOC);
    if ($row['login'] and password_verify($pwd, $row['password'])) {
        $log = $row['login'];
        $_SESSION['user_login'] = $login;
        echo "Привет, $log";
    } else {
        header('Location: http://test.ru/signin.php');
        exit();
    }
} else {
    header('Location: http://test.ru/signin.php');
    exit();
}

