<?php
include_once 'admin-header.php';

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Admin\DataBase;
use Admin\Post;

$sales = DataBase::select('sales');

$students_sale = $sales[0]['percent'];
unset($sales[0]);
if (!isset($_SESSION['auth'])):
    header('location:index.php');
    exit();

else:
?>


<form action="sales.php" method="post">
    <div class="form__block">
        <label for="count">Кол-во посещений</label>
        <input class="sales_count" id="count" name="number" min="0" type="count" required>
        <label for="percent">Процент</label>
        <input class="sales_percent" id="percent" name="percent" type="number" min="0" max="100" required>

        <div class="sales_add btn">Добавить скидку</div>
    </div>
</form>

<form action="sales.php" method="post">
    <div class="form__block">
        <label for="percent">Скидка студентам(в процентах)</label>
        <input class="stud_perc" id="percent" name="percent" type="number" min="0" max="100" value="<?php echo (int)$students_sale?>" required>

        <div class="sales_add_students btn">Добавить скидку</div>
    </div>
</form>

<div class="sales_block block">
    <?php foreach ($sales as $s): ?>
        <div class="box">
            <div class="title">От <?php echo $s['count'] ?> посещений - <?php echo $s['percent'] ?>%</div>
            <div class="sales_delete btn">Удалить</div>
        </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>
<?php include_once 'admin-footer.php' ?>
