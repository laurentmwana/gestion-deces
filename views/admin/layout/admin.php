<?php

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= sources("css/app.css")  ?>">
    <link rel="stylesheet" href="<?= sources("fontawesome/css/all.css")  ?>">
    <link rel="shortcut icon" href="<?= sources("img/favicon.png")  ?>" type="image/x-icon">
    <title>Gestion de  <?= isset($title) ? "| $title" : "" ?> </title>
</head>
<body>
    <!-- blog en tête -->
    <div class="header" e-fixed="header">
       
        <!-- logo du site  -->
        <div class="logo">
            <a class="title" href="<?= $route->url("home") ?>">
                Décè<span class="su-red f-licorice">s</span> 
            </a>
           
             <!-- bars icon pour les mobiles -->
            <div class="bars" toggle-header>
                <i class="fa fa-bars fa-1x"></i>
            </div>
        </div>
        
        <!-- les menus -->
        <div class="navbar toggle-h"  data-navbar-toggle>
            <!-- menu du centre -->
            <ul class="items">
                <?= item($route->url("admin.categories"), "Gestion des Categories")  ?>
                <?= item($route->url("admin.posts"), "Gestion des Articles")  ?>
            </ul>

        </div>

        <div class="navbar toggle-h" data-navbar-toggle>     
            <!-- menu destiner à l'administarteur -->
            <ul class="items">
                <li class="item">
                <?= item($route->url("home"), "<i class='fa fa-eye'></i> voir le site")  ?>
            </ul>
        </div>

 
    </div>
    <!-- end blog en tête -->
        <?= $content ?>

    <script src="<?= sources("js/app.js") ?>"></script>
    <script src="<?= sources("fontawesome/js/all.js") ?>"></script>
</body>
</html>