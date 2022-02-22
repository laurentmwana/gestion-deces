<?php

use App\App;
use App\Renderer;
use Modules\BlogModule;
use Modules\CategorieModule;

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

$renderer = new Renderer(VIEWS);
$app = (new App([
    BlogModule::class,
    CategorieModule::class
 
 ], [
     "renderer" => $renderer
 ]))->run();