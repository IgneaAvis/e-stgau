<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-STGAU</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styleForLogin.css">
</head>
<body>
    <?php
    if(@$_COOKIE['user'] != ''):
    ?>
    <?php
    require 'config.php';
    $id = @$_COOKIE['user'];
    $sql = "SELECT * FROM `teachers` WHERE `id` = '$id'";
    $result = mysqli_query($link, $sql);
    $name = mysqli_fetch_array($result);
    echo"<h2>Здравствуйте "."<span>".$name['fio']."</span>"."!</h2>";
    ?>
    <h3>Выберите, что хотите сделать.</h3>
    <div class="partmain">
        <a href="/eljur.php"><div class="part">Электронный журнал</div></a>
        <a href="http://www.stgau.ru/study/schedule/schedule.php"><div class="part">Расписание</div></a>
        <div class="part">
            Средняя оценка студентов в группе
        </div>
        <a href="/functions/exit.php"><div class="partOne">Выход</div></a>
    </div>
    <?php
    else: echo "<h2 style='color:red; text-align:center; margin-top:24px;'>Вы ввели неверные данные или </h2>"."<h2 style='color:red;text-align:center;'>Нет такого пользователя!</h2>"."<a href='/'><div class='btn'>Вернуться</div></a>"
    ?>
    <?php endif;?>
</body>
</html>