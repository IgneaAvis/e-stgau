<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Электронный журнал</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styleForEljur.css">
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
    echo "<form action='/eljur.php', method='post'>".
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
    "<select name='month'>".
    "<option>Январь</option>".
    "<option>Февраль</option>".
    "<option>Март</option>".
    "<option>Апрель</option>".
    "<option>Май</option>".
    "<option>Июнь</option>".
    "<option>Июль</option>".
    "<option>Сентябрь</option>".
    "<option>Октябрь</option>".
    "<option>Ноябрь</option>".
    "<option>Декабрь</option>".
    "</select>".
    "<button class='btn_open'>Загрузить</button>".
    "</form>";
    echo "<a href='/forlogin.php'><button class='btn_close'>Назад</button></a>";
    $lesson = @$_POST['lesson'];
    $group = @$_POST['group'];
    $month = @$_POST['month'];
    $month_number = 0;
    if($month == "Январь"){
        $month_number = 1;
    }elseif($month == "Февраль"){
        $month_number = 2;
    }elseif($month == "Март"){
        $month_number = 3;
    }elseif($month == "Апрель"){
        $month_number = 4;
    }elseif($month == "Май"){
        $month_number = 5;
    }elseif($month == "Июнь"){
        $month_number = 6;
    }elseif($month == "Июль"){
        $month_number = 7;
    }elseif($month == "Сентябрь"){
        $month_number = 9;
    }elseif($month == "Октябрь"){
        $month_number = 10;
    }elseif($month == "Ноябрь"){
        $month_number = 11;
    }elseif($month == "Декабрь"){
        $month_number = 12;
    }
    $sql2 = "SELECT DISTINCT date FROM assessments WHERE MONTH(date) = '$month_number'";
    $result2 = mysqli_query($link, $sql2);
    echo "<table> <tr> <th>".$month."</th></tr> <tr> <td> </td>";
    while($row = mysqli_fetch_array($result2)){
        echo "<td>".date("d", strtotime($row[0]))."</td>";
    }
    $sql3 = "SELECT fio FROM students WHERE `groups_id` = 1";
    $result3 = mysqli_query($link, $sql3);
    while($row = mysqli_fetch_array($result3)){
        echo "<tr> <td>".$row[0]."</td>";
    
    $sql4 = "SELECT mark FROM assessments WHERE `lessons_id` = (SELECT `id` FROM `lessons` WHERE `name` = '$lesson') and `groups_id` = (SELECT `id` FROM `groups` WHERE `name` = '$group') and `students_id` = (SELECT `id` FROM `students` WHERE `fio` = '$row[0]') and `date` = MONTH(date) = '$month_number'";
    $result4 = mysqli_query($link, $sql4);
    while($row = mysqli_fetch_array($result4)){
        echo "<td>".$row[0]."</td>";
    }
    echo "</tr>";
    }
    echo "</table>";
?>
<?php
    else: echo "<h2 style='color:red; text-align:center; margin-top:24px;'>Вы ввели неверные данные или </h2>"."<h2 style='color:red;text-align:center;'>Нет такого пользователя!</h2>"."<a href='/' style='text-decoration: none;
    color: #fff;'><div class='btn'>Вернуться</div></a>"
?>
<?php endif;?>
</body>
</html>