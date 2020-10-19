<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AvisVoyage
 *
 * @ORM\Table(name="avis_voyage", indexes={@ORM\Index(name="IDX_88571DEF68C9E5AF", columns={"voyage_id"}), @ORM\Index(name="IDX_88571DEF71A51189", columns={"passager_id"})})
 * @ORM\Entity
 */
class AvisVoyage
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
     * @ORM\Column(name="note", type="integer", nullable=false)
     */
    private $note;

    /**
     * @var string|null
     *
     * @ORM\Column(name="detail", type="text", length=0, nullable=true)
     */
    private $detail;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Voyage", inversedBy="avisVoyages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $voyage;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Utilisateur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $passager;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getDetail(): ?string
    {
        return $this->detail;
    }

    public function setDetail(?string $detail): self
    {
        $this->detail = $detail;

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

    public function getPassager(): ?utilisateur
    {
        return $this->passager;
    }

    public function setPassager(?utilisateur $passager): self
    {
        $this->passager = $passager;

        return $this;
    }

    


}
