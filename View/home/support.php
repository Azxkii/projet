<?php
/**
 * Article creation page.
 */
?>
<head>
    <title>SUPPORT</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,200&family=Titillium+Web:ital,wght@1,600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6df8555a49.js" crossorigin="anonymous"></script>
</head>
<body>
<?php
if (isset($_GET['success']) && intval($_GET['success']) === 1){
    echo "<h6>Vos données ont bien été envoyées, merci !</h6>";
}

if (isset($_GET['error']) && intval($_GET['error']) === 1){
    echo "<h5>Une erreur est survenue !<br>Contactez le support</h5>";
}
?>
<?php
if (isset($_SESSION['authenticated'])) {?>
    <div class="main">
        <div class="login">
            <form action="/checkSupport" method="post">
                <label for="chk" aria-hidden="true">Contacter le support</label>
                <input type="email" name="email" placeholder="Adresse mail" required="">
                <input type="text" name="object" placeholder="Objet" required="">
                <textarea name="content" id="content" cols="30" rows="10" placeholder="Description..."></textarea>
                <input id="submit" type="submit" value="Envoyer" name="submit">
            </form>
        </div>
    </div>
    </body>
<?php }
else {
    echo "<h1>Vous devez être connecté pour contacter le support.</h1><?php";
}?>