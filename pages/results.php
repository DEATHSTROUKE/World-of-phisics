<?php
require_once '../db.php';
if (!isset($_SESSION['user_login'])) {
    ?>
    <script>
        alert('Вы не зарегистрированы');
        location.href = '/registration/promo.php';
    </script> <?php
}
$params = json_decode($_POST['params']);
$exam = $params->exam;
$var = $params->var;
$ans = $params->answers;
$sql_rec = "SELECT num, answer FROM tasks WHERE exam = ? AND variant = ?";
$res = $pdo->prepare($sql_rec);
$res->execute([$exam, $var]);
?>
<div class="container">
    <h2>Ваш результат</h2>
    <input name="exam" value="<? echo $exam ?>" style="display: none">
    <input name="variant" value="<? echo $var ?>" style="display: none">
    <table border="1" width="50%" cellspacing="0">
        <tr>
            <th>№</th>
            <th>Ваш ответ</th>
            <th>Правильный ответ</th>
        </tr>
        <? while ($row = $res->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <? $n = (string)$row['num'] ?>
                <? if ($ans->$n == ''): ?>
                    <td bgcolor="#ff6347" align="center"><? echo $row['num'] ?></td>
                    <td bgcolor="#ff6347" align="center" align="center">-</td>
                    <td bgcolor="#ff6347" align="center"><? echo $row['answer'] ?></td>
                <? elseif ($ans->$n != $row['answer']): ?>
                    <td bgcolor="#ff6347" align="center"><? echo $row['num'] ?></td>
                    <td bgcolor="#ff6347" align="center"><? echo $ans->$n ?></td>
                    <td bgcolor="#ff6347" align="center"><? echo $row['answer'] ?></td>
                <? else: ?>
                    <td bgcolor="#42ff9e" align="center"><? echo $row['num'] ?></td>
                    <td bgcolor="#42ff9e" align="center"><? echo $ans->$n ?></td>
                    <td bgcolor="#42ff9e" align="center"><? echo $row['answer'] ?></td>
                <? endif ?>

            </tr>
        <? endwhile; ?>
    </table>
</div>
