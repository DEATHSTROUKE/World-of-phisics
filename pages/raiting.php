<?php
require_once '../db.php';
if (!isset($_SESSION['user_login'])) {
    ?>
    <script>
        alert('Вы не зарегистрированы');
        location.href = '/registration/promo.php';
    </script> <?php
}

?>