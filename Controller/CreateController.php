<?php

namespace App\Controller;

use App\Model\DB;
use App\Model\Manager\ArticleManager;
use App\Model\Manager\CommentManager;

class CreateController extends AbstractController
{
    public function checkSupport()
    {
        $email = strip_tags($_POST['email'] ?? ''); // Removes all potentially dangerous HTML tags

        if ($email && isset($_POST['submit'])) { // Check if the fields were found
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $object = $_POST['object'];
                $object = htmlspecialchars($object);

                $content = $_POST['content'];
                $content = htmlspecialchars($content);


                $to = 'azxki@azxki.fr';
                $subject = $object;
                $message = $content;
                $message = wordwrap($message, 70, "\r\n");
                $headers = array(
                    'From' => $email,
                    'Reply-To' => $email,
                    'X-Mailer' => 'PHP/' . phpversion()
                );

                mail($to, $subject, $message, $headers, "-f $email");

                Header("Location: /support?success=1");

            } else {
                echo "<div class='warning'> Adresse mail incorrect </div>";
                echo "<script>setTimeout(function(){ document.querySelector('.warning').style.display = 'none'; }, 2000);</script>";
                echo "<script>setTimeout(function(){ window.location.href='/support?error=1' }, 3000);</script>";
            }
        } else {
            echo "<div class='warning'> Aucun champ trouvé..  </div>";
            echo "<script>setTimeout(function(){ document.querySelector('.warning').style.display = 'none'; }, 2000);</script>";
            echo "<script>setTimeout(function(){ window.location.href='/support?error=1' }, 3000);</script>";
        }
    }

    public function CreateComment($id)
    {
        $manager = new ArticleManager();
        $comments = new CommentManager();

        $this->display('create_comment/create_comment', [
            'articles' => $manager->getArticleById($id),
            'comment' => $comments->getCommentById($id),
        ]);
    }

    public function checkComment($id)
    {

        if ($_POST['submit'] && isset($_POST['content'])){

            $content = $_POST['content'];
            $author = $_SESSION["id"];

            $sql = "INSERT INTO comment (content, author, article_id) VALUES (:content, :author, :article_id)";
            $req = DB::getInstance()->prepare($sql);
            $req->bindParam(':content', $content);
            $req->bindParam(':author', $author);
            $req->bindParam(':article_id', $id);

            $req->execute();

            header("Location: /comment/$id");
        }
        else{
            echo "<div class='warning'> Le commentaire ne peut pas être posté. </div>";
            echo "<script>setTimeout(function(){ document.querySelector('.warning').style.display = 'none'; }, 8000);</script>";
            $this->display('create_comment/create_commentPSN');
        }
    }
    public function checkAddShop($id_article, $quantite)
    {
        $db = DB::getInstance();

        // check if the item already exists in the cart for the current user
        $user_id = $_SESSION['id'];
        $stmt = $db->prepare("SELECT * FROM panier WHERE id_article = :id_article AND id_user = :id_user");
        $stmt->execute(array(':id_article' => $id_article, ':id_user' => $_SESSION['id']));
        $row = $stmt->fetch($db::FETCH_ASSOC);

        if ($row) {
            // Update the quantity of the item in the cart
            $new_quantity = $row['quantite'] + $quantite;
            $stmt = $db->prepare("UPDATE panier SET quantite = :quantite WHERE id = :id");

            $stmt->bindParam(':id', $row['id']);
            $stmt->bindParam(':quantite', $new_quantity);

            $stmt->execute();
        } else {
            $post_title = $_POST['title'];
            $post_prix = $_POST['prix'];

            $title = strip_tags($post_title);
            $prix = strip_tags($post_prix);

            // Insert a new line in the shopping cart
            $stmt = $db->prepare("INSERT INTO panier (title, prix, id_article, quantite, id_user) VALUES (:title, :prix, :id_article, :quantite, :id_user)");
            $stmt->bindParam(':id_article', $id_article);
            $stmt->bindParam(':quantite', $quantite);
            $stmt->bindParam(':id_user', $user_id);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':prix', $prix);

            $stmt->execute();
        }
        Header('Location: /panier');
    }

    public function createArticle()
    {
        if (isset($_POST['submit'])) {
            $img = $_POST['img'];
            $img = strip_tags($img ?? '');
            $title = $_POST['title'];
            $title = strip_tags($title ?? '');
            $price = $_POST['price'];
            $price = strip_tags($price ?? '');

            $typeSupport = $_POST['type-plateforme'];

            // Correspondence between the selected options and the values in the "type" table
            $type = match ($typeSupport) {
                "STEAM" => 5,
                "ORIGIN" => 6,
                "ROCKSTAR" => 3,
                "EPIC" => 4,
                "XBOX" => 2,
                "PSN" => 1,
                default => 0,
            };

            if ($img && $title && $price) {
                $stm = DB::getInstance()->prepare("
                INSERT INTO article (title, img, prix, id_user, id_plateforme) VALUES (:title, :img, :prix, :author_id, :id_plateforme)");
                $stm->bindParam(':title', $title);
                $stm->bindParam(':img', $img);
                $stm->bindParam(':prix', $price);
                $stm->bindParam(':author_id', $_SESSION['id']);
                $stm->bindParam(':id_plateforme', $type);
                $stm->execute();

                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        } else {
            echo "<div class='warning'> L'article ne peut pas être posté. </div>";
            echo "<script>setTimeout(function(){ document.querySelector('.warning').style.display = 'none'; }, 8000);</script>";
            $this->display('create_article/create_article');
        }
    }
}
