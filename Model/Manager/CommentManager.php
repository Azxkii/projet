<?php

namespace App\Model\Manager;

use App\Model\DB;
use App\Model\Entity\Article;
use App\Model\Entity\Comment;
use App\Model\Entity\User;

class CommentManager
{
    /**
     * Function that includes all comments by id and sets setters
     */
    public function getCommentById(int $id): array
    {
        $sql = "SELECT * FROM commentaire WHERE article_id = :id";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $comments = [];
        if ($stmt->execute()) {
            $data = $stmt->fetchAll();
            foreach ($data as $commentData) {
                $author = (new UserManager())->getUserById($commentData['id']);
                $articles = (new ArticleManager())->getArticleById($commentData['article_id']);
                $comment = (new Comment())
                    ->setId($commentData['id'])
                    ->setContent($commentData['content'])
                    ->setAuthor($author)
                    ->setArticle($articles);
                $comments[] = $comment;
            }
        }
        return $comments;
    }

}
