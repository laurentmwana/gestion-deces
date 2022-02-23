<?php

use App\Table\Connection;
use App\Table\PostsTable;

$title = "blog";

$posts = new PostsTable(Connection::getPDO());
$pagine = $posts->findPaginatedPost();

?>

<h1 class="text-dark"> Blog </h1>
<div class="grid-row grid-col-3 gap-column-10 gap-row-20">
    <?php foreach ($pagine->getData() as $post): ?>
    <div class="cards">
        <a href="" class="card-link">
            <div class="card-image"><img src="<?= sources("img/post.jpg") ?>" alt="" srcset=""> </div>
            <div class="card-title"><?= $post->getName() . " "  . $post->getFirtsname()  ?></div>
            <div class="card-date">déceder le 16 juin 1975 (suicide)</div>
                <div class="card-age text-center"><?= 54 . " ans"  ?></div>
        </a>
    </div> 
    <?php endforeach ?>
    
</div>
<div class="pagination pagination-small">
    <a class="paginate">
        &laquo;
    </a>
    <nav class="paginate-items">
        <a href="" class="item ">1</a>
        <a href="" class="item">2</a>
        <a href="" class="item">3</a>
        <a href="" class="item">4</a>
        <a href="" class="item active">5</a>
    </nav>
    <a class="paginate">
            &raquo;
    </a>
</div>