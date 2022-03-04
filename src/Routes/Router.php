<?php

namespace App\Routes;


class Router {

    /**
     * L'url à traiter
     *
     * @var string
     */
    private $url;

    /**
     * les données des routes
     *
     * @var array
     */
    private $routes = [];

    /**
     * Les noms des routes
     *
     * @var array
     */
    private $nameRoute = [];

    /**
     * Router Constructor
     * 
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = trim($url, "/");
    }

    /**
     * Permet de rajouter un chemin dans le routeur
     *
     * @param string $method POST, GET
     * @param string $path 
     * @param callable $callback
     * @param string $name
     * @return self
     */
    public function map (string $method, string $path, callable $callback, string $name): self {
        $route = new Route($path, $callback, $name);
        $map = explode("|", $method);

        foreach ($map as $v) {
            $this->routes[$v][] = $route;
            $this->nameRoute[$name] = $route;
        }
          
        return $this;
    }

    /**
     * Execute tous les routes qui sont inserer
     *
     * @return mixed
     */
    public function run () {

        if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
            throw new RouteException("La methode utilisée n'existe pas");
        }

        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->matches($this->url)) {
                http_response_code(200);
                return $route->require();
            }
        }

        http_response_code(404);
        throw new RouteException("$this->url est introuvable");
    }

    /**
     * Permet de generer un url appartir du routeur
     *
     * @param string $name
     * @param array $params
     * @return string
     */
    public function url (string $name, array $params = []): string {
        if (!isset($this->nameRoute[$name])) {
            throw new RouteException(" c'est nom du routeur '$name' n'existe pas");
        }

        return DIRECTORY_SEPARATOR .  $this->nameRoute[$name]->getParams($params);
    }
}