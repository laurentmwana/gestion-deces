<?php

namespace App;

use App\Routes\Router;

class App {

    /**
     * liste de modules à charger
     *
     * @var array
     */
    private $module = [];

    private $route;
    
    /**
     * Ajoute les 
     *
     * @param array $modules
     * @param array $dependancies
     */
    public function __construct(array $modules, array $dependancies = [])
    {
        $route = explode("?", $_SERVER['REQUEST_URI'])[0];
        $this->route = new Router($route);
        if(isset($dependancies['renderer'])) {
            $dependancies['renderer']->global("route", $this->route);
        }
        foreach ($modules as $module) {
            $this->module = new $module($this->route, $dependancies['renderer']);
        }
    }

    public function run () {
        return $this->route->run();

    }


}