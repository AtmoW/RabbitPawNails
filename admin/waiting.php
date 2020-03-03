<?php
include_once 'admin-header.php';

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Admin\DataBase;
use Admin\Post;

if (!isset($_SESSION['auth'])):
    header('location:index.php');
    exit();

else:

    if(isset($_POST['delete'])) {
        unset($_POST['delete']);
        $id = $_POST['id'];
        unset($_POST);

        DataBase::delete('waiting',$id);
    }

    if(isset($_POST['add'])){
        unset($_POST['add']);
        $id = $_POST['id'];
        unset($_POST['id']);

        $new_app = Post::postInArray();

        DataBase::insert('applications',$new_app);
        DataBase::delete('waiting',$id);
    }

    if(isset($_POST['edit'])){
        unset($_POST['edit']);
        $id = $_POST['id'];
        unset($_POST['id']);

        $edits = Post::postInArray();

        DataBase::update('waiting', $edits, $id);
    }

    $waitings = DataBase::select('waiting')
    ?>

    <div class="block">
        <?php foreach ($waitings as $w): ?>
            <div class="box">
                <form action="waiting.php" method="post">
                    <input type="hidden" name="id" value="<?= $w['id'] ?>">
                    <div class="form__block serv__box">
                        <label for="name">Имя</label>
                        <input type="text" name="name" value="<?= $w['name'] ?>">
                    </div>
                    <div class="form__block serv__box">
                        <label for="name">Номер телефона</label>
                        <input type="text" name="phone" value="<?= $w['phone'] ?>">
                    </div>
                    <div class="form__block serv__box">
                        <label for="name">Связь</label>
                        <input type="text" name="social" value="<?= $w['social'] ?>">
                    </div>
                    <div class="form__block serv__box">
                        <label for="name">Дата</label>
                        <input type="date" name="date" value="<?= $w['date'] ?>">
                    </div>
                    <div class="form__block serv__box">
                        <label for="name">Начало</label>
                        <input type="text" name="start" value="<?= $w['start'] ?>">
                    </div>
                    <div class="form__block serv__box">
                        <label for="name">Длительность</label>
                        <input type="text" name="duration" value="<?= $w['duration'] ?>">
                    </div>
                    <div class="form__block serv__box">
                        <label for="name">Услуги</label>
                        <input type="text" name="services" value="<?= $w['services'] ?>">
                    </div>
                    <div class="form__block serv__box">
                        <label for="name">Цена</label>
                        <input type="number" name="price" value="<?= $w['price'] ?>">
                    </div>
                    <div class="form__block serv__box">
                        <label for="name">Скидка</label>
                        <input type="number" name="sale" value="<?= $w['sale'] ?>">
                        <input type="submit" class="btn" value="Изменить" name="edit">
                        <input type="submit" class="btn" value="Добавить" name="add">
                        <input type="submit" class="btn" value="Удалить" name="delete">
                    </div>
                </form>
            </div>
        <?php endforeach; ?>
    </div>

<?php
endif;
include_once 'admin-footer.php'; ?>
