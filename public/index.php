<?php

use App\App;
use App\Renderer;
use Modules\AdminModule;
use Modules\BlogModule;
use Modules\CategorieModule;
use Modules\PostModule;

require dirname(__DIR__) . "/src/Autoloader.php";
(new loading\Autoloader([
    "App\\" => "src",
    "App\\Routes\\" => "src/Routes",
    "Exceptions\\" => "src/Exceptions",
    "Modules\\" => "src/Modules"
]))::register();

define("VIEWS", dirname(__DIR__) . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR);
define("SOURCES", dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR . "sources" . DIRECTORY_SEPARATOR);


/**
 * Permet de charger les chemins dans les liens de css, script
 *
 * @param string $source
 * @return string
 */
function sources (string $source): string {
    return SOURCES . $source;
}


function item (string $url, string $key = "key"): string {

    $uri = explode("?", $_SERVER['REQUEST_URI'])[0];
    $url = str_replace("/", DIRECTORY_SEPARATOR, $url);
    $match = str_replace("/", DIRECTORY_SEPARATOR, $uri);
    
    if ($url === $match) {
        return <<<HTML
        <li class="item active"><a href="{$url}" class="link">{$key}</a></li>
HTML;
    }

    return <<<HTML
            <li class="item"><a href="{$url}" class="link">{$key}</a></li>
HTML;
}

$renderer = new Renderer(VIEWS);
$app = (new App([
    CategorieModule::class,
    PostModule::class,
    BlogModule::class,
    AdminModule::class
 
 ], [
     "renderer" => $renderer
 ]))->run();