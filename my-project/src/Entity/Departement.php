<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DepartementRepository")
 */
class Departement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $emailResponsable1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $emailResponsable2;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getEmailResponsable1(): ?string
    {
        return $this->emailResponsable1;
    }

    public function setEmailResponsable1(string $emailResponsable1): self
    {
        $this->emailResponsable1 = $emailResponsable1;

        return $this;
    }

    public function getEmailResponsable2(): ?string
    {
        return $this->emailResponsable2;
    }

    public function setEmailResponsable2(string $emailResponsable2): self
    {
        $this->emailResponsable2 = $emailResponsable2;

        return $this;
    }
}
