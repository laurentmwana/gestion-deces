<?php

namespace App\Table;

use App\Container;
use PDO;

class Connection {

    static $pdo;

    /**
     * Une instance de PDO
     *
     * @return PDO
     */
    static function getPDO (): PDO {

        if (!self::$pdo) {
            self::$pdo = new PDO(
                "mysql:host=" . Container::get("database.host") . ";dbname=" . Container::get("database.dbname"),
                Container::get("database.user"), Container::get("database.pass"), Container::get("database.option")
            );
        }

        return self::$pdo;
        
    }
}