<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ServiveToService
 *
 * @ORM\Table(name="servive_to_service")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ServiveToServiceRepository")
 */
class ServiveToService
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
    private $source;

    /**
     * @ORM\ManyToOne(targetEntity="Service")
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
     * @return ServiveToService
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
     * @param \AppBundle\Entity\Service $source
     *
     * @return ServiveToService
     */
    public function setSource(\AppBundle\Entity\Service $source = null)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return \AppBundle\Entity\Service
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set destination
     *
     * @param \AppBundle\Entity\Service $destination
     *
     * @return ServiveToService
     */
    public function setDestination(\AppBundle\Entity\Service $destination = null)
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * Get destination
     *
     * @return \AppBundle\Entity\Service
     */
    public function getDestination()
    {
        return $this->destination;
    }
}
