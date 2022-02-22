<?php

namespace Modules;

use App\Renderer;
use App\Routes\Router;

class BlogModule {


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
        ->map("GET", "/", [$this, "home"], "blog.home");


    }

    /**
     * La page d'accueil
     *
     * @return mixed
     */
    public function home () {
        return $this->renderer->render("blog.home");
    }
}