<?php

use App\Helpers\URI;
use App\Table\CategoryTable;
use App\Table\Connection;


$categorie = new CategoryTable(Connection::getPDO());

if ($categorie->delete($id)) {
   URI::redirect($route->generateUri("admin.categories"));
}