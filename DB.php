<?php


class DB
{
    static function getDb()
    {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $dbase = "m183";
        $db = @mysqli_connect($host, $user, $pass, $dbase);
        if (mysqli_connect_errno()) {
            echo mysqli_connect_errno();
            die("<br>Error");
        }
        return $db;
    }
    static function insertData(string $table, string $values, string $columns = '')
    {
        if ($table == null || $table == '') {
            return false;
        }
        $columns = ($columns == null || $columns == '') ? '' : $columns;
        $sql = "INSERT INTO " . $table . " " . (($columns != '') ? '(' . $columns . ') ' : '') . "VALUES (" . $values . ");";
        $db = mysqli_query(DB::getDb(), $sql);
        if (!$db) {
            echo $sql . '<br>';
        }
        return $db;
    }
    static function selectTable(string $table, string $where = '', string $columns = '*')
    {
        if ($table == null || $table == '') {
            return false;
        }
        $where = ($where == null) ? '' : $where;
        $columns = ($columns == null || $columns == '') ? '*' : $columns;
        $sql = "SELECT " . $columns . " FROM " . $table . " " . (($where != '') ? 'WHERE ' . $where : '') . ";";
        $db = mysqli_query(DB::getDb(), $sql);
        if (!$db) {
            echo $sql . '<br>';
        }
        return $db;
    }
}