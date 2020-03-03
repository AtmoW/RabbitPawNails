<?php
require_once dirname(dirname(__DIR__)) . '/vendor/autoload.php';

use Admin\DataBase;
use Admin\Post;

if(count($_POST) > 0){
    if($_POST['function'] == 'add'){
        unset($_POST['function']);
        $weekend = Post::postInArray();
        unset($_POST);

        $weekends = DataBase::selectIt('weekends','*','date = \''.$weekend['date'].'\'');

        if(count($weekends) == 0){
            DataBase::insert('weekends', $weekend);
        }

        $new_weekend = DataBase::selectIt('weekends','*','date = \''.$weekend['date'].'\'');

        $_monthsList = array(
            "1" => "Января",
            "2" => "Февраля",
            "3" => "Марта",
            "4" => "Апреля",
            "5" => "Мая",
            "6" => "Июня",
            "7" => "Июля",
            "8" => "Августа",
            "9" => "Сентября",
            "10" => "Октября",
            "11" => "Ноября",
            "12" => "Декабря"
        );

        $new_weekend = $new_weekend[0];

        $date = explode('-', $new_weekend["date"]);

        $new_weekend['full_date'] = (int)$date[2] . ' ' . $_monthsList[(int)$date[1]] . ' ' . $date[0];


        echo json_encode($new_weekend);
    }

    if($_POST['function'] == 'delete') {
        unset($_POST['function']);
        $id = $_POST['id'];
        unset($_POST['id']);

        DataBase::delete('weekends', $id);
    }

}