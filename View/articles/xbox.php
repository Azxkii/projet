<?php

use App\Model\Manager\UserManager;

$user = new \App\Model\Entity\User();
$userManager = new UserManager();
$userIsAdmin = $userManager->isAdmin($user);

$verify = new \App\Model\Entity\User();
$verifyManager = new UserManager();
$verifyIsAdmin = $userManager->isVerify($user);

/**
 * Listing of articles.
 */
?>
<head>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,200&family=Titillium+Web:ital,wght@1,600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6df8555a49.js" crossorigin="anonymous"></script>
    <title>RSAZXKI || XBOX</title>
</head>
<tbody>
<?php if (isset($_SESSION['authenticated']) && $user->getIsAdmin() && $user->getIsVerify()) { ?>
    <h1><a href="/viewCreateArticle">Créer un article</a></h1>
<?php } ?>
<h1 style="font-size: 160%; margin-bottom: -8%;">XBOX</h1>
<div class="article_psn">
    <?php
    foreach($params['articlesXBOX'] as $article) {
        /* @var Article $article */ ?>
        <div class="block_psn">
            <div class="zoom">
                <p class="para"><?= $article->getTitle()?></p>
                <p><a href="/article_id/<?= $article->getId() ?>"><img src="/assets/img/<?= $article->getImg()?>.png" alt="" srcset=""></a></p>
                <p><?= $article->getPrix()?> €</p>
                <p>
            </div>
                <?php
                if (isset($_SESSION["authenticated"]) && $user->getIsVerify()) { ?>
                    <a href="/comment/<?= $article->getId() ?>">Voir les commentaires</a>
                <?php }
                else {
                    echo "<h1>Vous devez être connecté ou avoir <br>un compte vérifié pour voir les commentaires !</h1>";
                }?>
            </p>
            <p>
                <?php
                if (isset($_SESSION['authenticated']) && $user->getIsAdmin() && $user->getIsVerify()) { ?>
                    <a href="/viewEditArticle/<?= $article->getId() ?>">Modifier</a>
                <?php } ?>
            </p>
            <p>
                <?php
                if (isset($_SESSION['authenticated']) && $user->getIsAdmin() && $user->getIsVerify()) { ?>
                    <a href="/deleteArticle/<?= $article->getId() ?>">Supprimer</a>
                <?php } ?>
            </p>
        </div>
    <?php } ?>
</div>