<?php
$login = filter_var(trim($_POST['login']),
FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']),
FILTER_SANITIZE_STRING);

$password = md5($password."asdfg1234");

$mysql = new mysqli('localhost','root','root','register-bd'); 

$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
$user = $result->fetch_assoc();
if(count($user) == 0) {
 echo "Такой пользователь не найден";
exit();
}
setcookie('user', $user['login'], time()+3600, "/");

$mysql->close();

header('Location: index.html')
?>