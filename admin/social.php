<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once 'admin-header.php';


use Admin\Post;
use Admin\DataBase;

if(count($_POST)>0){

    $updates = Post::postInArray();
    DataBase::update('social',$updates,'1');

}


    $social = DataBase::select('social');
    $social = $social[0];
?>

<form action="social.php" method="post">
    <div class="form__block">
        <label for="phone">Номер телефона в формате 71234567890</label>
        <input type="text" name="phone" id="phone" value="<?php echo $social['phone']?>">
        <input type="submit" value="изменить">
    </div>
</form>

<form action="social.php" method="post">
    <div class="form__block">
        <label for="whats_msg">Текст сообщения WhatsApp</label>
        <textarea name="whats_msg" id="whats_msg" cols="30" rows="10"><?php echo $social['whats_msg'] ?></textarea>
        <input type="submit" value="изменить">
    </div>
</form>

<form action="social.php" method="post">
    <div class="form__block">
        <label for="vk">Ссылка на ВКонтакте</label>
        <input type="text" name="vk" id="vk" value="<?php echo $social['vk']?>">
        <input type="submit" value="изменить">
    </div>
</form>

<form action="social.php" method="post">
    <div class="form__block">
        <label for="instagram">Ник instagram</label>
        <input type="text" name="instagram" id="instagram" value="<?php echo $social['instagram']?>">
        <input type="submit" value="изменить">
    </div>
</form>

<?php
require_once 'admin-header.php';
?>

