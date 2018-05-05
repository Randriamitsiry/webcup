<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Leader
 *
 * @ORM\Table(name="leader")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LeaderRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Leader
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Fonction", type="string", length=255)
     */
    private $fonction;

    /**
     * @var string
     *
     * @ORM\Column(name="mots", type="string", length=255)
     */
    private $mots;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255)
     */
    private $photo;

    /**
     * @ORM\OneToOne(targetEntity="Categorie")
     */
    private $categorie;

    /**
     * @return Categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param Categorie $categorie
     * @return Leader
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
        return $this;
    }



    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Leader
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set fonction
     *
     * @param string $fonction
     *
     * @return Leader
     */
    public function setFonction($fonction)
    {
        $this->fonction = $fonction;

        return $this;
    }

    /**
     * Get fonction
     *
     * @return string
     */
    public function getFonction()
    {
        return $this->fonction;
    }

    /**
     * Set mots
     *
     * @param string $mots
     *
     * @return Leader
     */
    public function setMots($mots)
    {
        $this->mots = $mots;

        return $this;
    }

    /**
     * Get mots
     *
     * @return string
     */
    public function getMots()
    {
        return $this->mots;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return Leader
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function uploadPhoto()
    {
        $fileName = md5(uniqid()).'.'.$this->getPhoto()->guessExtension();
        try {
            $this->photo->move("../web/uploads/leader", $fileName);
        } catch (\Exception $exception) {
            throw $exception;
        }
        $this->setPhoto($fileName);
    }
}
