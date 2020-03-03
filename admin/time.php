<?php
include_once 'admin-header.php';

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Admin\DataBase;
use Admin\Post;

if (isset($_POST['set_mane'])) {
    unset($_POST['set_mane']);

    $mane_base = Post::postInArray();
    DataBase::update('time', $mane_base, 1);
}

$time = DataBase::select('time');
$mane = $time[0];
unset($time[0]);

if (!isset($_SESSION['auth'])):
    header('location:index.php');
    exit();

else:
?>

<form action="time.php" method="post">
    <div class="form__block">
        <div class="title">Основное расписание</div>
        <label for="start">Время начала</label>
        <input type="text" name="start" value="<?php echo $mane['start'] ?>" id="start">
        <label for="end">Время начала</label>
        <input type="text" name="end" value="<?php echo $mane['end'] ?>" id="end">
        <input type="submit" class="btn" name="set_mane" value="Установить как основное">
    </div>
</form>

<div class="time__block">
    <div class="form__block">
        <label for="time_date">Дата для изменения расписания</label>
        <input type="date" name="date" id="time_date">
        <label for="new_start">Время начала</label>
        <input type="text" name="start" value="" id="new_start">
        <label for="new_end">Время начала</label>
        <input type="text" name="end" value="" id="new_end">
        <input type="hidden" id="new_id" value="">
        <input class="btn"  type="submit" name="edit" id="time_edit" value="Изменить">
    </div>
</div>


<div class="weekend__block block">
    <?php foreach ($time as $t): ?>
        <div class="weekend box" data-id="<?php echo $t['id']?>">
            <div class="weekend__info">
                <div><?php echo $t['date'] ?></div>
                <div><?php echo $t['start'] ?> - <?php echo $t['end'] ?></div>
            </div>

            <div data-id="<?php echo $t['id']?>" class="weekend__delete btn" >Удалить</div>
        </div>
    <?php endforeach; ?>
</div>

<?php endif; ?>
<?php include_once 'admin-footer.php' ?>
