<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-STGAU</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styleForEljur.css">
</head>
<body>
<?php
    if($_COOKIE['user'] != ''):
?>
<?php
    $teachers_id = $_COOKIE['user'];
    require 'config.php';
    $sql = "SELECT * FROM `lessons` WHERE `teachers_id` = '$teachers_id'";
    $result = mysqli_query($link, $sql);
    echo "<form action='/eljur.php', method='post' >".
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
    "<input type='date' name='dateOne'>".
    "<input type='date' name='dateTwo'>".
    "<button>Открыть</button>".
    "</form>";
    $lesson = $_POST['lesson'];
    $group = $_POST['group'];
    $dateOne = $_POST['dateOne'];
    $dateTwo = $_POST['dateTwo'];
    $sql2 = "SELECT * FROM `assessments` WHERE `lessons_id` = (SELECT `id` FROM `lessons` WHERE `name` = '$lesson') and `groups_id` = (SELECT `id` FROM `groups` WHERE `name` = '$group') and `date` between '$dateOne' and '$dateTwo'";
    $result2 = mysqli_query($link, $sql2);
    $sql3 = "SELECT * FROM `students` WHERE `groups_id` = '1'";
    $result3 = mysqli_query($link, $sql3);
?>
<?php
    else: echo "<h2 style='color:red; text-align:center; margin-top:24px;'>Вы ввели неверные данные или </h2>"."<h2 style='color:red;text-align:center;'>Нет такого пользователя!</h2>"."<a href='/'><div class='btn'>Вернуться</div></a>"
?>
<?php endif;?>
<style>
    td,th {
        width:30px;
        border: 1px solid black;
    }
</style>
</body>
</html>
<!-- echo "<table>";
    echo "<tr><th></th><th>1</th><th>2</th><th>3</th></tr>";
    while($row1 = mysqli_fetch_array($result3)){
        printf("<tr> <td>".$row1['fio']."</td></td>");
    $sql3 = "SELECT * FROM `assessments` WHERE `students_id` = '2'";
    $result3 = mysqli_query($link, $sql3);
    while($row = mysqli_fetch_array($result3)){
        printf("<td>".$row['mark']."</td>");
    }
    echo "</tr>";
    }
    echo "</table>"; 

        Стоит ознакомиться с другими циклами!!!
        И понять fetch -->