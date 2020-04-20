<?php
session_start();
require_once '../vendor/connect.php';
$name = $_POST['name'];
$surname = $_POST['surname'];

$check_user = mysqli_query($link, "SELECT * FROM `users` WHERE `name` = '$name' AND `surname` = '$surname' ");
$_SESSION['check_user'] = $check_user;
$user = mysqli_fetch_assoc($check_user);
var_dump($user);

if (mysqli_num_rows($check_user) > 0) {
    if ($name == $user['name']) {
        $sql = mysqli_query($link, "SELECT `id`, `name`, `surname`,`login`,`password`,`lang`,`role` FROM `users` WHERE `name` = '$name' AND `surname` = '$surname'");
        while ($result = mysqli_fetch_array($sql)) {
            echo '<tr>' .
                "<td>{$result['id']}</td>" .
                "<td>{$result['name']}</td>" .
                "<td>{$result['surname']}</td>" .
                "<td>{$result['login']}</td>" .
                "<td>{$result['password']}</td>" .
                "<td>{$result['lang']}</td>" .
                "<td>{$result['role']}</td>" .
                '</tr>';
        }
    } else {
        echo 'Неверный логин или пароль';
        header('location: login.php');
    }
}