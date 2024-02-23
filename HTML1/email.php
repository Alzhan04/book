<?php
$mail = filter_var(trim($_POST['mail']),
FILTER_SANITIZE_STRING);

if(mb_strlen($mail) < 5 || mb_strlen($mail) > 90) {
    echo "Недоспутимая длина логина";
exit();
}

$mysql = new mysqli('localhost','root','root','email'); 
$mysql->query("INSERT INTO `gmail` ( `mail`)
VALUES('$mail')"); 

$mysql->close();

header('Location: index.html')
?>