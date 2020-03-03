<?php


namespace Admin;


class DataBase
{
    public static function connect()
    {
        $dbUser = 'root';
        $dbName = 'rabbit_paw_nails';
        $dbPass = '';
        $host = '127.0.0.1';
        $connection = mysqli_connect($host, $dbUser, $dbPass, $dbName);
        if (mysqli_connect_errno()) {
            die("Data Base connection failed: " . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")");
        }

        mysqli_query($connection, "SET NAMES utf8");

        return $connection;
    }

    public static function select($table)
    {
        $connection = self::connect();

        $query = 'SELECT * FROM ' . $table;
        $result = mysqli_query($connection, $query) or die("Ошибка " . mysqli_error($connection));

        if ($result) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }

        mysqli_close();
    }

    public static function selectIt($table, $it, $where)
    {
        $connection = self::connect();


        if ($where != '') {
            $where = ' WHERE ' . $where;
        }

        $query = 'SELECT ' . $it . ' FROM ' . $table . $where;

        $result = mysqli_query($connection, $query) or die("Ошибка " . mysqli_error($connection));

        if ($result) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }

        mysqli_close();
    }

    public static function insert($table, $params)
    {
        $connection = self::connect();
        $columns = '';
        $values = '';


        $i = 0;
        foreach ($params as $key => $param) {
            $c[] = $key;
            $v[] = $param;
            if ($i == 0) {
                $columns .= $key;
                $values .= "'" . $param . "'";
            } else {
                $columns .= ',' . $key;
                $values .= ',' . "'" . $param . "'";
            }
            $i++;
        }

        $query = 'INSERT INTO ' . $table . ' (' . $columns . ') VALUES (' . $values . ')';

        $result = mysqli_query($connection, $query) or die("Ошибка " . mysqli_error($connection));


    }

    public static function update($table, $params, $id)
    {
        $connection = self::connect();
        $columns = [];
        $values = [];

        $i = 0;
        foreach ($params as $key => $param) {
            $columns [] = $key;
            $values [] = $param;
        }

        $updates = '';
        if (count($columns) > 1) {
            for ($i = 0; $i < count($columns); $i++) {
                if ($i > 0) {
                    $updates .= ',';
                }
                $updates .= ' ' . $columns[$i] . '=' . '"' . $values[$i] . '"';
            }
        } else {
            $updates .= ' ' . $columns[0] . '=' . '"' . $values[0] . '"';
        }
        $query = 'UPDATE ' . $table . ' SET' . $updates . ' WHERE id = ' . $id;

        $result = mysqli_query($connection, $query) or die("Ошибка " . mysqli_error($connection));
    }


    public static function delete($table, $id)
    {
        $connection = self::connect();

        $query = 'DELETE FROM ' . $table . ' WHERE id = ' . $id;

        $result = mysqli_query($connection, $query) or die("Ошибка " . mysqli_error($connection));
    }

}