<?php
/**
 * Register page.
 */
?>
<html lang="fr">
<head>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,200&family=Titillium+Web:ital,wght@1,600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6df8555a49.js" crossorigin="anonymous"></script>
    <title></title>
</head>
<body>
<div class="login">
    <form action="checkRegister" method="post">
        <label for="chk" aria-hidden="true">Inscription</label>
        <input type="text" name="username" placeholder="Pseudo" pattern="[a-zA-Z]+" required="">
        <input type="email" name="email" placeholder="Email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required="">
        <input type="password" name="password" placeholder="Mot de passe" required="">
        <input type="password" name="password-repeat" placeholder="Confirmer le mot de passe" required="">
        <input type="checkbox" style="width: 20%; margin-left: -3%" required><span style="font-size: 70%; margin-left: -8%;">J'accepte les <a
                    href="/conditions">conditions générales d'utilisations</a> du site.</span>
        <br>
        <h1 class="conditions-form">Le nom d'utilisateur ne doit contenir que des caractères alphabétiques non accentués.</h1>
        <input id="submit" type="submit" value="Valider" name="register">
    </form>
    <a href="login" class="href">Connexion</a>
</div>
</body>
</html>
