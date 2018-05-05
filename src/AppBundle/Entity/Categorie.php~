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
}
