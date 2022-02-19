<?php

namespace App;

class Renderer {

    private $path;

    private $global = [];



    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function global (string $key, $value): void {
        $this->global[$key] = $value;
    }

   /**
    *
    * @param string $search
    * @param $replace
    * @param string $object
    * @param string $extension
    * @return string
    */
    private function replace (string $search, $replace, string $object, string $extension = ".php"): string {
        return  str_replace($search, $replace, $object) . $extension; 
    }

    /**
     * Charger le fichier dans le bon chemin
     *
     * @param string $path
     * @param string $layout
     * @param array $params
     * @return void
     */
    public function render (string $path, string $layout = "layout.layout", array $params = []): void {
        $require = $this->path . $this->replace(".", DIRECTORY_SEPARATOR, $path);
        ob_start();
        extract($this->global);
        extract($params);
        require ($require);
        $content = ob_get_clean();
        require $this->path . $this->replace(".", DIRECTORY_SEPARATOR, $layout);

    }
}