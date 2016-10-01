<?php


class Db extends Model
{


    public static $pdo;

    public function __construct()
    {
        self::$pdo = null;
    }


    public static function exec()
    {
        try {
            self::$pdo = new PDO(TYPE_DB.": host=".SERVER_DB."; dbname=". NAME_DB, USER_DB, PASSWORD_DB);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return self::$pdo;

        } catch (PDOException $error) {
            self::closeConnection();
            $error->getMessage();
        }
    }

    public static function closeConnection(){
        self::$pdo = null;
    }

}