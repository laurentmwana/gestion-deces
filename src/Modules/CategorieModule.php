<?php

namespace Modules;

use App\Renderer;
use App\Routes\Router;

class CategorieModule extends Module {


    /**
     * BlogModule Constructor 
     *
     * @param Router $route
     */
    public function __construct(Router $route, Renderer $renderer)
    {
        parent::__construct($route, $renderer);

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