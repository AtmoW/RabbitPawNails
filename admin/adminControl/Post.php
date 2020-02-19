<?php


namespace Admin;


class Post
{
    public static function postInArray()
    {
        $arr = [];
        foreach ($_POST as $key => $value) {
            $arr[$key] = $value;
        }
        return $arr;
    }
}