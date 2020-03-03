<?php
require_once dirname(dirname(__DIR__)) . '/vendor/autoload.php';

use Admin\DataBase;

if($_POST['function']=='add'){
    unset($_POST['function']);
    $id = $_POST['id'];
    unset($_POST['id']);

    $phone = DataBase::selectIt('applications','phone','id = '.$id);
    $phone = ($phone[0]['phone']);

    $c = DataBase::selectIt('clients','*','phone = '.$phone);

    $row = count($c);

    if($row==0){
        $client = DataBase::selectIt('applications', '*','id = '.$id);
        $client = $client[0];

        $new_client['name'] = $client['name'];
        $new_client['phone'] = $client['phone'];
        $new_client['visits'] = 1;
        DataBase::insert('clients', $new_client);

        DataBase::delete('applications',$id);
        echo 'done';
    }
    else{
        $c=$c[0];
        $v['visits'] = (int)$c['visits']+1;
        DataBase::update('clients',$v,$id = $c['id']);
        DataBase::delete('applications',$id);

        echo 'done';
    }

}
if($_POST['function']=='delete'){
    unset($_POST['function']);
    $id = $_POST['id'];
    unset($_POST['id']);

    DataBase::delete('applications', $id);
    echo 'done';
}