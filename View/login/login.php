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
<body>
<?php
if (isset($_GET['error']) && intval($_GET['error']) === 1){
    echo "<h5>Aucun champ trouvé !</h5>";
}
if (isset($_GET['error_user']) && intval($_GET['error_user']) === 1){
    echo "<h5>Email ou mot de passe incorrect !</h5>";
}
if (isset($_GET['error_pass']) && intval($_GET['error_pass']) === 1){
    echo "<h5>Mot de passe incorrect !</h5>";
}
if (isset($_GET['error_email']) && intval($_GET['error_email']) === 1){
    echo "<h5>Email ou mot de passe incorrect !</h5>";
}
if (isset($_GET['success-password']) && intval($_GET['success-password']) === 1){
    echo "<h6>Mot de passe changé !</h6>";
}

if (isset($_GET['code']) && intval($_GET['code']) === 1) {
    echo "<h6>Code Correct !</h6>";
}

if (isset($_SESSION['login_attempts']) && $_SESSION['login_attempts'] > 4){
    sleep(10);
}
else {
    sleep(0);
}

if (isset($_SESSION['login_attempts'])){
    echo "<div style='margin-left: 3%; margin-top: 3%;'>Vous avez fait : " . $_SESSION['login_attempts'] . " tentatives de connexion.</div>";
}
?>
<div class="main">
    <div class="login">
        <form action="checkLogin" method="post">
            <label for="chk" aria-hidden="true">Connexion</label>
            <input type="text" name="pseudo" placeholder="Pseudo" pattern='[a-zA-Z]+' required="">
            <input type="email" name="email" placeholder="Email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required="">
            <input type="password" name="password-connect" id="password-connect" placeholder="Mot de passe" required="">
            <input id="submit" type="submit" value="Connexion" name="connect">
        </form>
        <a href="register" class="href">Inscription</a>
        <br>
        <br>
        <a href="forgot-password" class="href">Mot de passe oublié</a>
    </div>
</div>
</body>