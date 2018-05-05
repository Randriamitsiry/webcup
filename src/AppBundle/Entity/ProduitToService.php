<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProduitToService
 *
 * @ORM\Table(name="produit_to_service")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProduitToServiceRepository")
 */
class ProduitToService
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
     * @ORM\ManyToOne(targetEntity="Produit")
     */
    private $produit;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Service")
     */
    private $service;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_echange", type="datetime")
     */
    private $dateEchange;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dateEchange
     *
     * @param \DateTime $dateEchange
     *
     * @return ProduitToService
     */
    public function setDateEchange($dateEchange)
    {
        $this->dateEchange = $dateEchange;

        return $this;
    }

    /**
     * Get dateEchange
     *
     * @return \DateTime
     */
    public function getDateEchange()
    {
        return $this->dateEchange;
    }

    /**
     * Set produit
     *
     * @param \AppBundle\Entity\Produit $produit
     *
     * @return ProduitToService
     */
    public function setProduit(\AppBundle\Entity\Produit $produit = null)
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get produit
     *
     * @return \AppBundle\Entity\Produit
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * Set service
     *
     * @param \AppBundle\Entity\Service $service
     *
     * @return ProduitToService
     */
    public function setService(\AppBundle\Entity\Service $service = null)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get service
     *
     * @return \AppBundle\Entity\Service
     */
    public function getService()
    {
        return $this->service;
    }

    public function __toString()
    {
        return $this->getProduit()." - ".$this->getService();
    }
}
