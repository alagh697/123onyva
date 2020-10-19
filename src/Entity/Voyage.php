<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OrderBy;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Voyage
 *
 * @ORM\Table(name="voyage", indexes={@ORM\Index(name="IDX_3F9D8955497832A6", columns={"ville_depart_id"}), @ORM\Index(name="IDX_3F9D895534AC9A4B", columns={"ville_arrivee_id"}), @ORM\Index(name="IDX_3F9D8955F16F4AC6", columns={"conducteur_id"})})
 * @ORM\Entity
 */
class Voyage
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Utilisateur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $conducteur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ville")
     * @ORM\JoinColumn(nullable=false)
     * @OrderBy({"villeNom" = "ASC"})
     */
    private $ville_depart;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ville")
     * @ORM\JoinColumn(nullable=false)
     * @OrderBy({"villeNom" = "ASC"})
     */
    private $ville_arrivee;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_depart", type="datetime", nullable=false)
     */
    private $dateDepart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout", type="datetime", nullable=false)
     */
    private $dateAjout;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_arrivee", type="datetime", nullable=false)
     */
    private $dateArrivee;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_passager", type="integer", nullable=false)
     */
    private $nbPassager;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="vehicule_description", type="text", length=0, nullable=false)
     */
    private $vehiculeDescription;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EtapeVoyage", mappedBy="voyage", orphanRemoval=true)
     */
    private $etapeVoyages;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reservation", mappedBy="voyage", orphanRemoval=true)
     */
    private $reservations;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AvisPassager", mappedBy="voyage", orphanRemoval=true)
     */
    private $avisPassagers;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AvisVoyage", mappedBy="voyage", orphanRemoval=true)
     */
    private $avisVoyages;

    public function __construct()
    {
        $this->etapeVoyages = new ArrayCollection();
        $this->reservations = new ArrayCollection();
        $this->avisPassagers = new ArrayCollection();
        $this->avisVoyages = new ArrayCollection();
    }

    

    public function getId(): ?int
    {
        return $this->id;
    }

    

    public function getDateDepart(): ?\DateTimeInterface
    {
        return $this->dateDepart;
    }

    public function setDateDepart(\DateTimeInterface $dateDepart): self
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }

    public function getDateAjout(): ?\DateTimeInterface
    {
        return $this->dateAjout;
    }

    public function setDateAjout(\DateTimeInterface $dateAjout): self
    {
        $this->dateAjout = $dateAjout;

        return $this;
    }

    public function getDateArrivee(): ?\DateTimeInterface
    {
        return $this->dateArrivee;
    }

    public function setDateArrivee(\DateTimeInterface $dateArrivee): self
    {
        $this->dateArrivee = $dateArrivee;

        return $this;
    }

    public function getNbPassager(): ?int
    {
        return $this->nbPassager;
    }

    public function setNbPassager(int $nbPassager): self
    {
        $this->nbPassager = $nbPassager;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getVehiculeDescription(): ?string
    {
        return $this->vehiculeDescription;
    }

    public function setVehiculeDescription(string $vehiculeDescription): self
    {
        $this->vehiculeDescription = $vehiculeDescription;

        return $this;
    }

    public function getConducteur(): ?utilisateur
    {
        return $this->conducteur;
    }

    public function setConducteur(?utilisateur $conducteur): self
    {
        $this->conducteur = $conducteur;

        return $this;
    }

    public function getVilleDepart(): ?ville
    {
        return $this->ville_depart;
    }

    public function setVilleDepart(?ville $ville_depart): self
    {
        $this->ville_depart = $ville_depart;

        return $this;
    }

    public function getVilleArrivee(): ?ville
    {
        return $this->ville_arrivee;
    }

    public function setVilleArrivee(?ville $ville_arrivee): self
    {
        $this->ville_arrivee = $ville_arrivee;

        return $this;
    }

    /**
     * @return Collection|EtapeVoyage[]
     */
    public function getEtapeVoyages(): Collection
    {
        return $this->etapeVoyages;
    }

    public function addEtapeVoyage(EtapeVoyage $etapeVoyage): self
    {
        if (!$this->etapeVoyages->contains($etapeVoyage)) {
            $this->etapeVoyages[] = $etapeVoyage;
            $etapeVoyage->setVoyage($this);
        }

        return $this;
    }

    public function removeEtapeVoyage(EtapeVoyage $etapeVoyage): self
    {
        if ($this->etapeVoyages->contains($etapeVoyage)) {
            $this->etapeVoyages->removeElement($etapeVoyage);
            // set the owning side to null (unless already changed)
            if ($etapeVoyage->getVoyage() === $this) {
                $etapeVoyage->setVoyage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setVoyage($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->contains($reservation)) {
            $this->reservations->removeElement($reservation);
            // set the owning side to null (unless already changed)
            if ($reservation->getVoyage() === $this) {
                $reservation->setVoyage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|AvisPassager[]
     */
    public function getAvisPassagers(): Collection
    {
        return $this->avisPassagers;
    }

    public function addAvisPassager(AvisPassager $avisPassager): self
    {
        if (!$this->avisPassagers->contains($avisPassager)) {
            $this->avisPassagers[] = $avisPassager;
            $avisPassager->setVoyage($this);
        }

        return $this;
    }

    public function removeAvisPassager(AvisPassager $avisPassager): self
    {
        if ($this->avisPassagers->contains($avisPassager)) {
            $this->avisPassagers->removeElement($avisPassager);
            // set the owning side to null (unless already changed)
            if ($avisPassager->getVoyage() === $this) {
                $avisPassager->setVoyage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|AvisVoyage[]
     */
    public function getAvisVoyages(): Collection
    {
        return $this->avisVoyages;
    }

    public function addAvisVoyage(AvisVoyage $avisVoyage): self
    {
        if (!$this->avisVoyages->contains($avisVoyage)) {
            $this->avisVoyages[] = $avisVoyage;
            $avisVoyage->setVoyage($this);
        }

        return $this;
    }

    public function removeAvisVoyage(AvisVoyage $avisVoyage): self
    {
        if ($this->avisVoyages->contains($avisVoyage)) {
            $this->avisVoyages->removeElement($avisVoyage);
            // set the owning side to null (unless already changed)
            if ($avisVoyage->getVoyage() === $this) {
                $avisVoyage->setVoyage(null);
            }
        }

        return $this;
    }


}
