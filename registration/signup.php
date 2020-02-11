<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/signup.css">
    <title>Test</title>
</head>
<body>
<div class="container">
    <h1 class="header">Форма регистрации</h1>
    <form method="post" action="/registration/auth.php" class="form__reg">
        <div class="group__text">
            <input type="text" name="surname" placeholder="Фамилия" class="input__text">
            <input type="text" name="name" placeholder="Имя" class="input__text">
            <input type="text" name="email" placeholder="Email" class="input__text">
            <input type="password" name="password" placeholder="Пароль" class="input__text">
        </div>
        <div class="btns">
            <input type="submit" formaction="signin.php" value="Вход" class="input__btn">
            <input type="submit" formaction="reg.php" value="Регистрация" class="input__btn">
        </div>
    </form>
</div>
</body>
</html>