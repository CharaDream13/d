<?php require_once "../code/all.php"; ?>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>СпецТехАренда</title>
</head>
<body>
    <header>
        <div>
            <img src="../media/logo.png">
            <h2>СпейТехАренда</h2>
        </div>
        <ul>
            <li><a href="../main/about_us.php">О нас</a></li>
            <li><a href="../main/catalog.php">Каталог спецтехники</a></li>
            <li><a href="../main/conditions.php">Условие аренды</a></li>
            <li><a href="../main/where_to_find.php">Где найти</a></li>
            <?php if(!isset($_SESSION["id_user"])){
                echo   '<li><a href="../main/login.php">Вход</a></li>
                        <li><a href="../main/register.php">Регистрация</a></li>';
            }else{
                echo   '<li><a href="../main/lk.php">Личный кабинет</a></li>
                       <li><a href="../code/logout.php">Выход</a></li>';
            }
            if($_SESSION['id_rule']==1){
                echo   '<li><a href="../main/admin_panel.php">Админ панель</a></li>';
            }
            ?>
        </ul>
    </header>