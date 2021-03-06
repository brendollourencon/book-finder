<?php


class Db extends Model
{
    public static $pdo;

    /* metodo construtor*/
    public function __construct()
    {
        self::$pdo = null;
    }

    /*
     * Função responsavel pela conexão no banco de dados
     * @return Objeto PDO.
     * @author Brendol L.
     */
    public static function exec()
    {
        try {
            self::$pdo = new PDO(TYPE_DB.": host=".SERVER_DB."; dbname=". NAME_DB, USER_DB, PASSWORD_DB,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return self::$pdo;

        } catch (PDOException $error) {
            self::closeConnection();
            $error->getMessage();
        }
    }

    /*
     * Fecha conexão
     * @author Brendol L.
     */
    public static function closeConnection(){
        self::$pdo = null;
    }

    public static function lastId() {
        if (self::$pdo === null) {
            return self::exec()->lastInsertId();
        }

        return self::$pdo->lastInsertId();
    }

}