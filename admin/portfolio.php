<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once 'admin-header.php';

use Admin\FileManager;
use Admin\DataBase;

$port = DataBase::select('portfolio');
if (!isset($_SESSION['auth'])):
    header('location:index.php');
    exit();

else:
?>

<form enctype="multipart/form-data" method="post" action="portfolio.php">
    <div class="form__block">
        <input id="file" class="port_file" name="photo_url" type="file">
        <input class="port__add btn">Добавить фото</input>
    </div>
</form>


<div class="portfolio">

    <?php foreach ($port as $p): ?>

            <div class="portfolio-item">
                <div data-url="<?php echo $p['photo_url'] ?>" data-id="<?php echo $p['id']?>" name="delete" class="port__delete">Удалить фото</div>
                <img src="<?php echo $p['photo_url'] ?>" alt="">
            </div>

    <?php endforeach; ?>

</div>
<?php endif; ?>
<?php include_once 'admin-footer.php'?>