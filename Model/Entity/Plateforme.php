<?php

namespace App\Model\Entity;

class Plateforme
{
    private int $id;
    private string $nom;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return User
     */
    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

}
