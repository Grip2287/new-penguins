<?php
include "Connect.php";
$login = trim($_POST['login']); // Удаляет все лишнее и записываем значение в переменную //$login
$name = trim($_POST['Name']);
$pass = trim($_POST['pass']);

if (mb_strlen($login) < 5 || mb_strlen($login) > 100) {
    echo "Недопустимая длина логина";
    exit();
}


$result1 = mysqli_query($con, "SELECT * FROM `Users` WHERE `email` = '$login'");

$user1 = mysqli_fetch_assoc($result1); // Конвертируем в массив

if (!empty($user1)) {
    echo "<script>alert('Данный логин уже используется!'); location.href = 'index.php' </script>";
    exit();
} else {
    $result2 = "INSERT INTO `Users` (`email`, `password`,`username`)VALUES('$login', '$pass','$name') WHERE";
    mysqli_query($con, $result2);
    echo "<script>alert('Регистрация успешная'); location.href = 'index.php' </script>";
}
