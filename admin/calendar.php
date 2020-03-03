<?php include_once 'admin-header.php';

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Admin\DataBase;
use Admin\Post;


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

$w = DataBase::select('weekends');

if (!isset($_SESSION['auth'])):
    header('location:index.php');
    exit();

else:
?>


<form action="calendar.php" method="post">
    <div class="form__block">
        <label for="weekend">Дата выходного дня</label>
        <input class="weekend_date" type="date" name="date" id="weekend">
        <div class="weekend_add btn">Добавить выходной</div>
    </div>
</form>

<div class="calendar_block block">
    <?php foreach ($w as $value):
        $date = explode('-', $value["date"]);

        $date = (int)$date[2] . ' ' . $_monthsList[(int)$date[1]] . ' ' . $date[0];
        ?>
        <div class="weekend box" data-id="<?php echo $value['id'] ?>">
            <form action="calendar.php" method="post">
                <div class="form__block">
                    <label for=""><?php echo $date ?></label>
                    <div data-id="<?php echo $value['id'] ?>" class="weekend_delete btn">Удалить выходной</div>
                </div>
            </form>
        </div>
    <?php endforeach; ?>
</div>

<?php endif; ?>
<?php include_once 'admin-footer.php'; ?>
