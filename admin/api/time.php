<?php
require_once dirname(dirname(__DIR__)) . '/vendor/autoload.php';

use Admin\DataBase;


if(isset($_POST['time_date'])) {
    $date = $_POST['time_date'];
    unset($_POST['time_date']);

    if($_POST['function'] == 'take'){
        unset($_POST['function']);
        $times = DataBase::select('time');
        $time = [];

        $inDataBase = false;
        foreach ($times as $t){
            if(in_array($date,$t)){
                $time = [
                    "id" => $t['id'],
                    "start" => $t['start'],
                    "end" => $t['end']
                ];
                $inDataBase = true;
                echo json_encode($time);
            }
        }
        if(!$inDataBase){
            echo json_encode($times[0]);
        }
    }

    if($_POST['function'] == 'edit'){
        unset($_POST['function']);
        $times = DataBase::select('time');
        $start = $_POST['start'];
        $end = $_POST['end'];
        $id = $_POST['id'];
        $params = [
            "date" => $date,
            "start" => $start,
            "end" => $end
        ];


        $inDataBase = false;
        foreach ($times as $t){
            if(in_array($date,$t)){
                DataBase::update('time',$params,$id);
                $inDataBase = true;
            }
        }
        if(!$inDataBase){
            DataBase::insert('time',$params);
        }
    }
}

if($_POST['function'] == 'delete'){
    unset($_POST['function']);
    DataBase::delete('time', $_POST['id']);
    unset($_POST['id']);
}


if($_POST['function'] == 'view'){
    unset($_POST['function']);

    $weekends = DataBase::select('time');
    unset($weekends[0]);

    echo json_encode($weekends);
}
