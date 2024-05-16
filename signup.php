<?php

session_start();
require_once('database.php');

$login = $_POST['login'];
$password = $_POST['password'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$emailPattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";
$phonePattern = "/^\+7\(\d{3}\)-\d{3}-\d{2}-\d{2}$/";

$existing_user_row = mysqli_query($database, "SELECT * FROM `Users` WHERE `login` = '$login'");
if(mysqli_num_rows($existing_user_row) > 0) {
    $_SESSION['message'] = "Пользователь с таким логином уже существует";
    header('location: /index.php');
    die();
}

$existing_user_row = mysqli_query($database, "SELECT * FROM `Users` WHERE `email` = '$email'");
if(mysqli_num_rows($existing_user_row) > 0) {
    $_SESSION['message'] = "Пользователь с такой почтой уже существует";
    header('location: /index.php');
    die();
}

if (!preg_match($phonePattern, $phone)) {
    $_SESSION['message'] = "Неправильный формат телефона";
    header('location: /index.php');
    die();
}

if (!preg_match($emailPattern, $email)) {
    $_SESSION['message'] = "Неправильный формат почты";
    header('location: /index.php');
    die();
}

if (strlen($password) < 3) {
    $_SESSION['message'] = 'Пароль меньше 3-х символов';
    header('location: /index.php');
    die();
}

mysqli_query($database, "INSERT INTO `Users` (`login`, `password`, `name`, `email`, `phone`) VALUES ('$login', '$password', '$name', '$email', '$phone')");

$_SESSION['message'] = "Регистрация прошла успешно!";
header('location: /index.php');
die();