<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once 'admin-header.php';

use Admin\FileManager;
use Admin\DataBase;

$port = DataBase::select('portfolio');

if (count($_FILES) > 0) {
    $file['photo_url'] = FileManager::saveFile();
    echo $file['photo_url'];
    DataBase::insert('portfolio', $file);
}

if(isset($_POST['delete'])){
    unlink(trim($_POST['photo_url']));
    DataBase::delete('portfolio', $_POST['id']);
}

?>

<form enctype="multipart/form-data" method="post" action="portfolio.php">
    <div class="form__block">
        <input id="file" name="photo_url" type="file">
        <input type="submit" value="Добавить фото">
    </div>
</form>


<div class="portfolio">

    <?php foreach ($port as $p): ?>

        <form action="portfolio.php" method="post">
            <div class="portfolio-item">
                <input type="hidden" name="id" value = "<?php echo $p['id']?>">
                <input type="hidden" name="photo_url" value="<?php echo $p['photo_url'] ?>">
                <input type="submit" name="delete" value = "Удалить фото">
                <img src="<?php echo $p['photo_url'] ?>" alt="">
            </div>
        </form>

    <?php endforeach; ?>

</div>

