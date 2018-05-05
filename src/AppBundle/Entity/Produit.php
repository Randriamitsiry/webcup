<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProduitRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Produit
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
     * @ORM\Column(name="Designation", type="string", length=255)
     */
    private $designation;
    /**
     * @ORM\ManyToOne(targetEntity="Zone", inversedBy="produits")
     */
    private $zone;
    /**
     * @ORM\Column(name="details", type="string")
     */
    private $details;

    /**
     * @return mixed
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param mixed $details
     */
    public function setDetails($details)
    {
        $this->details = $details;
    }
    /**
     * @ORM\Column(name="photo", type="string", length=255)
     */
    private $photo;
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
     * @return Produit
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
     * @return Zone
     */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * @param Zone $zone
     * @return Produit
     */
    public function setZone($zone)
    {
        $this->zone = $zone;
        return $this;
    }

    public function __toString()
    {
        return $this->getDesignation()." de la zone ".$this->getZone();
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     * @return Produit
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
        return $this;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function uploadPhoto()
    {
        $fileName = md5(uniqid()).'.'.$this->getPhoto()->guessExtension();
        try {
            $this->photo->move("../web/uploads/produit", $fileName);
        } catch (\Exception $exception) {
            throw $exception;
        }
        $this->setPhoto($fileName);
    }
}
