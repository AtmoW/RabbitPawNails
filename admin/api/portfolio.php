<?php
require_once dirname(dirname(__DIR__)) . '/vendor/autoload.php';

use Admin\DataBase;
use Admin\FileManager;


if($_POST['function'] == "delete"){
    unset($_POST['function']);
    DataBase::delete('portfolio', $_POST['id']);

    $port = DataBase::select('portfolio');
    echo json_encode($port);
}
if( isset( $_POST['my_file_upload'] ) && $_POST['my_file_upload'] != ''){

    $f['photo_url'] = $_FILES[0];

    $file['photo_url'] = FileManager::saveFileNoFiles($f);
    $file['photo_url'] = substr_replace($file['photo_url'], null,0, 3);
    DataBase::insert('portfolio', $file);

    $port = DataBase::select('portfolio');
    echo json_encode($port);

}