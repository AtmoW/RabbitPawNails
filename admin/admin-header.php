<?php
session_start();

if (isset($_POST['exit'])) {
    unset($_SESSION['auth']);
    header("Location: index.php");
}

if (!isset($_SESSION['auth'])):
    header("Location: index.php");
    exit();
else:
    ?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Admin panel</title>

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
<header>

    <nav class="header__menu">
        <div class="header__burger burger">
            <span></span>
        </div>
        <ul class="header__menu-list menu">
            <li><a href="waiting.php">Ожидают</a></li>
            <div class="header__menu-list-sep"></div>
            <li><a href="apps.php">Заявки</a></li>
            <div class="header__menu-list-sep"></div>
            <li><a href="clients.php">Клиенты</a></li>
            <div class="header__menu-list-sep"></div>
            <li><a href="social.php">Связь</a></li>
            <div class="header__menu-list-sep"></div>
            <li><a href="portfolio.php">Примеры работ</a></li>
            <div class="header__menu-list-sep last"></div>
            <li><a href="calendar.php">Календарь</a></li>
            <div class="header__menu-list-sep last"></div>
            <li><a href="services.php">Услуги</a></li>
            <div class="header__menu-list-sep last"></div>
            <li><a href="time.php">Время работы</a></li>
            <div class="header__menu-list-sep last"></div>
            <li><a href="breaks.php">Перерывы</a></li>
            <div class="header__menu-list-sep last"></div>
            <li><a href="sales.php">Скидки</a></li>
            <div class="header__menu-list-sep last"></div>
        </ul>
    </nav>

        <form action="admin-header.php" method="post">
            <input type="submit" class="btn" name="exit" value="ВЫЙТИ">
        </form>
    </div>
</header>
<?php endif; ?>