<?php


namespace App\Table;

use App\Entity\Category;

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
        ->from($this->table)->where("id = :id")
        ->params([
            ":id" => $key
        ])->exec(1);
    }
    
    /**
     *
     * @param string $key
     * @return boolean
     */
    public function delete (string $key): bool {
        return true;
    }

}