<?php

use App\Table\CategoryTable;

$categorie = new CategoryTable();
$find = $categorie->find($id);




?>

<h1 class="text-dark"> <?= $find[0]->getCategorie()  ?></h1>
<h4 class="text-danger"> 1500000000 morts</h4>
<h5 class="text-dark"> créer le <?= $find[0]->getCreateDate()  ?></h5>
<h5 class="text-dark"> la dernière modifiction date de <?= $find[0]->getUpdateDate()  ?></h5>

<p class="text-muted"> <?= $find[0]->getContent()  ?></p>