<?php

namespace App\Model\Manager;

use App\Model\DB;
use App\Model\Entity\Article;
use App\Model\Entity\User;


class ArticleManager
{

    /**
     * Function that takes all articles and sets the setters
     */

    public function getAll(int $id): array
    {
        $articles = [];
        $sql = "SELECT * FROM article WHERE id_plateforme = :id_plateforme"; // Remove the quotes around ':id_platform'
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->bindParam(':id_plateforme', $id);
        $stmt->execute(); // Execute the prepared statement with execute() instead of query()

        $data = $stmt->fetchAll(); // Use $stmt to retrieve request data

        foreach ($data as $articleData) {
            $articles[] = (new Article())
                ->setId($articleData['id'])
                ->setTitle($articleData['title']) 
                ->setImg($articleData['img'])
                ->setPrix($articleData['prix'])
                ->setPlateforme($articleData['id_plateforme']);
        }

        return $articles;
    }

    /**
     * Function that includes all the articles by id and that fixes the setters
     */

    public function getArticleById(int $id): ?Article
    {
        $sql = "SELECT * FROM article WHERE id = :id";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->bindParam(':id', $id);
        if($stmt->execute()) {
            $articleData = $stmt->fetch();
            if ($articleData) {
                return (new Article())
                    ->setId($articleData['id'])
                    ->setTitle($articleData['title'])
                    ->setImg($articleData['img'])
                    ->setPrix($articleData['prix'])
                    ->setPlateforme($articleData['id_plateforme'])
                    ;
            }
        }
        return null;
    }
}
