<?php

use App\Helpers\Hydratation;
use App\Helpers\Text;
use App\HTML\Form;
use App\Models\Category;
use App\Table\CategoryTable;
use App\Table\Connection;
use App\Validators\CategorieValidator;

$title = "edition de la categorie";

$find = (new CategoryTable(Connection::getPDO()))->find($id)[0];
$categorie = new Category();

$validate = new CategorieValidator($_POST);
$errors = $validate->update($categorie);


Hydratation::hydrate($categorie, $_POST, [
    'categorie',
    'type',
    "content"
]); 

$form = new Form($find, $errors);

?>

<div class="container">
    <h1 class="text-dark"> Editer la categorie <strong><?= Text::e($find->getCategorie() ) ?></strong></h1>
    <form action="" class="forms" method="post">
        
        <div class="grid-row grid-col-3 gap-column-20">
            <?= $form->input("categorie", "Nom de la categorie") ?>
            <?= $form->input("type", "Type de la categorie") ?>
            <?= $form->input("createdate", "Date de création", "datetime") ?>
        </div>
        <div class="grid-row grid-col-2 gap-column-20">
            <?= $form->textarea("content", "Contenu") ?>
        </div>
        
        <button class="b b-primary"><i class="fa fa-save"></i> Enregistrer</button>
    </form>

</div>

