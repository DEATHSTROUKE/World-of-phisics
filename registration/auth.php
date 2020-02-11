<?php
require_once "../db.php";

$email = trim($_POST['email']);
$pwd = trim($_POST['password']);
if (!empty($email) && !empty($pwd)) {
    $sql_rec = "SELECT email, password FROM users WHERE email = ?";
    $res = $pdo->prepare($sql_rec);
    $res->execute([$email]);
    $row = $res->fetch(PDO::FETCH_ASSOC);
    if ($row['email'] and password_verify($pwd, $row['password'])) {
        $log = $row['email'];
        $_SESSION['user_login'] = $email;
        header('Location: /');
        exit();

    } else {
        header('Location: signin.php');
        exit();
    }
} else {
    header('Location: signin.php');
    exit();
}

