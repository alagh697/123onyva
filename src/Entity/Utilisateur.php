<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateurRepository")
 * @UniqueEntity(
 * fields={"email"},
 * message= "Adresse email déjà utilisé !"
 * )
 */
class Utilisateur implements UserInterface
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     */
    private $motdepasse;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_naissance;

    /**
     * @ORM\Column(type="string", length=10)
     * @Assert\Regex(
    *  pattern="/^0[1-9]([-. ]?[0-9]{2}){4}$/",
    *  message="Numéro de téléphone invalide"
     * )
     */
    private $telephone;

    /**
     * @ORM\Column(type="text", nullable=true)

     */
    private $bio;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url_photo;

    /**
     * @ORM\Column(type="boolean")
     */
    private $email_verif;

    /**
     * @ORM\Column(type="boolean")
     */
    private $fumeur;

    /**
     * @ORM\Column(type="boolean")
     */
    private $musique;

    /**
     * @ORM\Column(type="boolean")
     */
    private $discussion;

    /**
     * @ORM\Column(type="boolean")
     */
    private $passager_fumeur;

    /**
     * @ORM\Column(type="boolean")
     */
    private $passager_animal;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_inscription;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Voyage", mappedBy="conducteur", orphanRemoval=true)
     */
    private $voyages;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reservation", mappedBy="passager", orphanRemoval=true)
     */
    private $reservations;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AvisPassager", mappedBy="passager", orphanRemoval=true)
     */
    private $avisPassagers;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AvisVoyage", mappedBy="Passager", orphanRemoval=true)
     */
    private $avisVoyages;

    

    public function __construct()
    {
        $this->voyages = new ArrayCollection();
        $this->reservations = new ArrayCollection();
        $this->avisPassagers = new ArrayCollection();
        $this->avisVoyages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMotdepasse(): ?string
    {
        return $this->motdepasse;
    }

    public function setMotdepasse(string $motdepasse): self
    {
        $this->motdepasse = $motdepasse;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): self
    {
        $this->bio = $bio;

        return $this;
    }

    public function getUrlPhoto(): ?string
    {
        return $this->url_photo;
    }

    public function setUrlPhoto(?string $url_photo): self
    {
        $this->url_photo = $url_photo;

        return $this;
    }

    public function getEmailVerif(): ?bool
    {
        return $this->email_verif;
    }

    public function setEmailVerif(bool $email_verif): self
    {
        $this->email_verif = $email_verif;

        return $this;
    }

    public function getFumeur(): ?bool
    {
        return $this->fumeur;
    }

    public function setFumeur(bool $fumeur): self
    {
        $this->fumeur = $fumeur;

        return $this;
    }

    public function getMusique(): ?bool
    {
        return $this->musique;
    }

    public function setMusique(bool $musique): self
    {
        $this->musique = $musique;

        return $this;
    }

    public function getDiscussion(): ?bool
    {
        return $this->discussion;
    }

    public function setDiscussion(bool $discussion): self
    {
        $this->discussion = $discussion;

        return $this;
    }

    public function getPassagerFumeur(): ?bool
    {
        return $this->passager_fumeur;
    }

    public function setPassagerFumeur(bool $passager_fumeur): self
    {
        $this->passager_fumeur = $passager_fumeur;

        return $this;
    }

    public function getPassagerAnimal(): ?bool
    {
        return $this->passager_animal;
    }

    public function setPassagerAnimal(bool $passager_animal): self
    {
        $this->passager_animal = $passager_animal;

        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->date_inscription;
    }

    public function setDateInscription(\DateTimeInterface $date_inscription): self
    {
        $this->date_inscription = $date_inscription;

        return $this;
    }

    /**
     * @return Collection|Voyage[]
     */
    public function getVoyages(): Collection
    {
        return $this->voyages;
    }

    public function addVoyage(Voyage $voyage): self
    {
        if (!$this->voyages->contains($voyage)) {
            $this->voyages[] = $voyage;
            $voyage->setConducteur($this);
        }

        return $this;
    }

    public function removeVoyage(Voyage $voyage): self
    {
        if ($this->voyages->contains($voyage)) {
            $this->voyages->removeElement($voyage);
            // set the owning side to null (unless already changed)
            if ($voyage->getConducteur() === $this) {
                $voyage->setConducteur(null);
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
            $reservation->setPassager($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->contains($reservation)) {
            $this->reservations->removeElement($reservation);
            // set the owning side to null (unless already changed)
            if ($reservation->getPassager() === $this) {
                $reservation->setPassager(null);
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
            $avisPassager->setPassager($this);
        }

        return $this;
    }

    public function removeAvisPassager(AvisPassager $avisPassager): self
    {
        if ($this->avisPassagers->contains($avisPassager)) {
            $this->avisPassagers->removeElement($avisPassager);
            // set the owning side to null (unless already changed)
            if ($avisPassager->getPassager() === $this) {
                $avisPassager->setPassager(null);
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
            $avisVoyage->setPassager($this);
        }

        return $this;
    }

    public function removeAvisVoyage(AvisVoyage $avisVoyage): self
    {
        if ($this->avisVoyages->contains($avisVoyage)) {
            $this->avisVoyages->removeElement($avisVoyage);
            // set the owning side to null (unless already changed)
            if ($avisVoyage->getPassager() === $this) {
                $avisVoyage->setPassager(null);
            }
        }

        


        return $this;
    }

    /**
     * @Assert\EqualTo(propertyPath="motdepasse", message="La confirmation n'est pas valide")
     */
    public $confirm_motdepasse;

    public function getConfirm_Motdepasse(): ?string
    {
        return $this->confirm_motdepasse;
    }

    public function setConfirm_Motdepasse(string $motdepasse): self
    {
        $this->confirm_motdepasse = $motdepasse;

        return $this;
    }

    public function eraseCredentials()
    {
        
    }

    public function getSalt()
    {
        
    }

    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    public function getUsername(): ?string
    {
        return $this->email;
    }

    public function getPassword(): ?string
    {
        return $this->motdepasse;
    }

     /* $queryBuilder = $manager->createQueryBuilder();
            $queryBuilder->update(Utilisateur::class, 'u')
            ->set('u.nom', '?2')
            ->set('u.prenom', '?3')
            ->set('u.date_naissance', '?4')
            ->set('u.telephone', '?5')
            ->set('u.bio', '?6')
            ->set('u.fumeur', '?7')
            ->set('u.musique', '?8')
            ->set('u.discussion', '?9')
            ->set('u.passager_fumeur', '?10')
            ->set('u.passager_animal', '?11')
            ->where('u.id = ?1')
            ->setParameter(1, $this->getUser()->getId())
            ->setParameter(2, $this->getUser()->getNom())
            ->setParameter(3, $this->getUser()->getPrenom())
            ->setParameter(4, $this->getUser()->getDateNaissance())
            ->setParameter(5, $this->getUser()->getTelephone())
            ->setParameter(6, $this->getUser()->getBio())
            ->setParameter(7, $this->getUser()->getFumeur())
            ->setParameter(8, $this->getUser()->getMusique())
            ->setParameter(9, $this->getUser()->getDiscussion())
            ->setParameter(10, $this->getUser()->getPassagerFumeur())
            ->setParameter(11, $this->getUser()->getPassagerAnimal());

            $query = $queryBuilder->getQuery();
            $p=$query->execute();*/
}
/*@Assert\Regex(
    *  pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/",
    *  message="8 caractère minimum, au moins une lettre majuscule et au moins une lettre minuscule"
     * 
     * )*/
