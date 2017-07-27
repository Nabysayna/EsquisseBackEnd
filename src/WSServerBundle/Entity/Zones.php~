<?php

namespace WSServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zones
 *
 * @ORM\Table(name="zones")
 * @ORM\Entity
 */
class Zones
{
    /**
     * @var string
     *
     * @ORM\Column(name="zone", type="string", length=50, nullable=false)
     */
    private $zone;

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
     * @ORM\Column(name="idregion", type="integer", nullable=false)
     */
    private $idregion;

    /**
     * @var string
     *
     * @ORM\Column(name="region", type="string", length=50, nullable=false)
     */
    private $region;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set zone
     *
     * @param string $zone
     *
     * @return Zones
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
     * Set latitude
     *
     * @param float $latitude
     *
     * @return Zones
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
     * @return Zones
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
     * Set idregion
     *
     * @param integer $idregion
     *
     * @return Zones
     */
    public function setIdregion($idregion)
    {
        $this->idregion = $idregion;

        return $this;
    }

    /**
     * Get idregion
     *
     * @return integer
     */
    public function getIdregion()
    {
        return $this->idregion;
    }

    /**
     * Set region
     *
     * @param string $region
     *
     * @return Zones
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
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
