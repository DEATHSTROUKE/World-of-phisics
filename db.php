<?php

ini_set('session.gc_maxlifetime', 10);
ini_set('session.cookie_lifetime', 0);
$driver = 'mysql';
$host = 'localhost';
$db_name = 'test_db';
$db_user = 'root';
$db_pass = '';
$charset = 'utf8';
$option = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
try {
    $pdo = new PDO("$driver:host=$host;dbname=$db_name;charset=$charset",
        $db_user, $db_pass, $option);
} catch (PDOException $e) {
    echo $e;
    die('Не могу подключиться к базе данных');
}

session_start();
