<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategorieRepository")
 */
class Categorie
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
     * @ORM\Column(name="Designation", type="string", length=100, unique=true)
     */
    private $designation;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255)
     */
    private $description;
    /**
     * @ORM\OneToMany(targetEntity="Zone", mappedBy="categorie")
     */
    private $zones;
    /**
     * @ORM\Column(name="photo", type="string")
     */
    private $photo;

    /**
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param string $photo
     * @return Categorie
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
        return $this;
    }

    /**
     * @var string
     * @ORM\Column(name="propos", type="string", nullable=true)
     */
    private $apropos;
    /**
     * @var string
     * @ORM\Column(name="produitDescription", type="string")
     */
    private $produitDescription;

    /**
     * @return string
     */
    public function getProduitDescription()
    {
        return $this->produitDescription;
    }

    /**
     * @param string $produitDescription
     * @return Categorie
     */
    public function setProduitDescription($produitDescription)
    {
        $this->produitDescription = $produitDescription;
    }

    /**
     * @return string
     */
    public function getApropos()
    {
        return $this->apropos;
    }

    /**
     * @param string $apropos
     * @return Categorie
     */
    public function setApropos($apropos)
    {
        $this->apropos = $apropos;
        return $this;
    }

    /**
     * Categorie constructor.@
     */

    public function __construct()
    {
        $this->zones = new ArrayCollection();
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
     * Set designation
     *
     * @param string $designation
     *
     * @return Categorie
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get designation
     *
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Categorie
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param Collection $zones
     * @return Categorie
     */
    public function setZones(Collection $zones)
    {
        foreach ($zones as $z) {
            $z->setCategorie($this);
        }
        $this->zones = $zones;

        return $this;
    }

    /**
     * Add zone
     *
     * @param \AppBundle\Entity\Zone $zone
     *
     * @return Categorie
     */
    public function addZone(Zone $zone)
    {
        if (!$this->zones->contains($zone)) {
            $this->zones[] = $zone;
            $zone->setCategorie($this);
        }

        return $this;
    }

    /**
     * Remove zone
     *
     * @param \AppBundle\Entity\Zone $zone
     */
    public function removeZone(\AppBundle\Entity\Zone $zone)
    {
        $this->zones->removeElement($zone);
    }

    /**
     * Get zones
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getZones()
    {
        return $this->zones;
    }

    public function __toString()
    {
        return $this->getDesignation();
    }
    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function uploadPhoto()
    {
        $fileName = md5(uniqid()).'.'.$this->getPhoto()->guessExtension();
        try {
            $this->photo->move("../web/uploads/categorie", $fileName);
        } catch (\Exception $exception) {
            throw $exception;
        }
        $this->setPhoto($fileName);
    }
}
