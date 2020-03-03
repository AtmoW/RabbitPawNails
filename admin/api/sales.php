<?php
require_once dirname(dirname(__DIR__)) . '/vendor/autoload.php';

use Admin\DataBase;
use Admin\Post;

if(isset($_POST)){
    if($_POST['function']=='add'){
        unset($_POST['function']);

        $new_sale = Post::postInArray();
        unset($_POST);

        DataBase::insert('sales',$new_sale);

        $sale = DataBase::selectIt('sales','*','count = \''.$new_sale['count'].'\'');

        echo json_encode($sale[0]);
    }

    if($_POST['function'] == 'upd_stud'){
        unset($_POST['function']);
        $percent['percent'] = $_POST['percent'];
        unset($_POST);

        DataBase::update('sales',$percent,1);
    }
}