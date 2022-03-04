<?php

namespace App\Table;

use App\Models\Posts;
use App\Pagination;

class PostsTable extends Table {

    /**
     * Nom de la table 
     *
     * @var string
     */
    protected $table = "posts";

    private $joinTable = "category";

    /**
     *
     * @var \App\Models\Posts
     */
    protected $class = Posts::class;

    /**
     *
     * @param integer $perPage
     * @return Pagination
     */
    public function findPaginatedPost ($perPage = 9): Pagination {
        return new Pagination(
            $this->getQuery()->from($this->table)
            ->innerJoin("JOIN {$this->joinTable} ON {$this->table}.categorie_id = {$this->joinTable}.id")
            ->by("$this->table.createdate", "DESC"),
            (int)($this->getQuery()
            ->innerJoin("JOIN {$this->joinTable} ON {$this->table}.categorie_id = {$this->joinTable}.id")
            ->from($this->table)->count("{$this->table}.id")->exec())[0],
            $this->class,
            $perPage
        );
    }

}