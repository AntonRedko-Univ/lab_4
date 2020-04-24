
<html lang="ru">
<head>
    <title>Админ-панель</title>
</head>
<body>
<?php
require_once '../vendor/connect.php';
$sql = mysqli_query($link, "SELECT `id`, `name`, `surname`,`login`,`password`,`lang`,`role` FROM `users` WHERE `id`={$_GET['red_id']}");

if (!$link) {
    echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
    exit;
}

if (isset($_POST["Name"])) {

    if (isset($_GET['red_id'])) {
        $sql = mysqli_query($link, "SELECT `id`, `name`, `surname`,`login`,`password`,`lang`,`role` FROM `users` WHERE `id`={$_GET['red_id']}");
        $sql = mysqli_query($link, "UPDATE `users` SET `name` = '{$_POST['Name']}',`surname` = '{$_POST['Surname']}',`login` = '{$_POST['Login']}',
                                                            `password` = '{$_POST['Password']}',`lang` = '{$_POST['Language']}',`role` = '{$_POST['Role']}' WHERE `id`={$_GET['red_id']}");
    } else {

        $sql = mysqli_query($link, "INSERT INTO `users` (`name`, `surname`,`login`,`password`,`lang`,`role`) VALUES ('{$_POST['Name']}', '{$_POST['Surname']}','{$_POST['Login']}',
                                                            '{$_POST['Password']}','{$_POST['Language']}','{$_POST['Role']}')");
    }

    if ($sql) {
        echo '<p>Успешное изменение!</p>';
    } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
    }
}

if (isset($_GET['del_id'])) {

    $sql = mysqli_query($link, "DELETE FROM `users` WHERE `id` = {$_GET['del_id']}");
    if ($sql) {
        echo "<p>Пользователь удален.</p>";
    } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
    }
}


if (isset($_GET['red_id'])) {
    $sql = mysqli_query($link, "SELECT `id`, `name`, `surname`,`login`,`password`,`lang`,`role` FROM `users` WHERE `id`={$_GET['red_id']}");
    $user = mysqli_fetch_array($sql);
}
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
    $sql = mysqli_query($link, 'SELECT `id`, `name`, `surname`,`login`,`password`,`lang`,`role` FROM `users`');
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
    ?>
</table>
<form action = '../users/manager.php'>
    <input style="background-color: black; color: white" type = 'submit' value = 'Back to manager page'>
</form>
</body>
</html>