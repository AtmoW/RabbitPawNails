<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';
session_start();
use Admin\DataBase;



if(isset($_SESSION['auth'])){
    header("Location: apps.php");
}


$l = 'admin';
$p = 'admin';
?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
    <form action="index.php" method="post">
        <input type="text" name="login">
        <input type="password" name="password">
        <input type="submit" name="enter" value="войти">
    </form>
    </body>
    </html>

<?php
if(isset($_POST['enter'])){

    $log = $_POST['login'];
    $pass = $_POST['password'];

    $data = DataBase::select('rabbit');

    $data = $data[0];

    if($log == $l && $pass == $p){
        $_SESSION['auth'] = 'yes';
        echo '<div><a href="apps.php">ВОЙТИ</a></div>';
    }
    else{
        echo 'NON CORRECT';
    }

}
?>