<?php
include "Connect.php";
$login = trim($_POST['login']);
$pass = trim($_POST['pass']);
$result = "SELECT * FROM `Users` WHERE `email`= '$login' and `password` = '$pass'";
$result1 = mysqli_query($con, $result);
$user1 = mysqli_fetch_assoc($result1); // Конвертируем в массив
if ($user1 == 0) {
    echo "<script>alert('Не правильный логин или пароль');
    location.href = '/auth.php';
    </script>";
    exit();
}


setcookie('Users', $user1['username'], time() + 3600, "/");
header('Location: page.html');
