<?php
require_once __DIR__ . '/vendor/autoload.php';

use Admin\DataBase;


$social = DataBase::select('social');
$social = $social[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rabbit paw nails</title>
    <link rel="shortcut icon" href="img/list-mark.png" type="image/x-icon">
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico|Roboto:300i,400,400i,500,500i,700i,900i&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<header class="header">
    <div class="container">
        <div class="header__inner">
            <nav class="header__menu">
                <div class="header__burger burger">
                    <span></span>
                </div>
                <ul class="header__menu-list menu">
                    <li><a href="index.php">Главная</a></li>
                    <div class="header__menu-list-sep"></div>
                    <li><a href="#">Как записаться</a></li>
                    <div class="header__menu-list-sep"></div>
                    <li><a href="#">Мои работы</a></li>
                    <div class="header__menu-list-sep"></div>
                    <li><a href="#">Запись</a></li>
                    <div class="header__menu-list-sep last"></div>
                    <li>
                        <div class="menu__phone">
                            <a href="tel:+<?php echo $social['phone']?>>"></a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="header__phone"><a href="tel:+<?php echo $social['phone']?>">+<?php echo $social['phone']?></a></div>
            <div class="header__soсio">
                <a href="https://instagram.com/<?php echo $social['instagram']?>"><img src="img/header-social-1.svg" alt=""></a>
                <a href="<?php echo $social['vk']?>"><img src="img/header-social-2.svg" alt=""></a>
                <a href="https://api.whatsapp.com/send?phone=<?php echo $social['phone']?>&text=<?php echo urlencode($social['whats_msg'])?>"><img src="img/header-social-3.svg" alt=""></a>
            </div>
        </div>
    </div>
</header>
