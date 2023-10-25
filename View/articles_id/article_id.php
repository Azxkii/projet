<?php

use App\Model\DB;
use App\Model\Entity\Article;
use App\Model\Manager\ArticleManager;

/**
 * Listing of articles.
 */
?>
<head>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,200&family=Titillium+Web:ital,wght@1,600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6df8555a49.js" crossorigin="anonymous"></script>
    <title>RSAZXKI || ARTICLE</title>
</head>
<h1 style="font-size: 160%; margin-bottom: -8%;"><?= $params['articles']->getTitle()?></h1>
<div class="articleid_psn">
    <?php
        /* @var Article $params*/ ?>
        <div class="block_psn">
            <p><img src="/assets/img/<?= $params['articles']->getImg()?>.png" alt="" srcset=""></p>
            <p><?= $params['articles']->getPrix()?> €</p>
            <form action="/checkAddShop/<?= $params['articles']->getId()?>/1" method="post">
                <input type="text" name="title" style="display: none" value="<?= $params['articles']->getTitle()?>">
                <input type="text" name="id" style="display: none" value="<?= $params['articles']->getId()?>">
                <input type="text" name="prix" style="display: none" value="<?= $params['articles']->getPrix()?>">
                <input type="text" name="quantite" style="display: none" value="1">
                <?php if ($_SESSION['authenticated']) { ?>
                    <input type="submit" name="submit" id="input" value="Ajouter au panier">
                <?php }
                else {
                    header("Location: " . $_SERVER["HTTP_REFERER"]);
                }?>
            </form>
        </div>
</div>