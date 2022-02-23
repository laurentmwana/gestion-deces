<?php


namespace App\Table;

use App\Pagination;
use PDO;

class Table {

    /**
     * Une instance de PDO
     *
     * @var PDO
     */
    private PDO $pdo;

    protected $table = null;

    protected $class = null;

    /**
     *
     * @param Connection $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        if ($this->class === null) {
           throw new TableException("La propriete 'class' n'est pas définie ");
        }

        if ($this->table === null) {
           throw new TableException("La propriete 'table' n'est pas définie ");
        }
    }

    /**
     *
     * @return Query
     */
    protected function getQuery (): Query {
        return new Query($this->pdo);
    }

    
    public function count ($key): int {
        return  (int)($this->getQuery()->from($this->table)->count($key)->exec())[0];
    }

    /**
     * Récupère une ligne d'informations 
     *
     * @param integer $key
     * @return array
     */
    public function find (int $key): array {
        $find = $this->getQuery()
        ->from($this->table)->where("id = :id")
        ->params([":id" => $key])->exec($this->class);

        if (empty($find)) {
           throw new TableException("L'id {$key} n'existe pas dans la table {$this->table}");
        }

        return $find;
    }
}