<?php
/**
 * Listing comments by article.
 */

use App\Model\Entity\Comment;

if (isset($_SESSION['authenticated'])) { ?>
    <head>
        <title>BLOG | COMMENTAIRES</title>
        <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,200&family=Titillium+Web:ital,wght@1,600&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/6df8555a49.js" crossorigin="anonymous"></script>
        <title>RSAZXKI || COMMENTAIRE</title>
    </head>
    <body>
    <?php
    if (isset($_GET['success']) && intval($_GET['success']) === 1){
        echo "<h6>La modification a réussie !</h6>";
    }
    ?>
    <div class="return">
    <span>
        <a href="/home">Revenir en arrière</a>
    </span>
    </div>
    <div class="article_xbox">
        <ul>
            <li><?= $params['articles']->getTitle()?></li>
            <li><img src="/assets/img/<?= $params['articles']->getImg()?>.png" alt="" srcset=""></li>
            <li><?= $params['articles']->getPrix()?> €</li>
        </ul>
    </div>
    <?php
    if (isset($_SESSION['authenticated'])) {
        foreach ($params['comment'] as $comment) {
            /* @var Comment $comment */ ?>
            <div class="commentaires">
                <h1>Commentaire :</h1>

                <p><?= $comment->getContent() ?></p>
            </div>
        <?php }
    }
    else {
        echo "<h1>Vous devez être connecté pour voir les commentaires.</h1>";
    }?>
    <h1><a href="/create_comment/<?= $params['articles']->getId() ?>">Ecrire un commentaire</a></h1>
    </body>
<?php }
else {
    header('Location: /home');
}
?>