<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

use Admin\DataBase;

if($_POST['function'] == 'check_sale'){
    $phone = str_replace(['+','(',')','-'],'',$_POST['phone']);

    if($phone!=''){
        $clients = DataBase::selectIt('clients','*','phone = '.$phone);
        if(count($clients)!=0){
            $client = $clients[0];

            $sales_all = DataBase::select('sales');
            unset($sales_all[0]);
            $client_sale = 0;

            $visits = [];
            $sales = [];

            foreach ($sales_all as $sale){
                $visits[] = $sale['count'];
                $sales[] = $sale['percent'];
            }
            array_multisort($visits, $sales);

            foreach ($visits as $key => $visit){
                if($client['visits'] > $visit){
                    $client_sale = $sales[$key];
                }
            }
            echo $client_sale;

        }
        else{
            echo 0;
        }
    }
    else{
        echo 0;
    }
}
