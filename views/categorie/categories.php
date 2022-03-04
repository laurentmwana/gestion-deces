<?php

use App\Helpers\Text;
use App\Table\CategoryTable;
use App\Table\Connection;

$title = "categories";

$category = new CategoryTable(Connection::getPDO());
$paginate = $category->findPaginatedCategory(12);



?>


<div class="container">
        
    <h1 class="text-dark"> Categories</h1>

    <div class="grid-row grid-col-3 gap-column-20">

        <?php foreach($paginate->getData() as $categorie): ?>
        <div class="cards-small">
            <a href="<?= $route->url("categorie.show", [
                "id" => $categorie->getId(),
                "categorie" => $categorie->getCategorie()
            ]) ?>" class="card-link">
                <div class="card-title"><?= $categorie->getCategorie()  ?></div>
                <div class="card-stat">1500000000 morts</div>
                <div class="card-desc"><?=  Text::excerpt($categorie->getContent(), 200) ?> </div>
                <div class="card-date"> créer le <?= $categorie->getCreateDate()->format("d/m/Y à H:m:s") ?> </div>
            </a>
        </div>
        <?php endforeach ?>
    </div>
    <div class="pagination pagination-small">
        <?= $paginate->prev() ?>
        <nav class="paginate-items">
            <?= $paginate->paginates() ?>
        </nav>
        <?= $paginate->next() ?>
    </div>
</div>