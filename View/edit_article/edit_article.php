<?php

use App\Model\Manager\UserManager;

$user = new \App\Model\Entity\User();
$userManager = new UserManager();
$userIsAdmin = $userManager->isAdmin($user);

/**
 * Edit article page.
 */
?>
<head>
    <title>BLOG | HOME</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,200&family=Titillium+Web:ital,wght@1,600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6df8555a49.js" crossorigin="anonymous"></script>
    <title>RSAZXKI || MODIFIER ARTICLE</title>
</head>
<body>
<?php
if (isset($_SESSION['authenticated']) && $user->getIsAdmin()) {?>
    <div class="main">
        <div class="login">
            <form action="/checkEditArticle/<?= $params['articles']->getId() ?>" method="post">
                <label for="chk" aria-hidden="true">Modifier</label>
                <input type="text" name="title" placeholder="Titre" required>
                <input type="text" name="img" placeholder="Image" required>
                <input type="text" name="price" placeholder="Prix" required>
                <input id="submit" type="submit" value="Modifier" name="submit">
            </form>
        </div>
    </div>
    </body>
<?php }
else {
    header('Location: /home');
}?>