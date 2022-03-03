<?php

use App\Helpers\Text;
use App\Table\Connection;
use App\Table\PostsTable;


$title = "Article";

$posts = new PostsTable(Connection::getPDO());
$paginate = $posts->findPaginatedPost(20);



?>

<h1 class="text-dark"> Gestion des articles</h1>
<table class="table table-responsive">
    <thead>
        <tr>
            <th>id</th>
            <th>Nom</th>
            <th>Postnom</th>
            <th>date de naissance </th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($paginate->getData() as $Post):  ?>
        <tr>
            <td>#<?= $Post->getId() ?></</td>
            <td><?= Text::excerpt($Post->getName()) ?></td>
            <td><?= Text::excerpt($Post->getFirtsname()) ?></td>
            <td><?= $Post->getHappy()->format("d/m/Y") ?></td>
            <td>
                <div class="table-action">
                    <a href="" class="table-btn"><i class="fa fa-edit"></i> Editer</a>
                    <a href="" class="table-btn"><i class="fa fa-trash"></i> Supprimer</a>
                </div>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<div class="pagination pagination-small">
    <?= $paginate->prev() ?>
    <?= $paginate->next() ?>
</div>