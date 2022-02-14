<?php

use App\Routes\Route;
use App\Routes\Router;
use Exceptions\AutoloaderException;

require dirname(__DIR__) . "/src/Autoloader.php";
(new loading\Autoloader([
    "App\\Routes\\" => "src/Routes",
    "Exceptions\\" => "src/Exceptions"
]))::register();


$posy = new Route;