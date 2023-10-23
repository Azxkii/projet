<?php
/**
 * Login page.
 */

use App\Model\Manager\UserManager;

if (isset($_GET['code']) && intval($_GET['code']) === 0) {
    echo "<h5>Code incorrect !</h5>";
}
?>

<head>
    <title>BLOG | LOGIN</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,200&family=Titillium+Web:ital,wght@1,600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6df8555a49.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="login">
    <form action="/checkVerify" method="post">
        <label for="chk" aria-hidden="true">Entrer votre email et le code reçu dans votre boîte mail</label>
        <input type="email" name="email" placeholder="Email" required="" style="text-align: center">
        <input type="text" name="code" placeholder="Code" required="" style="text-align: center">
        <input id="submit" type="submit" value="Envoyer" name="submit">
    </form>
</div>
</body>