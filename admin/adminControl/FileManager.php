<?php


namespace Admin;


class FileManager
{
    public static function getFileName($uploaddir, $extension = '')
    {
        $extension = $extension ? '.' . $extension : '';
        $uploaddir = $uploaddir ? $uploaddir . '/' : '';

        do {
            $name = md5(microtime() . rand(0, 9999));
            $file = $uploaddir . $name . $extension;
        } while (file_exists($file));

        return $name;

    }

    public static function getWidth($file) {
        return imagesx($file);
    }
    public static function getHeight($file) {
        return imagesy($file);
    }

    function resizeToWidth($width, $file) {
        $ratio = $width / $file->getWidth($file);
        $height = $file->getheight($file) * $ratio;
        $this->resize($width,$height);
    }

    public static function saveFile()
    {
        $uploaddir = 'portfolio';
        $extension = strtolower(substr(strrchr($_FILES['photo_url']['name'], '.'), 1));
        $filename = self::getFileName($uploaddir, $extension);
        $uploadfile = $uploaddir . '/' . $filename . '.' . $extension;
        //move_uploaded_file($_FILES['photo_url']['tmp_name'], $uploadfile);

        return $uploadfile;
    }

    public static function saveFileNoFiles($f)
    {
        $uploaddir = '../portfolio';
        $extension = strtolower(substr(strrchr($f['photo_url']['name'], '.'), 1));
        $filename = self::getFileName($uploaddir, $extension);
        $uploadfile = $uploaddir . '/' . $filename . '.' . $extension;
        move_uploaded_file($f['photo_url']['tmp_name'], $uploadfile);

        return $uploadfile;
    }
}