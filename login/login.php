<?php
session_start();
?>
<!doctype html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
<form name = "test" action = "auth.php" method = "post">
    <label><p align="center">Login</p> </label>
    <input type = "text" name = "login" placeholder = "Your login">
    <label><p align="center">Password</p> </label>
    <input type = "password" name = "password" placeholder = "Your password">
    <button><font color ="black">Login</font></button>
    <p>
        У Вас нету аккаунта? - <a href="../function/reg.php">зарегистрируйтесь!</a>
    </p>
    <?php
    if ($_SESSION['message']) {
        echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
    }
    unset($_SESSION['message']);
    ?>
</form>
</body>
</html>