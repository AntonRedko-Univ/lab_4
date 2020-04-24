<?php
session_start();
require_once '../vendor/connect.php';
$name = $_POST['name'];
$surname = $_POST['surname'];

$content = "<form name = \"567\" action = \"../users/admin.php\">
    <button style=\"background-color: black; color: white\"> To admin-ka </font ></button >
</form >";

$content1 = " <form name = \"678\" action = \"../users/manager.php\">
    <button style=\"background-color: black; color: white\"> To manager-ka </font ></button >
    </form >";




$check_user = mysqli_query($link, "SELECT * FROM `users` WHERE `name` = '$name' AND `surname` = '$surname' ");
$_SESSION['check_user'] = $check_user;
$user = mysqli_fetch_assoc($check_user);
?>
<table border = '1' >
    <tr >
        <td > id</td >
        <td > Name</td >
        <td > Surname</td >
        <td > Login</td >
        <td > Password</td >
        <td > Language</td >
        <td > Role</td >
    </tr >
<?php
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
if ($_SESSION['user']['role'] == 'admin') {
   echo $content;
    }else if ($_SESSION['user']['role'] == 'manager'){
    echo $content1;
}