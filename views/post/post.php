<?php

use App\Table\Connection;
use App\Table\PostsTable;

$title = "blog";

$posts = new PostsTable(Connection::getPDO());
$pagine = $posts->findPaginatedPost(6);


?>

<h1 class="text-dark"> Blog </h1>
<div class="grid-row grid-col-3 gap-column-10 gap-row-20">
    <?php foreach ($pagine->getData() as $post): ?>
    <div class="cards">
        <a href="" class="card-link">
            <div class="card-image"><img src="<?= sources("img/post.jpg") ?>" alt="" srcset=""> </div>
            <div class="card-title"><?= $post->getName() . " "  . $post->getFirtsname()  ?></div>
            <div class="card-date">déceder le 16 juin 1975 ( <?=  ucfirst($post->getCause()) ?> )</div>
            <div class="card-age text-center"><?= ((int)date("Y") - (int)$post->getHappy()->format("Y")) . " ans"  ?></div>
        </a>
    </div> 
    <?php endforeach ?>
    
</div>
<div class="pagination pagination-small">
    <?= $pagine->prev() ?>
    <nav class="paginate-items">
        <?= $pagine->paginates() ?>
    </nav>
    <?= $pagine->next() ?>
</div>