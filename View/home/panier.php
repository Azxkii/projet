<?php use App\Model\DB;

if (isset($_GET['error']) && intval($_GET['error']) === 1){
    echo "<h5>Vous devez être connecté pour avoir un panier !</h5>";
}

if (isset($_SESSION['id'])){
    $db = DB::getInstance();

// Retrieve cart items for current user
    $user_id = $_SESSION['id'];
    $stmt = $db->prepare("SELECT * FROM panier WHERE id_user = :id_user");
    $stmt->execute(array(':id_user' => $user_id));
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
    <head>
        <title>BLOG | LOGIN</title>
        <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,200&family=Titillium+Web:ital,wght@1,600&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/6df8555a49.js" crossorigin="anonymous"></script>
    </head>
    <body>
<?php
    if (isset($_SESSION['authenticated'])) {
        $total = 0;
// Afficher les articles du panier
        foreach ($articles as $article) {
            ?>
            <div class="panier">
                <?php
                echo "Article : " . $article['title'] . "<br>";
                echo "Prix : " . $article['prix'] . "€<br>";
                echo "Quantité : " . $article['quantite'] . "<br><br>";
                $total += $article['prix'];
                ?>
                <form action="/deletePanier/<?= $article['id_article']?>" method="post">
                    <input type="submit" name="submit" value="Supprimer">
                </form>
            </div>
            <?php
        }
        ?>
        <div class="total_panier">
            <h1>TOTAL : <?php echo $total . "€"; ?></h1>
        </div>
        <form action="/paiement" method="post" id="panier">
            <input type="submit" value="Paiement">
        </form>
<?php }
    else {
        Header("Location: /panier?error=1");
    }
?>
</body>