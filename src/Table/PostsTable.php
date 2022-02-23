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
            ->innerJoin("INNER JOIN {$this->joinTable} ON {$this->joinTable}.id = {$this->table}.id")
            ->by("$this->table.createdate", "DESC"),
            $this->count("id"),
            $this->class,
            $perPage
        );
    }

}