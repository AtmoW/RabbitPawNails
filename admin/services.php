<?php include_once 'admin-header.php';
require_once dirname(__DIR__) . '/vendor/autoload.php';

use Admin\DataBase;
use Admin\Post;
if(isset($_POST['add'])){
    unset($_POST['add']);
    $servs = Post::postInArray();

    DataBase::insert('services', $servs);
}

if(isset($_POST['delete'])){
    DataBase::delete('services', $_POST['id']);
}

if(isset($_POST['edit'])){
    unset($_POST['edit']);
    $edits = Post::postInArray();
    DataBase::update('services',$edits, $_POST['id']);
}
$services = DataBase::select('services');

if (!isset($_SESSION['auth'])):
    header('location:index.php');
    exit();

else:
?>

<form action="services.php" method="post">
    <div class="form__block">
        <label for="name">Название услуги</label>
        <input id="name" name="name" type="text" required>
        <label for="time">Длительность(например 1:30)</label>
        <input id="time" name="time" type="text" required>
        <label for="price_one">Цена за ноготь (если нет - 0)</label>
        <input id="price_one" name="price_one" type="number" value = "0" min="0" required>
        <label for="price_all">Цена за 10 ногтей (если нет - 0)</label>
        <input id="price_all" name="price_all" type="number" value = "0" min="0" required>

        <input type="submit" class="btn" value="Добавить услугу" name="add">
    </div>
</form>

<div class="serv__block">
<?php foreach ($services as $s): ?>

<form action="services.php" method="post">
    <div class="serv__title title"><?php echo $s['name'] ?></div>
    <div class="form__block serv">
        <form action="services.php" method="post">
            <div class="form__block serv__box">
                <label for="name">Название услуги</label>
                <input type="text" name="name" value="<?php echo $s['name']?>">
                <input type="hidden" name="id" value="<?php echo $s['id'] ?>">
                <input type="submit" class="btn" value="Изменить" name="edit">
            </div>
        </form>
        <form action="services.php" method="post">
            <div class="form__block serv__box">
                <label for="time">Длительность(например 1:30)</label>
                <input type="text" name="time" value="<?php echo $s['time']?>">
                <input type="hidden" name="id" value="<?php echo $s['id'] ?>">
                <input type="submit" class="btn" value="Изменить" name="edit">
            </div>
        </form>
        <form action="services.php" method="post">
            <div class="form__block serv__box">
                <label for="price_one">Цена за ноготь (если нет - 0)</label>
                <input id="price_one" name="price_one" type="number" value = "<?php echo $s['price_one'] ?>" min="0" required>
                <input type="hidden" name="id" value="<?php echo $s['id'] ?>">
                <input type="submit" class="btn" value="Изменить" name="edit">
            </div>
        </form>
        <form action="services.php" method="post">
            <div class="form__block serv__box">
                <label for="price_all">Цена за 10 ногтей (если нет - 0)</label>
                <input id="price_all" name="price_all" type="number" value = "<?php echo $s['price_all'] ?>" min="0" required>
                <input type="hidden" name="id" value="<?php echo $s['id'] ?>">
                <input type="submit" class="btn" value="Изменить" name="edit">
            </div>
        </form>

        <input type="hidden" name="id" value="<?php echo $s['id'] ?>">
        <input type="submit" class="btn" value="Удалить" name="delete">
    </div>
</form>

<?php endforeach; ?>
</div>
<?php endif; ?>
<?php include_once 'admin-footer.php' ?>
