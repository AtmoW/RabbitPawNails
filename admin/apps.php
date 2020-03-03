<?php
include_once 'admin-header.php';


require_once dirname(__DIR__) . '/vendor/autoload.php';

use Admin\DataBase;
use Admin\Post;

$apps = DataBase::select('applications');

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

    if (isset($_POST['edit'])) {
        unset ($_POST['edit']);
        $id = $_POST['id'];
        unset($_POST['id']);
        $edits = Post::postInArray();
        DataBase::update('applications', $edits, $id);
    }

    if (count($apps) == 0):
        ?>
        <div class="title">Заявок нет</div>
    <?php else:foreach ($apps as $app):
        $date = explode('-', $app['date']);
        $date = (int)$date[2] . ' ' . $_monthsList[(int)$date[1]] . ' ' . $date[0];

        $visits = 0;

        $clients = DataBase::selectIt('clients', 'visits', 'phone = ' . $app['phone']);
        if (count($clients) > 0) {
            $visits = $clients[0]['visits'];
        }
        ?>
        <div class="app box" data-id="<?php echo $app['id'] ?>">
            <div class="app__info">
                <div class="app__name">Имя: <span class="title"><?php echo $app['name'] ?></span></div>
                <div class="app__phone">Номер: <span class="title"><?php echo $app['phone'] ?></span></div>
                <div class="app__time">Начало: <span class="title"><?php echo $app['start'] ?></span></div>
                <div class="app__services">Услуги: <span
                            class="title"><?php echo str_replace(',', ', ', $app['services']) ?></span></div>
                <?php if ($app['counts'] != ''): ?>
                    <div class="app__services">Кол-во: <span
                                class="title"><?php echo str_replace(',', ', ', $app['counts']) ?></span></div>
                <?php endif; ?>
                <div class="app__date">Дата: <span class="title"><?php echo $date ?></span></div>
                <div class="app__visits">Посещений: <span class="title"><?= $visits ?></span></div>
                <div class="app__visits">Связь: <span class="title"><?= $app['social'] ?></span></div>
                <form class="form" action="apps.php" method="post">
                    <div class="form__block">
                        <label>Длительность</label>
                        <input type="text" name="duration" value="<?php echo $app['duration'] ?>">
                        <input type="hidden" name="id" value="<?php echo $app['id'] ?>">
                        <input type="submit" name="edit" value="Изменить" class="btn">
                    </div>
                </form>
                <form class="form" action="apps.php" method="post">
                    <div class="form__block">
                        <label for="name">Цена</label>
                        <input type="number" name="number" value="<?= $app['price'] ?>">
                        <input type="hidden" name="id" value="<?php echo $app['id'] ?>">
                        <input type="submit" name="edit" value="Изменить" class="btn">
                    </div>
                </form>
                <form class="form" action="apps.php" method="post">
                    <div class="form__block">
                        <label for="name">Скидка</label>
                        <input type="number" name="number" value="<?= $app['sale'] ?>">
                        <input type="hidden" name="id" value="<?php echo $app['id'] ?>">
                        <input type="submit" name="edit" value="Изменить" class="btn">
                    </div>
                </form>
                <div class="app__btn">
                    <div data-id="<?php echo $app['id'] ?>" id="add_client" class="btn add_client">Пришёл</div>
                    <div data-id="<?php echo $app['id'] ?>" id="delete_app" class="btn delete_app">Отменить</div>
                </div>
            </div>
        </div>
    <?php endforeach; endif; ?>


<?php endif; ?>
<?php include_once 'admin-footer.php' ?>
