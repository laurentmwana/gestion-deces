<?php

namespace App;

class Renderer {

    private $path;

    private $global = [];

    private $admin = "admin.layout.admin";

    private $default = "layout.layout";



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
     * @param array $params
     * @param string $layout
     * @return void
     */
    public function render (string $path, array $params = []): void {
        $require = $this->path . $this->replace(".", DIRECTORY_SEPARATOR, $path);
        ob_start();
        http_response_code(200);
        extract($this->global);
        extract($params);
        $isAdmin = strpos($path, "admin") !== false;
        if ($isAdmin) {
            $layout = $this->path . $this->replace(".", DIRECTORY_SEPARATOR, $this->admin);
        } else {
            $layout = $this->path . $this->replace(".", DIRECTORY_SEPARATOR, $this->default);
        }
        require ($require);
        $content = ob_get_clean();
        require ($layout) ;

    }

}