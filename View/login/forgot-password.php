<?php
/**
 * Login page.
 */
?>
<head>
    <title>BLOG | LOGIN</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,200&family=Titillium+Web:ital,wght@1,600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6df8555a49.js" crossorigin="anonymous"></script>
</head>

<?php
if (isset($_GET['error_user']) && intval($_GET['error_user']) === 1){
    echo "<h5>Username incorrect !</h5>";
}
if (isset($_GET['error_pass']) && intval($_GET['error_pass']) === 1){
    echo "<h5>Email ou mot de passe incorrect !</h5>";
}
?>

<body>
<div class="main">
    <div class="login">
        <form action="checkPassword" method="post">
            <label for="chk" aria-hidden="true">Mot de passe oublié</label>
            <input type="text" name="pseudo" placeholder="Pseudo" required="">
            <input type="email" name="email" placeholder="Email" required="">
            <input type="password" name="forgot-password" id="forgot-password" placeholder="New password" required="">
            <input id="submit" type="submit" value="Valider" name="valide">
        </form>
    </div>
</div>
</body>