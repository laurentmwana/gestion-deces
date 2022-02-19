<?php


namespace App\Table;

use App\URI;

class Pagination {

    /**
     * Les données paginer
     *
     * @var array
     */
    private $data = [];

    /**
     * Nombres total des pages 
     * 
     * @var integer
     */
    private $pages;

    /**
     * Nombre de produit par page 
     *
     * @var integer
     */
    private $perPage = 12;

    private $entity;

    /**
     * Permet de faire une requete avec les données paginer
     *
     * @var Query
     */
    private Query $query;

    /**
     * Page passer en paramètre de l'url
     *
     * @var integer
     */
    private $currentPage = 1;

    /**
     * La table 
     *
     * @var string
     */
    private $table;

    
    
    /**
     * Pagination Constructor 
     *
     * @param string $table
     * @param Query $query
     * @param mixed $entity
     * @param integer $perPage
     */
    public function __construct(string $table, Query $query, $entity, int $perPage = 12)
    {
        $this->table = $table;
        $this->query = $query;
        $this->entity = $entity;
        $this->currentPage = URI::getPositiveInt("page");
        $this->perPage = $perPage;
    }
    
    /**
     * Les données paginés
     *
     * @return object
     */
    private function getData (): object {
        $this->count = (int)$this->query->count()->from($this->table)->exec($this->entity);
        $this->pages = ceil($this->count / $this->perpage);
        $offset = $this->perpage * ($this->currentPage - 1);
        return $this->query
        ->offset($offset)
        ->from($this->table)->limit($this->perPage)
        ->exec($this->entity);
    }
    
    /**
     * page suivante
     *
     * @param string|null $html
     * @return string|null
     */
    public function next (?string $html = null): ?string {
        return "";
    }

    /**
     * la page précédente
     *
     * @param string|null $html
     * @return string|null
     */
    public function prev (?string $html = null): ?string {
        return "";
    }
}