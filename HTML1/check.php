<?php
$login = filter_var(trim($_POST['login']),
FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']),
FILTER_SANITIZE_STRING);

if(mb_strlen($login) < 5 || mb_strlen($login) > 90) {
    echo "Недоспутимая длина логина";
exit();
} else if(mb_strlen($password) < 2 || mb_strlen($password) > 15) {
    echo "Недоспутимая длина пароля (от 2 до 15 символов)";
exit();
}
$password = md5($password."asdfg1234");

$mysql = new mysqli('localhost','root','root','register-bd'); 
$mysql->query("INSERT INTO `users` ( `login`, `password`)
VALUES('$login', '$password')"); 

$mysql->close();

header('Location: index.html')
?>