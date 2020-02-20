<?php
require_once '../db.php';
if (!isset($_SESSION['user_login']) or $_SESSION['role'] != 'admin') {
    ?>
    <script>
        location.href = '/index.php';
    </script>
    <?php
}
$params = json_decode($_POST['params']);
//print_r($params);
$m = $params->task;
$exam = (int)$params->exam;
$var = (int)$params->variant;
foreach ($m as $i) {
    if ($i->orig_num == '-1') {
        $sql_rec = "INSERT INTO tasks(exam, variant, num, task, answer) VALUES(?, ?, ?, ?, ?)";
        $res = $pdo->prepare($sql_rec);
        $res->execute([$exam, $var, (int)$i->num, $i->text, $i->ans]);
    } else {
        $sql_rec = "UPDATE tasks SET num = ?, task = ?, answer = ? WHERE exam = ? AND variant = ? AND num = ?";
        $res = $pdo->prepare($sql_rec);
        $res->execute([(int)$i->num, $i->text, $i->ans, $exam, $var, (int)$i->orig_num]);
    }
}
echo 'OK';

