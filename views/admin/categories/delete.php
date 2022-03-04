<?php

use App\Helpers\URI;
use App\Session\Session;
use App\Table\CategoryTable;
use App\Table\Connection;


$categorie = new CategoryTable(Connection::getPDO());

if ($categorie->delete($id)) {
   Session::getSession()->set("success", "La categorie qui avait id '$id' a été supprimer avec succès");
   URI::redirect($route->url("admin.categories"));
}