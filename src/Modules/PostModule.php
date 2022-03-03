<?php

namespace Modules;

use App\Renderer;
use App\Routes\Router;

class PostModule extends Module {

     /**
     *
     * @param Router $route
     * @param Renderer $renderer
     */
    public function __construct(Router $route, Renderer $renderer)
    {
        parent::__construct($route, $renderer);
        $this->route->map("GET", "/posts", [$this, "post"], "post.home");
    }

    public function post () {
        return $this->renderer->render("post.post");
    }
}