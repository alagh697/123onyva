<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EtapeVoyage
 *
 * @ORM\Table(name="etape_voyage", indexes={@ORM\Index(name="IDX_88904FEAA73F0036", columns={"ville_id"}), @ORM\Index(name="IDX_88904FEA68C9E5AF", columns={"voyage_id"})})
 * @ORM\Entity
 */
class EtapeVoyage
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="ville_id", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $villeId;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ville")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ville;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Voyage", inversedBy="etapeVoyages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $voyage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVilleId(): ?int
    {
        return $this->villeId;
    }

    public function setVilleId(int $villeId): self
    {
        $this->villeId = $villeId;

        return $this;
    }

    

    public function getVille(): ?ville
    {
        return $this->ville;
    }

    public function setVille(?ville $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getVoyage(): ?voyage
    {
        return $this->voyage;
    }

    public function setVoyage(?voyage $voyage): self
    {
        $this->voyage = $voyage;

        return $this;
    }


}
