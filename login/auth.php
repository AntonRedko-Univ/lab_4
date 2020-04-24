<?php
session_start();
require_once '../vendor/connect.php';
$login = $_POST["login"];
$password = $_POST["password"];


$check_user = mysqli_query($link, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password' ");
$_SESSION['check_user'] = $check_user;
$user = mysqli_fetch_assoc($check_user);


$_SESSION['user'] = [
    "id" => $user['id'],
    "name" => $user['name'],
    "surname" => $user['surname'],
    "login" => $user['login'],
    "password" => $user['password'],
    "role" => $user['role'],
    "lang" => $user['lang']
];


if (mysqli_num_rows($check_user) > 0){
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $password;
    if ($user['role'] == 'admin'){
        $_SESSION['role'] = $user['role'];
        header('Location: ..\users\admin.php');
    }else if($user['role'] == 'manager'){
        $_SESSION['role'] = $user['role'];
        header('Location: ..\users\manager.php');
    }else if($user['role'] == 'client'){
        $_SESSION['role'] = $user['role'];
        header('Location: ..\users\client.php');
    }
}else {
    echo 'Неверный логин или пароль';
    header('location: login.php');
}