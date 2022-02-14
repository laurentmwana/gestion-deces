<?php

namespace loading;

class Autoloader {

    static $namespaces = [];

    /**
     * Autoloader constructor 
     *
     * @param array $namespaces
     */
    public function __construct(array $namespaces)
    {
        self::$namespaces = $namespaces;
    }
    
    /**
     * Enregister le chemin et le nom de la classe 
     *
     * @return void
     */
    static  function register (): void {
        $callback = [__CLASS__, "load"];
        spl_autoload_register($callback);
    }

    /**
     * Permet de charger les classes autolmatiquements
     *
     * @param string $class
     * @return void
     */
    static function load (string $class): void {
        foreach (self::$namespaces as $key => $value) {
            if (strchr($class, $key) !== false) {
                $exists = [$class];
                $value =  ($value[-1] === "/" ) ? $value : $value . "/";
                $class = str_replace($key, $value, substr($class, strpos($class, $key)));
                $class = str_replace("\\", "/", $class). ".php";
                require dirname(__DIR__) . "/" . ($class);
            }
        }
    }
} 