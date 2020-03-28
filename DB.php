<?php


class DB
{
    static function getDb()
    {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $dbase = "m183";
        $db = new mysqli($host, $user, $pass, $dbase);
        if (mysqli_connect_errno()) {
            echo mysqli_connect_errno();
            die(" Error");
        }
        return $db;
    }

    static function insertData(string $table, string $values, string $columns)
    {
        if ($table == null || $table == '' || $columns == null || $columns == '' || $values == null || $values == '' ) {
            return false;
        }

        if ($table == null || $table == '') {
            return false;
        }
        $columns = ($columns == null || $columns == '') ? '' : $columns;
        $sql = "INSERT INTO " . $table . " " .  '(' . $columns . ") "  . "VALUES (" . $values . ");";
        $db = mysqli_query(DB::getDb(), $sql);
        if (!$db) {
            echo $sql . '<br>';
        }
        return $db;

        /*$values = explode(',', $values);
        $placeholder = '';
        foreach ($values as $value) {
            $placeholder .= ((strlen($placeholder) > 0) ? ',' : '') . '?';
        }
        $sql = self::getDb()->prepare("INSERT INTO " . $table . " " . "(" . $columns . ") VALUES (" . $placeholder . ");");

        switch (count($values)){
            case 2:
                print_r($values);
                $sql->bind_param('ss', $var1, $var2);
                break;
            case 3:
                $sql->bind_param('sss', $values[0], $values[1], $values[2]);
                break;
            case 4:
                $sql->bind_param('ssss', $values[0], $values[1], $values[2], $values[3]);
                break;
            case 5:
                $sql->bind_param('sssss', $values[0], $values[1], $values[2], $values[3], $values[4]);
                break;
            default:
                $sql = self::getDb()->prepare("INSERT INTO " . $table . " " . "(" . $columns . ") VALUES (?);");
                $sql->bind_param('s', $values[0]);
                break;
        }
        $var1 = $values[0];
        $var2 = $values[1];

        $db =$sql->execute();
        printf("%d Row inserted.\n", $sql->affected_rows);
        if (!$db) {
            echo print_r($sql,true). 'Error<br>';
        }
        $sql->close();
        return $db;*/
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