<?php


namespace App\Table;

use App\Models\Category;
use App\Pagination;

class CategoryTable extends Table {

    /**
     * Nom de la table 
     *
     * @var string
     */
    protected $table = "category";

    /**
     *
     * @var \App\Models\Category
     */
    protected $class = Category::class;

    /**
     *
     * @param integer $perPage
     * @return Pagination
     */
    public function findPaginatedCategory (int $perPage = 12): Pagination {
        return new Pagination(
            $this->getQuery()
            ->by('createdate', "DESC")->from($this->table),
            (int)($this->getQuery()
            ->from($this->table)->count("{$this->table}.id")->exec())[0],
            $this->class,
            $perPage
        );
    }

}