<?php
/**
 * Profile page.
 */
?>

<head>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,200&family=Titillium+Web:ital,wght@1,600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6df8555a49.js" crossorigin="anonymous"></script>
    <title></title>
</head>
<body>
<?php
if (isset($_GET['success']) && intval($_GET['success']) === 1){
    echo "<h6>Vos données ont bien été modifiées, merci !</h6>";
}

if (isset($_GET['error']) && intval($_GET['error']) === 1){
    echo "<h5>Une erreur est survenue !<br>Contactez le support</h5>";
}
?>
<h1 style="font-size: 160%">Mon profil</h1>
<div class="main">
    <div class="login" style="margin-top: 2%">
        <form action="/checkEditProfile/<?= $params['user']->getId() ?>" method="post">
            <label for="chk" aria-hidden="true">Username</label>
            <input type="text" name="username" id="username" placeholder="<?= $params['user']->getPseudo() ?>">
            <input id="submit" type="submit" value="Modifier" name="submit">
        </form>
    </div>


    <div class="login" style="margin-top: 2%">
        <form action="/checkEditProfile/<?= $params['user']->getId() ?>" method="post">
            <label for="chk" aria-hidden="true">Email</label>
            <br>
            <input type="text" name="email" id="email" placeholder="<?= $params['user']->getEmail() ?>">
            <input id="submit" type="submit" value="Modifier" name="submit">
        </form>
    </div>

    <div class="login" style="margin-top: 2%">
        <form action="/checkEditProfile/<?= $params['user']->getId() ?>" method="post">
            <label for="chk" aria-hidden="true">Mot de passe</label>
            <br>
            <input type="text" name="password" id="password" placeholder="***************">
            <input id="submit" type="submit" value="Modifier" name="submit">
        </form>
    </div>

    <div class="login" style="margin-top: 2%">
        <a href="/verification"><span>Vérifier son adresse mail</span></a>
    </div>

    <div class="delete_user">
        <form action="/checkDeleteProfile/<?= $params['user']->getId() ?>" method="post">
            <input id="submit" type="submit" value="Supprimer le compte définitivement" name="submit">
        </form>
    </div>
</div>
</body>