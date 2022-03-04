<?php


namespace App;

use App\Helpers\URI;
use App\Table\Query;

class Pagination {

    /**
     * Nombres total des pages 
     * 
     * @var integer
     */
    private $count;

    /**
     * Nombre de produit par page 
     *
     * @var integer
     */
    private $perPage = 12;

    private $classMapping;

    /**
     * Permet de faire une requete avec les données paginer
     *
     * @var Query
     */
    private $query;

    /**
     * Page passer en paramètre de l'url
     *
     * @var integer
     */
    private $currentPage = 1;

    /**
     * Interval de 
     *
     * @var int
     */
    private $intervall;

    private $limited = 3;


    
    

    /**
     * Pagination Constructor 
     *
     * @param Query $query
     * @param integer $count
     * @param mixed $classMapping
     * @param integer $perPage
     * @param integer $limited
     * @param integer $intervall
     */
    public function __construct(
        Query $query, 
        int $count, 
        $classMapping, 
        int $perPage = 12, 
        int $limited = 2, 
        int $intervall = 10
    )
    {
        $this->count = $count;
        $this->query = $query;
        $this->classMapping = $classMapping;
        $this->currentPage = URI::getPositiveInt("page");
        $this->perPage = $perPage;
        $this->intervall = $intervall;
        $this->limited = $limited;

        if ($this->currentPage >= $this->getPages()) {
            $this->currentPage = $this->getPages();
        }
    }
    
    /**
     * Les données paginés
     *
     * @return array
     */
    public function getData (): array {

   
        $offset = $this->perPage * ($this->currentPage - 1);
        $offset = $offset < 0 ? 0 : $offset;
        return $this->query
        ->offset($offset)->limit($this->perPage)
        ->exec($this->classMapping);
    }

    /**
     * Nombres de total de pages 
     *
     * @return integer
     */
    public function getPages (): int {
        return ceil($this->count / $this->perPage);
    }
    
    /**
     * page suivante
     *
     * @param string|null $html
     * @return string|null
     */
    public function next (?string $html = null): ?string {
        if ($this->currentPage >= $this->getPages()) return null;
        $link = URI::getUri("page", ($this->currentPage + 1)); 
        return <<< HTML
        <a href="{$link}" class="paginate" > &raquo  </a>
HTML;
    }

    /**
     * la page précédente
     *
     * @param string|null $html
     * @return string|null
     */
    public function prev (?string $html = null): ?string {

        if ($this->currentPage <= 1) return null;
        $link = URI::getUri("page", ($this->currentPage - 1)); 
        return <<< HTML
        <a href="{$link}" class="paginate" > &laquo  </a>
HTML;
       
    }

    public function paginates (): void {
        
        if ($this->getPages() > 1 && $this->currentPage > 1) {
           
           if ($this->currentPage > $this->intervall) {
                $linkVal = URI::getUri("page" , ($this->currentPage - $this->intervall)); 
               echo <<< HTML
                 <a href="{$linkVal}" class="item">...</a>
               HTML;
           }

            for ($i = ($this->currentPage - $this->limited); $i <= ($this->currentPage - 1) ; $i++) {
                if ($i > 0) {
                    $links = URI::getUri("page" , $i); 
                    echo <<< HTML
                    <a href="{$links}" class="item">{$i}</a>
                    HTML;
                }
             
            }

            echo <<< HTML
            <span class="item active">{$this->currentPage}</span>
            HTML;

            for ($i = ($this->currentPage + 1); $i <= ($this->currentPage + $this->limited); $i++) {

                if ($i <= $this->getPages()) {
                    $links = URI::getUri("page" , $i); 
                    $active = ($this->currentPage == $i) ? 'active' : '';
                    echo <<< HTML
                    <a href="{$links}" class="item">{$i}</a>
                    HTML;
                }
                
            }

            if ($this->currentPage > $this->intervall && $this->currentPage <= ($this->getPages() > $this->intervall)) {
                $linkVal = URI::getUri("page" , ($this->currentPage + $this->intervall)); 
               echo <<< HTML
                 <a href="{$linkVal}" class="item">...</a>
               HTML;
           }
        }
    }
}