<?php


namespace App\Table;

use PDO;

class Table {

    /**
     * Une instance de PDO
     *
     * @var PDO
     */
    private PDO $pdo;

    /**
     *
     * @param Connection $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     *
     * @return Query
     */
    protected function getQuery (): Query {
        return new Query($this->pdo);
    }

}