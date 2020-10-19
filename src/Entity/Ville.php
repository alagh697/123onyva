<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ville
 *
 * @ORM\Table(name="ville", indexes={@ORM\Index(name="ville_nom", columns={"ville_nom"}), @ORM\Index(name="ville_departement", columns={"ville_departement"}), @ORM\Index(name="ville_nom_reel", columns={"ville_nom_reel"})})
 * @ORM\Entity
 */
class Ville
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ville_departement", type="string", length=3, nullable=true)
     */
    private $villeDepartement;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ville_nom", type="string", length=45, nullable=true)
     */
    private $villeNom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ville_nom_reel", type="string", length=45, nullable=true)
     */
    private $villeNomReel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVilleDepartement(): ?string
    {
        return $this->villeDepartement;
    }

    public function setVilleDepartement(?string $villeDepartement): self
    {
        $this->villeDepartement = $villeDepartement;

        return $this;
    }

    public function getVilleNom(): ?string
    {
        return $this->villeNom;
    }

    public function setVilleNom(?string $villeNom): self
    {
        $this->villeNom = $villeNom;

        return $this;
    }

    public function getVilleNomReel(): ?string
    {
        return $this->villeNomReel;
    }

    public function setVilleNomReel(?string $villeNomReel): self
    {
        $this->villeNomReel = $villeNomReel;

        return $this;
    }

     /**
     * @param string $villeNomReel
     *
     * @return array
     */
    public function findLike($villeNomReel)
    {
        return $this
            ->createQueryBuilder('v')
            ->where('v.villeNomReel LIKE :villeNomReel')
            ->setParameter( 'villeNomReel', "%$villeNomReel%")
            ->orderBy('v.villeNomReel')
            ->setMaxResults(5)
            ->getQuery()
            ->execute()
            ;
    }


}
