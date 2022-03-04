<?php

use App\Table\CategoryTable;
use App\Table\Connection;

$title = "categories";

$categorie = new CategoryTable(Connection::getPDO());
$find = $categorie->find($id);

?>

<div class="container">
    <h1 class="text-dark"> <?= $find[0]->getCategorie()  ?></h1>
    <h4 class="text-danger"> 1500000000 morts</h4>
    <h5 class="text-dark"> créer le <?= $find[0]->getCreateDate()->format("d/m/Y à H:m:s")  ?></h5>
    <h5 class="text-dark"> Dernière modifiction  <?= $find[0]->getUpdateDate()->format("d/m/Y à H:m:s")  ?></h5>
    
    <p class="text-muted"> <?= $find[0]->getContent()  ?></p>
</div>
