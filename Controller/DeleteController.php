<?php

namespace App\Controller;
use App\Model\Manager\UserManager;

use App\Model\DB;

class DeleteController extends AbstractController
{
    /**
     * Allows you to delete an article thanks to its id.
     * @return void
     */

    public function deleteArticle($id){

        $user = new \App\Model\Entity\User;
        $userManager = new UserManager();
        $userIsAdmin = $userManager->isAdmin($user);

        if ($id && $user->getIsAdmin()){
            $sql = DB::getInstance()->prepare("DELETE from article where id = :id");
            $sql->bindParam(':id', $id);
            $sql->execute();

            header('Location: ' . $_SERVER['HTTP_REFERER']);;
        }
        else{
            echo "<div class='warning'> L'article ne peut pas être supprimé. </div>";
            echo "<script>setTimeout(function(){ document.querySelector('.warning').style.display = 'none'; }, 8000);</script>";
            $this->display('/topsel');
        }
    }

    public function deleteUser($id)
    {
        if ($id){

            $sql = DB::getInstance()->prepare("DELETE from user where id = :id");
            $sql1 = DB::getInstance()->prepare("DELETE from comment where author = :id");


            $sql->bindParam(':id', $id);
            $sql1->bindParam(':id', $id);


            $sql->execute();
            $sql1->execute();

            session_destroy();

            Header("Location: /login");
        }
        else{
            echo "<div class='warning'> L'utilisateur ne peut pas être supprimé. <br> Veuillez contacter un admin.</div>";
            echo "<script>setTimeout(function(){ document.querySelector('.warning').style.display = 'none'; }, 8000);</script>";
            $this->display('/myprofile/[i:id]');
        }
    }

    function deletePanier($id) {
        $db = DB::getInstance();

        // Remove item from cart for current user
        $user_id = $_SESSION['id'];
        $stmt = $db->prepare("DELETE FROM panier WHERE id_article = :id_article AND id_user = :id_user");
        $stmt->bindParam(':id_article', $id);
        $stmt->bindParam(':id_user', $user_id);

        $stmt->execute();

        $this->display('home/panier');
    }
}
