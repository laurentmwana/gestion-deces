<?php


namespace App\Table;

use App\Entity\Category;
use App\Request;

class categoryTable extends Table {

    /**
     * Nom de la table 
     *
     * @var string
     */
    private $table = "category";
    
    /**
     * Récupère une ligne d'informations 
     *
     * @param integer $key
     * @return Category
     */
    public function find (int $key): array {
        return $this->getQuery()
        ->from($this->table)->where("id = 1")->select();
    }
    
    /**
     *
     * @param string $key
     * @return boolean
     */
    public function delete (string $key): bool {
        return $this->getQuery()
        ->from($this->table)
        ->where("id = :id")->params([
            ":id" => $key
        ])
        ->delete();
    }

    /**
     *
     * @param Request $request
     * @return boolean
     */
    public function insert (Request $request): bool {
        return $this->getQuery()
        ->from($this->table)
        ->where("id = :id")->params([
            ":id" => ""
        ])
        ->insert();
    }

}