<?php


namespace App\Table;

use App\Models\Category;
use App\Pagination;
use App\Request;

class CategoryTable extends Table {

    /**
     * Nom de la table 
     *
     * @var string
     */
    private $table = "category";

    public function __construct()
    {
        parent::__construct(Connection::getPDO());
    }
    /**
     * Récupère une ligne d'informations 
     *
     * @param integer $key
     * @return Category
     */
    public function find (int $key): array {
        return $this->getQuery()
        ->from($this->table)->where("id = :id")
        ->params([":id" => $key])->exec(Category::class);
    }
    
    /**
     * Les categories 
     *
     * @return Category
     */
    public function categorie () {
        return $this->getQuery()
        ->from($this->table)
        ->exec(Category::class);
    }

    public function findPaginated ($perPage = 12): Pagination {

        return new Pagination(
            $this->getQuery()->from($this->table),
            ($this->getQuery()->from($this->table)->count("id")->exec())[0],
            Category::class,
            $perPage
        );
    }

}