<?php


namespace Modules;

use App\Renderer;
use App\Routes\Router;

class AdminModule extends Module {
    
     /**
     *
     * @param Router $route
     * @param Renderer $renderer
     */
    public function __construct(Router $route, Renderer $renderer)
    {
        parent::__construct($route, $renderer);
        
        $this->route->map("GET", "/admin/categories", [$this, "categories"], "admin.categories");
        $this->route->map("GET|POST", "/admin/categories/delete/:id", [$this, "deleteCategorie"], "admin.categorie.delete");


        $this->route->map("GET", "/admin/posts", [$this, "posts"], "admin.posts");
    }

    public function categories () {
        return $this->renderer->render("admin.categories.index", []);
    }

    public function deleteCategorie (int $id) {
        return $this->renderer->render("admin.categories.delete", compact("id"));
    }



    public function posts () {
        return $this->renderer->render("admin.post.index", []);
    }
}