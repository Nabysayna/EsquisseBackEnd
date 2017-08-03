<?php

namespace WSServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Souszones
 *
 * @ORM\Table(name="souszones")
 * @ORM\Entity
 */
class Souszones
{
    /**
     * @var string
     *
     * @ORM\Column(name="sous_zone", type="string", length=50, nullable=false)
     */
    private $sousZone;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="float", precision=10, scale=0, nullable=false)
     */
    private $latitude;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float", precision=10, scale=0, nullable=false)
     */
    private $longitude;

    /**
     * @var integer
     *
     * @ORM\Column(name="idzone", type="integer", nullable=false)
     */
    private $idzone;

    /**
     * @var string
     *
     * @ORM\Column(name="zone", type="string", length=50, nullable=false)
     */
    private $zone;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set sousZone
     *
     * @param string $sousZone
     *
     * @return Souszones
     */
    public function setSousZone($sousZone)
    {
        $this->sousZone = $sousZone;

        return $this;
    }

    /**
     * Get sousZone
     *
     * @return string
     */
    public function getSousZone()
    {
        return $this->sousZone;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     *
     * @return Souszones
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     *
     * @return Souszones
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set idzone
     *
     * @param integer $idzone
     *
     * @return Souszones
     */
    public function setIdzone($idzone)
    {
        $this->idzone = $idzone;

        return $this;
    }

    /**
     * Get idzone
     *
     * @return integer
     */
    public function getIdzone()
    {
        return $this->idzone;
    }

    /**
     * Set zone
     *
     * @param string $zone
     *
     * @return Souszones
     */
    public function setZone($zone)
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * Get zone
     *
     * @return string
     */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
