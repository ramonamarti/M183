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
        mysqli_query($db, "set global wait_timeout = 600");
        return $db;
    }

    static function getPdo()
    {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $dbase = "m183";
        $pdo = 'mysql:dbname=' . $dbase . ';host=' . $host . ';charset=utf8';
        $db = new PDO($pdo, $user, $pass);
        if (mysqli_connect_errno()) {
            echo mysqli_connect_errno();
            die(" Error");
        }
        return $db;
    }

    static function insertData(string $table, string $values, string $columns)
    {
        if ($table == null || $table == '' || $columns == null || $columns == '' || $values == null || $values == '') {
            return false;
        }

        if ($table == null || $table == '') {
            return false;
        }
        $columns = ($columns == null || $columns == '') ? '' : $columns;
        $sql = "INSERT INTO " . $table . " " . '(' . $columns . ") " . "VALUES (" . $values . ");";
        $db = mysqli_query(DB::getDb(), $sql);
        if (!$db) {
            echo $sql . '<br>';
        }
        return $db;
    }

    static function insertUser(string $name, string $password)
    {
        $sql = self::getPdo()->prepare("INSERT INTO users (username,password) VALUES (:un,:pw);");
        if (!$sql) {
            return false;
        }
        $db = $sql->execute(['un' => $name, 'pw' => $password]);
        return $db;
    }

    static function selectUser($select, string $col = 'username')
    {
        switch ($col) {
            case 'username':
                $sql = self::getPdo()->prepare("SELECT * FROM users WHERE username LIKE :sel;");
                break;
            case 'password':
                $sql = self::getPdo()->prepare("SELECT * FROM users WHERE password LIKE :sel;");
                break;
            default:
                $sql = self::getPdo()->prepare("SELECT * FROM users WHERE id = :sel;");
                break;
        }
        if (!$sql) {
            return false;
        }
        $db = $sql->execute(['sel' => $select]);
        $array = $sql->fetchAll();
        return $array;
    }

    static function insertArticle(string $name, string $amount = '', string $price = '')
    {
        $sql = self::getPdo()->prepare("INSERT INTO articles (name) VALUES (:name);");
        if (!$sql) {
            return false;
        }
        $db = $sql->execute(['name' => $name]);
        return $db;
    }

    static function selectArticle(string $select)
    {
        $sql = self::getPdo()->prepare("SELECT * FROM articles WHERE name LIKE :sel;");
        if (!$sql) {
            return false;
        }
        $db = $sql->execute(['sel' => '%'.$select.'%']);
        $array = ($db) ? $sql->fetchAll() : array();
        return $array;
    }

    static function deleteArticle(int $id)
    {
        $sql = self::getPdo()->prepare("DELETE FROM articles WHERE id = :id;");
        if (!$sql) {
            return false;
        }
        $db = $sql->execute(['id' => $id]);
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