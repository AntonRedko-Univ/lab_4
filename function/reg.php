<!doctype html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
<form name = "test" action = "../login/signup.php" method = "post">
    <label><p align="center">Login</p> </label>
    <input type = "text" name = "login" placeholder = "Your login">
    <label><p align="center">Password</p> </label>
    <input type = "password" name = "password" placeholder = "Your password">
    <label><p align="center">Name</p> </label>
    <input type = "text" name = "name" placeholder = "Your name">
    <label><p align="center">Surname</p> </label>
    <input type = "text" name = "surname" placeholder = "Your surname">
    <label><p align="center">Language</p> </label>
    <input type = "text" name = "lang" placeholder = "Chose language">
    <label><p align="center">Role(admin, manager, client)</p> </label>
    <input type = "text" name = "role" placeholder = "Register as...">
    <button><font color ="black">Registration</font></button>
    <p>
        У Вас есть аккаунт? - <a href="../login/login.php">авторизируйтесь!</a>
    </p>
</form>
</body>
</html>