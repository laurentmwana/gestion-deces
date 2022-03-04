<?php

use App\Helpers\Text;
use App\Table\CategoryTable;
use App\Table\Connection;

$title = "edition de la categorie";

$categorie = (new CategoryTable(Connection::getPDO()))->find($id)[0];

?>

<div class="container">
    <h1 class="text-dark"> Editer la categorie <strong><?= Text::e($categorie->getCategorie() ) ?></strong></h1>
</div>

