<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Produit;

/**
 * ServiceToProduit
 *
 * @ORM\Table(name="service_to_produit")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ServiceToProduitRepository")
 */
class ServiceToProduit
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
     * @ORM\ManyToOne(targetEntity="Service")
     */
    private $service;

    /**
     * @ORM\ManyToOne(targetEntity="Produit")
     */
    private $produit;

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
     * @return ServiceToProduit
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
     * Set service
     *
     * @param \AppBundle\Entity\Service $service
     *
     * @return ServiceToProduit
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

    /**
     * Set produit
     *
     * @param \AppBundle\Entity\Produit $produit
     *
     * @return ServiceToProduit
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
    public function __toString()
    {
        return $this->getService() ." - ".$this->getProduit();
    }
}
