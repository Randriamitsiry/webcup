<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Service
 *
 * @ORM\Table(name="service")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ServiceRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Service
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
     * @ORM\Column(name="Designation", type="string", length=100)
     */
    private $designation;

    /**
     * @var string
     *
     * @ORM\Column(name="Details", type="string", length=255)
     */
    private $details;
    /**
     * @ORM\ManyToOne(targetEntity="Zone", inversedBy="services")
     */
    private $zone;
    /**
     * @var string
     * @ORM\Column(name = "photo", type="string")
     */
    private $photo;

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
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
     * @return Service
     */
    public function setZone($zone)
    {
        $this->zone = $zone;
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
     * Set designation
     *
     * @param string $designation
     *
     * @return Service
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
     * Set details
     *
     * @param string $details
     *
     * @return Service
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * Get details
     *
     * @return string
     */
    public function getDetails()
    {
        return $this->details;
    }

    public function __toString()
    {
        return $this->getZone() ." - ".$this->getDesignation();
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function uploadPhoto()
    {
        $fileName = md5(uniqid()).'.'.$this->getPhoto()->guessExtension();
        try {
            $this->photo->move("../web/uploads/service", $fileName);
        } catch (\Exception $exception) {
            throw $exception;
        }
        $this->setPhoto($fileName);
    }
}
