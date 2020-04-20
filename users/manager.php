<?php
session_start();
include 'C:\Users\anton\Desktop\OSPanel\domains\lab3\resources\lang.php';

$check_user = $_SESSION['check_user'];

if($_GET["exit"]){
    session_destroy();
    header("Location: ..\login\login.php");
}

if (isset($_GET['lang'])){
    $_SESSION['user']['lang'] = $_GET['lang'];
}

if (!(isset($_SESSION['login'])) && !(isset($_SESSION['password']))){
    session_destroy();
    header('Location: ..\login\login.php');
}
if (!(($_SESSION['role']) == 'manager')){
    session_destroy();
    header("Location: ..\login\login.php");
}


if ($_SESSION['user']['lang'] == 'ru'){
    echo $lang[0]['ru'] . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname'] . $lang[2]['ru'];
} else if ($_SESSION['user']['lang'] == 'en') {
    echo $lang[0]['en'] . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname'] . $lang[2]['en'];
} else if ($_SESSION['user']['lang'] == 'ua') {
    echo $lang[0]['ua'] . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname'] . $lang[2]['ua'];
} else if ($_SESSION['user']['lang'] == 'it') {
    echo $lang[0]['it'] . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname'] . $lang[2]['it'];
}
?>
<html>
<head>
    <title>Страница админа</title>
    <link rel="stylesheet" href="../assets/css/styleadmin.css">
</head>
<style>
    .b1 {
        background: red;
        color: black;
        font-size: 15pt;
    }
    .b2 {
        background: darkgreen;
        color: whitesmoke;
        font-size: 9pt;
    }
</style>

<form name = "test" action = "../function/listusers.php" method = "post">
    <button><font color ="black">List of users</font></button>
</form>
<form method="GET">
    <input type="submit" class="b1" name="exit"  value="Exit">
</form>
<form >
    <select name="lang" method="GET">
        <option value="ru">Русский</option>
        <option value="ua">Українська</option>
        <option value="en">English</option>
        <option value="it">Italian</option>
    </select>
    <input type="submit" class="b2" value="Save">
</form>
</htm