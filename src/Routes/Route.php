<?php

namespace App\Routes;


class Route {
    
    /**
     *
     * @var string
     */
    private string $path;

    /**
     *
     * @var callable
     */
    private  $callback;

    /**
     *
     * @var string
     */
    private string $name;

    /**
     * Les paramatres regex 
     *
     * @var array
     */
    private $params = [];

    /**
     * Permet de retourner le chemin de la route avec des parametres en regex 
     *
     * @var array
     */
    private $matches = [];


    /**
     * Route Constructor 
     *
     * @param string $path
     * @param callable $callback
     * @param string $name
     */
    public function __construct(string $path, callable $callback, string $name)
    {
        $this->name = $name;
        $this->callback = $callback;
        $this->path = trim($path, "/");
    }

    public function require () {
        return call_user_func_array($this->callback, $this->matches);
    }

    /**
     * Vérifie que la route définie corresponde à celle envoyer
     *
     * @param string $url
     * @return boolean
     */
    public function matches (string $url): bool {
        $path = preg_replace("#:([\w]+)#", "([^/]+)", $this->path);
        $regex ="#^$path$#";
        if (!preg_match($regex, $url, $matches)) {
           return false;
        }

        array_shift($matches);
        $this->matches = $matches;
        return  true;
     
    }

    /**
     *
     * @param array $params
     * @return string
     */
    public function getParams (array $params) {
        $path = $this->path;
        foreach ($params as $k => $v) {
            $path = str_replace(":$k", $v, $path);
        }
        return $path;
    }
    
}