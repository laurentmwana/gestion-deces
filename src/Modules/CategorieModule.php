<?php

namespace Modules;

use App\Renderer;
use App\Routes\Router;

class CategorieModule {


    /**
     * L'instance de route piur définir toute les routes
     *
     * @var Router
     */
    private $route;

    /**
     *
     * Permet de rendre les vues
     * 
     * @var Renderer
     */
    private Renderer $renderer;


    /**
     * BlogModule Constructor 
     *
     * @param Router $route
     */
    public function __construct(Router $route, Renderer $renderer)
    {
        $this->route = $route;
        $this->renderer = $renderer;

        $this->route
        ->map("GET", "/categorie/show/:categorie/:id", [$this, "show"], "categorie.show")
        ->map("GET", "/categories", [$this, "category"], "categorie");


    }



    public function category () {
        return $this->renderer->render("categorie.categories");
    }

    public function show ($categorie, $id) {
        
        return $this->renderer->render("categorie.show", compact("id"));
    }
}