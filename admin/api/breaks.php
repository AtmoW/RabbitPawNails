<?php
require_once dirname(dirname(__DIR__)) . '/vendor/autoload.php';

use Admin\DataBase;
use Admin\Post;

if (isset($_POST)) {
    if ($_POST['function'] == 'delete') {
        unset($_POST['function']);
        $id = $_POST['id'];
        unset($_POST['id']);

        DataBase::delete('breaks',$id);
    }
    if($_POST['function'] == 'add'){
        unset($_POST['function']);
        $break = Post::postInArray();

        DataBase::insert('breaks',$break);

        $new_break = DataBase::selectIt('breaks','*','start = \''.$break['start'].'\' AND end = \''.$break['end'].'\' AND date = \''.$break['date'].'\'');

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

        $date = explode('-', $new_break[0]['date']);
        $new_break[0]['date_all'] = (int)$date[2] . ' ' . $_monthsList[(int)$date[1]] . ' ' . $date[0];



        echo json_encode($new_break[0]);
    }
}