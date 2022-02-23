<?php

namespace Modules;

use App\Renderer;
use App\Routes\Router;

class Module {

    /**
     * L'instance de route piur définir toute les routes
     *
     * @var Router
     */
    protected $route;

    /**
     *
     * Permet de rendre les vues
     * 
     * @var Renderer
     */
    protected Renderer $renderer;

    /**
     *
     * @param Router $route
     * @param Renderer $renderer
     */
    public function __construct(Router $route, Renderer $renderer)
    {
        $this->route = $route;
        $this->renderer = $renderer;
    }
}