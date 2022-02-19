<?php

namespace App;

use Exceptions\ContainerException;
use PDO;

class Container {

    /**
     *
     * @var array
     */
    private static  $DB = [
        "database.user" => "root",
        "database.pass" => "",
        "database.host" => "localhost",
        "database.dbname" => "deces",
        "database.option" => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::FETCH_DEFAULT => PDO::FETCH_CLASS
        ],
        "table.cate" => "category"
    ];

    static function get (string $key) {
        return self::$DB[$key];
    }

    
}