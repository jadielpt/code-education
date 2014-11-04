<?php

namespace APIsSilex\Database;

abstract class Connect 
{
    private static $dsn = 'mysql:host=localhost;dbname=products';
    private static $user = 'root';
    private static $password = 'root';
    private static $options = [\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8' ];

    private static function connection() 
    {
        try {
            $pdo = new \PDO(self::$dsn, self::$user, self::$password, self::$options);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo "ERROR: Unable to connect to database";
            die("Code: {$e->getCode()} <br> Message: {$e->getMessage()} <br>  File: {$e->getFile()} <br> line: {$e->getLine()}");
        }
    }
    
    public static function getDb()
    {
        return self::connection();
    }
}
