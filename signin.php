<?php

session_start();
require_once 'database.php';
require_once 'token.php';

$login = $_POST['login'];
$password = $_POST['password'];

// Данные для входа администратора
$adminLogin = "admin";
$adminPassword = "sha256"; 

if ($login === $adminLogin && hash('sha256', $password) === $adminPassword) {
    $_SESSION['message'] = "Вы вошли как администратор!";
    header('location: adminpanel.php');
    exit();
}

$user_row = mysqli_query($database, "SELECT * FROM `Users` WHERE `login` = '$login' AND `password` = '$password'");

if(mysqli_num_rows($user_row) > 0) {
    $cols = mysqli_fetch_array($user_row);
    $_SESSION['token'] = token_encode($cols["id"], $cols["password"], $cols["login"]);
    $_SESSION['user_id'] = $cols["id"];
    $_SESSION['message'] = "Вы вошли в учётную запись!";
    header('location: personal.php');
} 
else {
    $_SESSION['message'] = 'Неверный логин или пароль';
    header('location: login.php');
}

// <?php
//                     $username = $token_data["login"];
// 
//                     echo "<h2 class='user-nickname'>$username</h2>";
//  ?>