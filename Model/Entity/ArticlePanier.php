<?php

namespace App\Model\Entity;

class ArticlePanier
{
    private int $id;
    private string $id_user;
    private string $id_article;

    /**
     * @return string
     */
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Article
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */

    public function getId_Article(): int
    {
        return $this->id_article;
    }

    /**
     * @param int $id
     * @return Article
     */
    public function setId_Article(int $id): self
    {
        $this->id_article = $id;
        return $this;
    }

    /**
     * @return string
     */

    public function getId_User(): int
    {
        return $this->id_user;
    }

    /**
     * @param int $id
     * @return Article
     */
    public function setId_User(int $id): self
    {
        $this->id_user = $id;
        return $this;
    }

    /**
     * @return string
     */
}
