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
            <a class="title" href="<?= $route->generateUri("home") ?>">
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
                <?= item($route->generateUri("admin.categories"), "Gestion des Categories")  ?>
                <?= item($route->generateUri("admin.posts"), "Gestion des Articles")  ?>
            </ul>

        </div>

        <div class="navbar toggle-h" data-navbar-toggle>     
            <!-- menu destiner à l'administarteur -->
            <ul class="items">
                <li class="item">
                <?= item($route->generateUri("home"), "<i class='fa fa-eye'></i> voir le site")  ?>
            </ul>
        </div>

 
    </div>
    <!-- end blog en tête -->

    <!-- container -->
    <div class="container">
        <?= $content ?>

        <!-- <div class="grid-row grid-col-3">
            <div class="cards">
                <a href="" class="card-link">
                    <div class="card-image" style="background-image:url(assets/image/post.jpg)">
                        
                    </div>
                    <div class="card-title">Kabila Mutu</div>
                    <div class="card-date">déceder le 16 juin 1975 (suicide)</div>

                </a>
            </div> 
            <div class="cards">
                <a href="" class="card-link">
                    <div class="card-image" style="background-image:url(assets/image/post.jpg)">
                        
                    </div>
                    <div class="card-title">Deby pala</div>
                    <div class="card-date">déceder le 16 juin 1975 (suicide)</div>

                </a>
            </div>
            <div class="cards">
                <a href="" class="card-link">
                    <div class="card-image" style="background-image:url(assets/image/post.jpg)">
                        
                    </div>
                    <div class="card-title">Mvutu Sarah</div>
                    <div class="card-date">déceder le 16 juin 1975 (suicide)</div>

                </a>
            </div>
            
        </div> -->

        
        
    </div>
    <!-- end container -->



    <!-- loader page -->
    <!-- <div class="loader" loader-dom>
        <div class="loader-radius">
            <div class="load"></div>
            <div class="load"></div>
        </div>
        <div class="loader-radius">
            <div class="load"></div>
            <div class="load"></div>
        </div>
        <div class="loader-radius">
            <div class="load"></div>
            <div class="load"></div>
        </div>
    </div> -->
    

    <script src="<?= sources("js/app.js") ?>"></script>
    <script src="<?= sources("fontawesome/js/all.js") ?>"></script>
</body>
</html>