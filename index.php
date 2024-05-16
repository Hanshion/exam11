<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <header class="header">
        <div class="header-wrapper">
            <p class="logo">Лого</p>
            <ul>
                <a href="login.php">Вход</a>
                <a href="index.php">Регистрация</a>
            </ul>
        </div>
    </header>
    <main>
        <form action="signup.php" method="post">
            <h2 class="form-title">Регистрация</h2>
            <div class="form-item first-item">
                <h4 class="form-item-title">Логин <span class="span-required">*</span></h4>
                <input type="text" name="login" required autocomplete="current-password">
            </div>
            <div class="form-item">
                <h4 class="form-item-title">Пароль <span class="span-required">*</span></h4>
                <input type="password" name="password" required autocomplete="current-password">
            </div>
            <div class="form-item">
                <h4 class="form-item-title">ФИО <span class="span-required">*</span></h4>
                <input type="text" name="name" required autocomplete="current-password">
            </div>
            <div class="form-item">
                <h4 class="form-item-title">Email <span class="span-required">*</span></h4>
                <input type="text" name="email" required autocomplete="current-password">
            </div>
            <div class="form-item">
                <h4 class="form-item-title">Телефон <span class="span-required">*</span></h4>
                <input type="text" name="phone" required autocomplete="current-password">
                <p class="description">в формате +7(ХХХ)-ХХХ-ХХ-ХХ</p>
            </div>
            <button type="submit" class="form-button">Создать аккаунт</button>
            <?php
            if ($_SESSION['message']){
             if ($_SESSION['message'] == "Регистрация прошла успешно!"){
               echo '<p class="alert-message">'.$_SESSION['message'].'</p>';
             } else {
               echo '<p class="alert-message">'.$_SESSION['message'].'</p>';
             }
            }
            unset($_SESSION['message']);
        ?>
        </form>
    </main>
</body>
</html>