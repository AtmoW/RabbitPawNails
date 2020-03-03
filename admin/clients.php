<?php
include_once 'admin-header.php';

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Admin\DataBase;
use Admin\Post;

$clients = DataBase::select('clients');


if(count($_POST)>0){
    $new_client = Post::postInArray();
    $new_client['phone'] =str_replace(['+', '(', ')', '-'], '', $new_client['phone']);
    $client = DataBase::selectIt('clients','*','phone = '.$new_client['phone']);

    $row = count($client);

    if($row==0){
        DataBase::insert('clients', $new_client);
    }
    else{
        $id = DataBase::selectIt('clients','id','phone = '.$new_client['phone']);
        DataBase::update('clients',$new_client, $id[0]['id']);
    }
}
if (!isset($_SESSION['auth'])):
    header('location:index.php');
    exit();

else:
?>

<form action="clients.php" method="post">
    <div class="form__block">
        <label for="name">Имя</label>
        <input type="text" name="name" id="name">
        <label for="phone">Номер</label>
        <input type="text" name="phone" id="phone">
        <label for="visits">Кол-во посещений</label>
        <input type="number" name="visits" min="0" id="visits">
        <input type="submit" class="btn" value="Добавить клиента">
    </div>
</form>



<?php foreach ($clients as $client):?>
<div class="client box">
    <div class="client__info">
        <div class="client__name">Имя: <span class="title"><?php echo $client['name'] ?></span></div>
        <div class="client__phone">Номер: <span class="title"><?php echo $client['phone'] ?></span></div>
        <div class="client__visits">Посещений: <span class="title"><?php echo $client['visits'] ?></span></div>
    </div>
</div>
<?php endforeach;?>
<?php endif; ?>
<?php include_once 'admin-footer.php'?>
