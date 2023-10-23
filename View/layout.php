<?php

use App\Model\Manager\UserManager;

$user = new \App\Model\Entity\User();
$userManager = new UserManager();
$userIsAdmin = $userManager->isAdmin($user);

/**
 * Layout page.
 */
?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>RSAzxki</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
          integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body>
<div class="navbar">
    <span><a href="/playstation/1" id="articles" title="playstation">Playstation <i
                    class="fa-brands fa-playstation"></i></a></span>
    <span><a href="/xbox/2" id="articles" title="xbox">Xbox <i class="fa-brands fa-xbox"></i></a></span>
    <span><a href="/pc" id="articles" title="pc">PC <i class="fa-solid fa-computer"></i></a></span>
    <span><a href="/support" id="articles" title="support">Support <i class="fa-solid fa-headset"></i></a></span>
    <?php
    // If the user is logged in, they see the Logout and Profile buttons, otherwise they see the Sign Up and Sign In buttons
    if (isset($_SESSION["authenticated"])) { ?>
        <span><a href="/logout" id="articles" title="deconnexion">Déconnexion <i
                        class="fa-solid fa-person-walking-arrow-right"></i></a></span>
        <span><a href="/myprofile/<?php echo $_SESSION['id']; ?>" id="articles" title="playstation">Profil <i
                        class="fa-solid fa-user"></i></a></span>
    <?php } else { ?>
        <span><a href="/login" id="articles" title="connexion">Connexion <i
                        class="fa-solid fa-right-to-bracket"></i></a></span>
        <span><a href="/register" id="articles" title="inscription">Inscription <i
                        class="fa-solid fa-right-to-bracket"></i></a></span>
    <?php } ?>
    <?php
    // If the user is logged in, they see the Cart button
    if (isset($_SESSION["authenticated"])) { ?>
        <span><a href="/panier" id="articles" title="panier">Panier <i
                        class="fa-solid fa-basket-shopping"></i></a></span>
    <?php } ?>
</div>
<?php if ($user->getIsAdmin()) : ?>
    <li class="li">ADMINISTRATEUR</li>
<?php endif; ?>
<?=
// Displaying my html.
$html
?>

<footer>
    <p>Created by Azxki</p>
    <br>
    <a href="/mentions">Mentions légales.</a>
</footer>

<script src="/assets/js/app.js"></script>
</body>
</html>
