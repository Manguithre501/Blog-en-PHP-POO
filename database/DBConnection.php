<?php

namespace Database;

use PDO;
use PDOException;
use Database\DbHelper;

final class DBConnection
{
    private static $pdo,
        $dbhost,
        $dbname,
        $dbuser,
        $dbpswd,
        $port;

    private static $instance = null;


    public function __construct()
    {
        static::$dbhost = DbHelper::arr('DB_HOST');
        static::$dbname = DbHelper::arr('DB_DATABASE');
        static::$dbuser = DbHelper::arr('DB_USERNAME');
        static::$dbpswd = DbHelper::arr('DB_PASSWORD');
        static::$port = DbHelper::arr('DB_PORT');
    }

    public static function getPDO(): PDO
    {
        if (self::$instance === null) {
            try {
                self::$instance = new PDO('mysql:host=' . static::$dbhost . ';port=' . static::$port . ';dbname=' . static::$dbname, static::$dbuser, static::$dbpswd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ));
            } catch (PDOException $e) {
                die("Une erreur est survenue lors de la connexion à la base de données");
            }
        }

        return self::$instance;
    }
}
