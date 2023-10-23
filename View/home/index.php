<?php
/**
 * Home page.
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
    if (!isset($_SESSION["authenticated"])) {
        $this->display('login/login');
    }
    else{
        header('Location: /topsel');
    }
?>
</body>