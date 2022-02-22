<?php

namespace App\Table;

use App\Container;
use PDO;

class Connection {

    private static $host = "127.0.0.1";

    private static $dbname = "deces";

    private static $pass = "";

    private static $username = "root";

    private static $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_CLASS,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET UTF8"
    ];

    static $pdo;

    /**
     * Une instance de PDO
     *
     * @return PDO
     */
    static function getPDO (): PDO {

        if (!self::$pdo) {
            self::$pdo = new PDO(
                "mysql:host=" . self::$host . ";dbname=" . self::$dbname,
                self::$username, self::$pass, self::$options
            );
        }

        return self::$pdo;
        
    }
}