<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Поставить оценку</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styleForMark.css">
</head>
<body>
<?php
    if(@$_COOKIE['user'] != ''):	
?>
<?php 
$teachers_id = $_COOKIE['user'];
require 'config.php';
$sql = "SELECT * FROM `lessons` WHERE `teachers_id` = '$teachers_id'";
    $result = mysqli_query($link, $sql);
    echo "<form class='form' action='/mark.php', method='post'>".
    "<select name='lesson'>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<option>".$row['name']."</option>";
    }
    echo "</select>";
    $sql1 = "SELECT * FROM `groups`";
    $result1 = mysqli_query($link, $sql1);
    echo "<select name='group'>";
    while ($row = mysqli_fetch_array($result1)) {
        echo "<option>".$row['name']."</option>";
    }
    echo "</select>".
    "<input require type='date' name='date'>".
    "<button class='btn_open'>Открыть</button>".
    "</form>";
    echo "<a href='/forlogin.php'><button class='btn_close'>Назад</button></a>";
    $lesson = @$_POST['lesson'];
    $group = @$_POST['group'];
    $date = @$_POST['date'];
    echo "<form action='mark.php' method='post'><table> <tr> <th>ФИО</th> <th>Оценка</th></tr>";
    $sql = "SELECT fio FROM students WHERE `groups_id` = (SELECT `id` FROM `groups` WHERE `name` = '$group')";
    $result = mysqli_query($link, $sql);
    while($row = mysqli_fetch_array($result)){
    	echo "<tr><td>".$row[0]."</td><td contenteditable='true' name='mark'></td></tr>";
    }
    echo "</table>".
    "<button class='btn_open1' id='btn_open1'>Сохранить</button></form>";
     $marks = @$_POST['mark'];
?>
<?php
    else: echo "<h2 style='color:red; text-align:center; margin-top:24px;'>Вы ввели неверные данные или </h2>"."<h2 style='color:red;text-align:center;'>Нет такого пользователя!</h2>"."<a href='/' style='text-decoration: none;
    color: #fff;'><div class='btn'>Вернуться</div></a>"
?>
<?php endif;?>
<script src="js/script.js"></script>
</body>
</html>