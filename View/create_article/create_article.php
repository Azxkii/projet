<?php
use App\Model\Manager\UserManager;


$user = new \App\Model\Entity\User();
$userManager = new UserManager();
$userIsAdmin = $userManager->isAdmin($user);

/**
 * Listing of articles.
 */
?>
<head>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,200&family=Titillium+Web:ital,wght@1,600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6df8555a49.js" crossorigin="anonymous"></script>
    <title>RSAZXKI || CREER UN ARTICLE</title>
</head>
<?php
if (isset($_SESSION['authenticated']) && $user->getIsAdmin()) {?>
<body>
<div class="main">
    <div class="login">
        <form action="/createArticle" method="post">
            <label for="chk" aria-hidden="true">Créer un article</label>
            <input type="text" name="title" placeholder="Titre" required="">
            <input type="text" name="img" placeholder="Image" required="">
            <input type="text" name="price" placeholder="Prix" required="">
            <br>
            <label for="type-select">Choisir une catégorie :</label>

            <select name="type-plateforme">
                <option value="XBOX">XBOX</option>
                <option value="PSN">PSN</option>
                <option value="STEAM">STEAM</option>
                <option value="EPIC">EPIC</option>
                <option value="ORIGIN">ORIGIN</option>
                <option value="ROCKSTAR">ROCKSTAR</option>
            </select>
            
            <input id="submit" type="submit" value="Créer" name="submit">
        </form>
    </div>
</div>
</body>
<?php }
else {
    header('Location: /home');
}?>