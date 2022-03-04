<?php

use App\Helpers\Text;
use App\Session\FlashMessage;
use App\Session\Session;
use App\Table\CategoryTable;
use App\Table\Connection;

$title = "categories";

$category = new CategoryTable(Connection::getPDO());
$paginate = $category->findPaginatedCategory(2);
$session = Session::getSession()->get("success");
$flash = new FlashMessage($session);

?>

<?= $flash->html()  ?>
<div class="container">
    <h1 class="text-dark"> Gestion des categories</h1>
    <table class="table table-responsive">
        <thead>
            <tr>
                <th>id</th>
                <th>Categorie</th>
                <th>Type</th>
                <th>Créer le </th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($paginate->getData() as $categorie):  ?>
            <tr>
                <td>#<?= $categorie->getId() ?></td>
                <td><?= Text::excerpt($categorie->getCategorie()) ?></td>
                <td><?= Text::excerpt($categorie->getType()) ?></td>
                <td><?= $categorie->getCreateDate()->format("d/m/Y  à  H:m:s") ?></td>
                <td>
                    <div class="table-action">
                        <a href="<?= $route->url("admin.categorie.update", ["id" => $categorie->getId()]) ?>" class="table-btn"><i class="fa fa-edit"></i> Editer</a>
                        <form action="<?= $route->url("admin.categorie.delete", ["id" => $categorie->getId()]) ?>" method="post">
                            <button type="submit" name="delete-categorie" class="table-btn" value="<?= $categorie->getId() ?>" onclick="return confirm('Vous voulez vraiment supprimer la categorie \'<?=  $categorie->getCategorie() ?> \' dans le tableau ?')"><i class="fa fa-trash"></i> Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <div class="pagination pagination-small">
        <?= $paginate->prev() ?>
        <nav class="paginate-items">
            <?= $paginate->paginates() ?>
        </nav>
        <?= $paginate->next() ?>
    </div>
</div>