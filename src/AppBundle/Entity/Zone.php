<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Zone
 *
 * @ORM\Table(name="zone")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ZoneRepository")
 */
class Zone
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
     * @ORM\Column(name="designation", type="string")
     */
    private $designation;
    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255)
     */
    private $description;
    /**
     * @ORM\OneToMany(targetEntity="Produit", mappedBy="zone")
     */
    private $produits;

    /**
     * @ORM\OneToMany(targetEntity="Service", mappedBy="zone")
     */
    private $services;

    /**
     * @ORM\OneToMany(targetEntity="Avis", mappedBy ="zone")
     */
    private $avis;

    /**
     * @ORM\ManyToOne(targetEntity="Categorie", inversedBy="zones" , cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="categorie_id", referencedColumnName="id",nullable=true)
     */
    private $categorie;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
        $this->services = new ArrayCollection();
        $this->avis = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * @param mixed $services
     */
    public function setServices($services)
    {
        $this->services = $services;
    }

    /**
     * @return mixed
     */
    public function getProduits()
    {
        return $this->produits;
    }

    /**
     * @param ArrayCollection $produits
     * @return Zone
     */
    public function setProduits($produits)
    {
        $this->produits = $produits;
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
     * Set description
     *
     * @param string $description
     *
     * @return Zone
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
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * @param string $designation
     * @return Zone
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;
        return $this;
    }
    
    /**
     * Add produit
     *
     * @param \AppBundle\Entity\Produit $produit
     *
     * @return Zone
     */
    public function addProduit(\AppBundle\Entity\Produit $produit)
    {
        $this->produits[] = $produit;

        return $this;
    }

    /**
     * Remove produit
     *
     * @param \AppBundle\Entity\Produit $produit
     */
    public function removeProduit(\AppBundle\Entity\Produit $produit)
    {
        $this->produits->removeElement($produit);
    }
    /**
     * Add Service
     * @param \AppBundle\Entity\Service $service
     */
    public function addService(Service $service)
    {
        $this->services[] = $service;
    }
    /**
     * Remove produit
     *
     * @param \AppBundle\Entity\Service $service
     */
    public function removeService(Service $service)
    {
        $this->produits->removeElement($service);
    }
    /**
     * Set categorie
     *
     * @param \AppBundle\Entity\Categorie $categorie
     *
     * @return Zone
     */
    public function setCategorie(\AppBundle\Entity\Categorie $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \AppBundle\Entity\Categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    public function __toString()
    {
        return $this->getCategorie() ." - ".$this->getDesignation();
    }

    /**
     * Add avi
     *
     * @param \AppBundle\Entity\Avis $avi
     *
     * @return Zone
     */
    public function addAvi(\AppBundle\Entity\Avis $avi)
    {
        $this->avis[] = $avi;

        return $this;
    }

    /**
     * Remove avi
     *
     * @param \AppBundle\Entity\Avis $avi
     */
    public function removeAvi(\AppBundle\Entity\Avis $avi)
    {
        $this->avis->removeElement($avi);
    }

    /**
     * Get avis
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAvis()
    {
        return $this->avis;
    }
}
