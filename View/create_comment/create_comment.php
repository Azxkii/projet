<head>
    <title>BLOG | COMMENTAIRES</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,200&family=Titillium+Web:ital,wght@1,600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6df8555a49.js" crossorigin="anonymous"></script>
    <title>RSAZXKI || CREER UN COMMENTAIRE</title>
</head>
<body>
<?php
/**
 * Listing comments by article.
 */

use App\Model\Entity\Comment;

?>
<body>
<?php
if (isset($_SESSION['authenticated'])) {?>
    <div class="main">
        <div class="login">
            <form action="/checkCreateComment/<?= $params['articles']->getId() ?>" method="post">
                <label for="chk" aria-hidden="true">Ecrire un commentaire</label>
                <textarea name="content" id="content" cols="30" rows="10" placeholder="Votre commentaire..." required></textarea>
                <input id="submit" type="submit" value="Créer" name="submit">
            </form>
        </div>
    </div>
    </body>
<?php }
else {
    header('Location: /home');
}?>