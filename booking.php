<?php include_once 'header.php';
require_once __DIR__ . '/vendor/autoload.php';

use Admin\DataBase;

$time = DataBase::select('time');

$mane_time = $time[0];
unset($time[0]);
$this_date = $_GET['date'];

$start = $mane_time['start'];
$end = $mane_time['end'];

foreach ($time as $t) {
    if (in_array($this_date, $t)) {
        $start = $t['start'];
        $end = $t['end'];
    }
}

$start = explode(':', $start);
$end = explode(':', $end);

if ($start[1] == '30') {
    $start = (int)$start[0] + 0.5;
} else {
    $start = (int)$start[0];
}

if ($end[1] == '30') {
    $end = (int)$end[0] + 0.5;
} else {
    $end = (int)$end[0];
}


$breaks = DataBase::selectIt('breaks', '*', 'date = \'' . $this_date . '\'');

$starts = [];
$ends = [];

foreach ($breaks as $key => $break) {
    $t = explode(':', $break['start']);
    if ($t[1] == '30') {
        $t = (int)$t[0] + 0.5;
    } else {
        $t = (float)$t[0];
    }
    $starts[] = $t;

    $t = explode(':', $break['end']);
    if ($t[1] == '30') {
        $t = $t[0] + 0.5;
    } else {
        $t = $t[0];
    }
    $ends[] = $t;
}
array_multisort($starts,$ends);


$apps = DataBase::selectIt('applications','start, duration','date = \'' . $this_date . '\'');

$apps_start = [];
$apps_durs = [];

var_dump($apps);

foreach ($apps as $app) {
    $t = explode(':', $app['start']);
    if ($t[1] == '30') {
        $t = (int)$t[0] + 0.5;
    } else {
        $t = (float)$t[0];
    }
    $apps_start[] = $t;
    $apps_durs[] = $app['duration'];
}
array_multisort($apps_start,$apps_durs);

?>

    <main class="time__main">
        <div class="time">
            <div class="container">
                <div class="time__title block-title">
                    Выберите время
                </div>
                <div class="time__inner">
                    <?php
                    $k = 0;
                    $kk = count($starts)-1;
                    $l = 0;
                    $ll = count($apps_start)-1;
                    for ($i = $start; $i <= $end; $i += 0.5):
                        if(count($starts)>0){
                            if($i == (float)$starts[$k]){
                                $i += $ends[$k] - $starts[$k];
                                if($k!=$kk){
                                    $k++;
                                }
                            }
                        }
                        if(count($apps_start)>0){
                            if($i == (float)$apps_start[$l]){
                                $i += $apps_durs[$l] + 0.5;
                                if($l!=$ll){
                                    $l++;
                                }
                            }
                        }
                        ?>

                        <form action="form.php" method="post">
                            <input type="hidden" name="date" value="<?php echo $_GET['date'] ?>">
                            <?php if (round($i) > $i): ?>
                                <input type="hidden" name="time" value="<?php echo floor($i) ?>:30">
                                <input type="submit" class="time__btn" value="<?php echo floor($i) ?>:30">
                            <? else: ?>
                                <input type="hidden" name="time" value="<?php echo floor($i) ?>:00">
                                <input type="submit" class="time__btn" value="<?php echo floor($i) ?>:00">
                            <?php endif; ?>
                        </form>

                    <?php endfor; ?>
                </div>
            </div>
        </div>

    </main>


<?php include_once 'footer.php' ?>