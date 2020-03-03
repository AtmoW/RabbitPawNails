<?php
require_once __DIR__ . '/vendor/autoload.php';

use Admin\DataBase;
use Admin\Post;

$client = Post::postInArray();

$all_servs = DataBase::select('services');

$servs = 0;
$counts = 0;
$duration = 0;
foreach ($client as $key => $c) {
    if (stristr($key, 'service')) {
        if ($servs > 0) {
            $client['services'] .= ',' . stristr($key, '-', true);
        } else {
            $client['services'] .= stristr($key, '-', true);
        }
        $servs++;
        foreach ($all_servs as $s) {
            if (mb_strtolower($s['name']) == $c) {
                $t = $s['time'];
                $t = explode(':', $t);
                if ($t[1] == '30') {
                    $t = $t[0] + 0.5;
                } else {
                    $t = $t[0];
                }
                $duration += $t;
            }
        }

        unset($client[$key]);
    }


    if (stristr($key, 'count')) {
        if ($counts > 0) {
            $client['counts'] .= ',' . stristr($key, '-', true) . '-' . $c;
        } else {
            $client['counts'] .= stristr($key, '-', true) . '-' . $c;
        }
        $counts++;
        unset($client[$key]);
    }
}

$client['phone'] = str_replace(['+', '(', ')', '-'], '', $client['phone']);
$client['duration'] = $duration;

DataBase::insert('applications',$client);
?>


ГОТОВО
