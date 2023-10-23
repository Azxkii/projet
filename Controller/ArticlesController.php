<?php

namespace App\Controller;

use App\Model\Manager\ArticleManager;
use App\Model\Manager\CommentManager;
use App\Model\Manager\UserManager;

class ArticlesController extends AbstractController
{
    public function indexPlaystation($id)
    {
        $manager = new ArticleManager();
        $manager2 = new UserManager();
        $this->display('articles/playstation', [
            'articlesPSN' => $manager->getAll($id),
            'User' => $manager2->getAll(),
        ]);
    }

    public function indexXBOX($id)
    {
        $manager = new ArticleManager();
        $manager2 = new UserManager();
        $this->display('articles/xbox', [
            'articlesXBOX' => $manager->getAll($id),
            'User' => $manager2->getAll(),
        ]);
    }


    public function indexSteam($id)
    {
        $manager = new ArticleManager();
        $manager2 = new UserManager();
        $this->display('articles/steam', [
            'articlesSteam' => $manager->getAll($id),
            'User' => $manager2->getAll(),
        ]);
    }

    public function indexRockstar($id)
    {
        $manager = new ArticleManager();
        $manager2 = new UserManager();
        $this->display('articles/rockstar', [
            'articlesRockstar' => $manager->getAll($id),
            'User' => $manager2->getAll(),
        ]);
    }

    public function indexEpic($id)
    {
        $manager = new ArticleManager();
        $manager2 = new UserManager();
        $this->display('articles/epic', [
            'articlesEpic' => $manager->getAll($id),
            'User' => $manager2->getAll(),
        ]);
    }

    public function indexOrigin($id)
    {
        $manager = new ArticleManager();
        $manager2 = new UserManager();
        $this->display('articles/origin', [
            'articlesOrigin' => $manager->getAll($id),
            'User' => $manager2->getAll(),
        ]);
    }

    public function indexComment($id)
    {
        $manager = new ArticleManager();
        $comments = new CommentManager();
        $this->display('comment/comment', [
            'articles' => $manager->getArticleById($id),
            'comment' => $comments->getCommentById($id),
        ]);
    }

    public function indexArticleId($id)
    {
        $manager = new ArticleManager();
        $this->display('articles_id/article_id', [
            'articles' => $manager->getArticleById($id),
        ]);
    }
}