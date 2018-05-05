<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProduitToProduit
 *
 * @ORM\Table(name="produit_to_produit")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProduitToProduitRepository")
 */
class ProduitToProduit
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
     * @ORM\ManyToOne(targetEntity="Produit")
     */
    private $source;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Produit")
     */
    private $destination;

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
     * @return ProduitToProduit
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
     * Set source
     *
     * @param \AppBundle\Entity\Produit $source
     *
     * @return ProduitToProduit
     */
    public function setSource(\AppBundle\Entity\Produit $source = null)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return \AppBundle\Entity\Produit
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set destination
     *
     * @param \AppBundle\Entity\Produit $destination
     *
     * @return ProduitToProduit
     */
    public function setDestination(\AppBundle\Entity\Produit $destination = null)
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * Get destination
     *
     * @return \AppBundle\Entity\Produit
     */
    public function getDestination()
    {
        return $this->destination;
    }

    public function __toString()
    {
        return $this->getSource() ." - ".$this->getDestination();
    }
}
