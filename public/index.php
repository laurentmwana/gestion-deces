<?php

use App\App;
use App\Helpers;
use App\Renderer;
use App\Table\categoryTable;
use App\Table\Connection;
use App\Table\QueryBuilder;
use App\Table\Table;
use Modules\Blog\BlogModule;

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
    BlogModule::class
 
 ], [
     "renderer" => $renderer
 ]))->run();

 $pdo = Connection::getPDO();

 
 Helpers::setUri("paginate", "1");