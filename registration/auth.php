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
        ?>
        <script>
            location.href = '/index.php';
        </script> <?php

    } else {
        ?>
        <script>
            alert('Неверно введен логин или пароль');
            location.href = 'signin.php';
        </script>
        <?php
    }
} else {
    ?>
    <script>
        alert('Не введен логин или пароль');
        location.href = 'signin.php';
    </script>
    <?php
}

