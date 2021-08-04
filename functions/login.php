<?php
$login = $_POST["login"];
$pass = $_POST["pass"];
require '../config.php';
$sql = ("SELECT * FROM `teachers` WHERE `login` = '$login' AND `pass` = '$pass'");
$rez = mysqli_query($link, $sql);
$user = $rez->fetch_assoc(); 
setcookie('user',$user['id'],time() + 3600, "/");
setcookie('fio',$user['fio'],time() + 3600, "/");    
header("Location: /forlogin.php");
?>