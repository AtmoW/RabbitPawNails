<?php
include_once 'admin-header.php';

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Admin\DataBase;
use Admin\Post;

if (count($_POST) > 0) {
    if (isset($_POST['add'])) {
        unset($_POST['add']);
        $new_break = Post::postInArray();
        DataBase::insert('breaks', $new_break);
    }
    if (isset($_POST['edit'])) {
        unset($_POST['edit']);
        $edit_break = Post::postInArray();
        $id = $edit_break['id'];

        unset($edit_break['id']);
        DataBase::update('breaks', $edit_break, $id);
    }
}

$breaks = DataBase::select('breaks');

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
if (!isset($_SESSION['auth'])):
    header('location:index.php');
    exit();

else:
?>


<form action="breaks.php" method="post">
    <div class="form__block">
        <label for="date">Дата</label>
        <input class="break_date"  id="date" name="date" type="date" required>
        <label  for="start">Время начала перерыва(например 1:30)</label>
        <input  class="break_start" id="start" name="start" type="text" required>
        <label  for="end">Время конца перерыва(например 1:30)</label>
        <input class="break_end"  id="end" name="end" type="text" required>

        <div class="break_add btn">Добавить перерыв</div>
    </div>
</form>

<div class="breaks">
    <?php foreach ($breaks as $break):
        $date = explode('-', $break['date']);
        $date = (int)$date[2] . ' ' . $_monthsList[(int)$date[1]] . ' ' . $date[0];
        ?>

        <div class="break box" data-id="<?php echo $break['id'] ?>">
            <form action="breaks.php" method="post">
                <div class="form__block">

                    <form action="breaks.php">
                        <div class="form__block">
                            <div class="title"><?php echo $date ?></div>
                            <input type="hidden" name="date" value="<?php echo $break['date'] ?>">
                            <label for="start">Время начала перерыва</label>
                            <input id="start" name="start" value="<?php echo $break['start'] ?>" type="text" required>

                            <input type="hidden" name="id" value="<?php echo $break['id'] ?>">
                            <label for="end">Время конца перерыва</label>
                            <input id="end" name="end" value="<?php echo $break['end'] ?>" type="text" required>
                            <input type="submit" name="edit" class="btn" value="Изменить">
                        </div>
                    </form>
                    <div data-id="<?php echo $break['id'] ?>" class="break_delete btn">Удалить</div>
                </div>
            </form>
        </div>
    <?php endforeach; ?>
</div>

<?php endif;?>
<?php include_once 'admin-footer.php' ?>
