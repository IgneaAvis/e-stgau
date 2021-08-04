<?php
$login = $_POST["login"];
$pass = $_POST["pass"];
require '../config.php';
$mysql = new mysqli('localhost', 'root', 'root', 'e-test');
$sql = ("SELECT * FROM `teachers` WHERE `login` = '$login' AND `pass` = '$pass'");
$rez = mysqli_query($link, $sql);
$user = $rez->fetch_assoc(); 
// if(count($user) == 0){
//     echo "<h3 style='color:red; text-align:center;'>Ошибка Нет такого пользователя!</h3>";
//     exit();
// }
setcookie('user',$user['id'],time() + 3600, "/");
setcookie('fio',$user['fio'],time() + 3600, "/");    
$mysql->close();
header("Location: /forlogin.php");
?>