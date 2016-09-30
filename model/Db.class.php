<?php


class Db extends Model
{

    private static $pdo;
    private $type;
    private $server;
    private $user;
    private $password;
    private $db;


    public function __construct()
    {
        self::$pdo = null;
    }


    public static function exec()
    {

        //self::$pdo = new PDO("mysql: host=localhost; dbname=livraria", "root", 123);
        try {
            self::$pdo = new PDO(TYPE_DB . ":host=" . SERVER_DB . "; dbname=" . NAME_DB, USER_DB, PASSWORD_DB);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return self::$pdo;

        } catch (PDOException $error) {
            $error->getMessage();
        }


    }

}