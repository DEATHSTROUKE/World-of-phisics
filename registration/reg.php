<?php
require_once "../db.php";

$email = trim($_POST['email']);
$pwd = $_POST['password'];
$fio = explode(' ', trim($_POST['fio']));

if (!empty($email) && !empty($pwd) && !empty($fio) &&
    (($_POST['role'] == 'student' && count($fio) == 2) ||
        ($_POST['role'] == 'teacher' && count($fio) == 3))) {
    if ($_POST['role'] == 'student') {
        $sql_rec = "SELECT id FROM users WHERE email = ?";
        $res = $pdo->prepare($sql_rec);
        $res->execute([$email]);
        $row = $res->fetch(PDO::FETCH_ASSOC);
    } elseif ($_POST['role'] == 'teacher') {
        $sql_rec = "SELECT id FROM teachers WHERE email = ?";
        $res = $pdo->prepare($sql_rec);
        $res->execute([$email]);
        $row = $res->fetch(PDO::FETCH_ASSOC);
    }
    if (!$row['id']) {
        $pwd = password_hash($pwd, PASSWORD_DEFAULT);
        if ($_POST['role'] == 'student') {
            $sql = "INSERT INTO users(email, password, name, surname) VALUES (?, ?, ?, ?)";
            $rec = $pdo->prepare($sql);
            $rec->execute([$email, $pwd, $fio[1], $fio[0]]);
        } elseif ($_POST['role'] == 'teacher') {
            $sql = "INSERT INTO teachers(email, password, name, surname, middle_name) VALUES (?, ?, ?, ?, ?)";
            $rec = $pdo->prepare($sql);
            $rec->execute([$email, $pwd, $fio[1], $fio[0], $fio[2]]);
        }
        $_SESSION['user_login'] = $email;
        $_SESSION['role'] = $_POST['role']
        ?>
        <script>
            alert('Аккаунт успешно зарегистрирован');
            location.href = '/index.php';
        </script> <?php
    } else {
        ?>
        <script>
            alert('Данные email уже зарегистрирован');
            location.href = '/registration/signup.php';
        </script> <?php
    }
} else {
    ?>
    <script>
        alert('Неверно введены данные');
        location.href = '/registration/signup.php';
    </script> <?php
}
