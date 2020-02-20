<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/signin.css">
    <title>Test</title>
</head>
<body>
<div class="container">
    <h1 class="header">Войти</h1>
    <form method="post" class="form__reg">
        <div class="group__text">
            <input type="text" name="email" placeholder="Email" class="input__text" required>
            <input type="password" name="password" placeholder="Пароль" class="input__text" required>
        </div>
        <div class="btns">
            <input type="submit" formaction="auth.php" value="Вход" class="input__btn">
            <input type="submit" formaction="signup.php" value="Регистрация" class="input__btn">
        </div>
    </form>
</div>
</body>
</html>