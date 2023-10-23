<?php

namespace App\Model\Entity;

class Article
{
    private int $id;
    private string $title;
    private User $author;
    private string $img;
    private string $prix;
    private int $id_plateforme;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return User
     */
    public function getAuthor(): User
    {
        return $this->author;
    }

    /**
     * @param User $author
     */
    public function setAuthor(User $author): self
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return string
     */
    public function getImg(): string
    {
        return $this->img;
    }

    /**
     * @param string $img
     */
    public function setImg(string $img): self
    {
        $this->img = $img;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrix(): string
    {
        return $this->prix;
    }

    /**
     * @param string $prix
     */
    public function setPrix(string $prix): self
    {
        $this->prix = $prix;
        return $this;
    }

    /**
     * @return int
     */
    public function getPlateforme(): int
    {
        return $this->id_plateforme;
    }

    /**
     * @param int $id_plateforme
     */
    public function setPlateforme(int $id_plateforme): self
    {
        $this->id_plateforme = $id_plateforme;
        return $this;
    }
}
