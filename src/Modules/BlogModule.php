<?php


namespace Modules;

use App\Renderer;
use App\Routes\Router;

class BlogModule extends Module {
    
    /**
     *
     * @param Router $route
     * @param Renderer $renderer
     */
    public function __construct(Router $route, Renderer $renderer)
    {
        parent::__construct($route, $renderer);
        $this->route->map("GET", "/blog", [$this, "blog"], "blog.home");
    }

    public function blog() {
        return $this->renderer->render("blog.blog");
    }
}