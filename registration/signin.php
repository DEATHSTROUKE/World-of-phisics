<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_reg.css">
    <title>Test</title>
</head>
<body>
<div class="container">
    <h1 class="header">Форма регистрации</h1>
    <form method="post" action="/registration/auth.php" class="form__reg">
        <div class="group__text">
            <input type="text" name="login" placeholder="Логин" class="input__text">
            <input type="password" name="password" placeholder="Пароль" class="input__text">
        </div>
        <div class="btns">
            <input type="submit" formaction="auth.php" value="Вход" class="input__btn">
            <input type="submit" formaction="reg.php" value="Регистрация" class="input__btn">
        </div>
    </form>
</div>
</body>
</html>