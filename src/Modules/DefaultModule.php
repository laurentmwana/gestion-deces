<?php

namespace Modules;

use App\Renderer;
use App\Routes\Router;

class DefaultModule extends Module {

    /**
     *
     * @param Router $route
     * @param Renderer $renderer
     */
    public function __construct(Router $route, Renderer $renderer)
    {
        parent::__construct($route, $renderer);
        $this->route->map("GET", "/", [$this, "home"], "default.home");
    }

    public function home () {
        return $this->renderer->render("defaults.home");
    }
}