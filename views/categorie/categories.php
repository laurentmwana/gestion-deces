<?php

use App\Table\CategoryTable;
use App\Text;

$category = new CategoryTable();
$paginate = $category->findPaginated(3);

?>

<h1 class="text-dark"> Categories</h1>

<div class="grid-row grid-col-3">

    <?php foreach($paginate->getData() as $categorie): ?>
    <div class="cards-small">
        <a href="<?= $route->generateUri("categorie.show", [
            "id" => $categorie->getId(),
            "categorie" => $categorie->getCategorie()
        ]) ?>" class="card-link">
            <div class="card-title"><?= $categorie->getCategorie()  ?></div>
            <div class="card-stat">1500000000 morts</div>
            <div class="card-desc"><?=  Text::excerpt($categorie->getContent(), 200) ?> </div>
            <div class="card-date"> créer le <?= $categorie->getCreateDate() ?> </div>
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