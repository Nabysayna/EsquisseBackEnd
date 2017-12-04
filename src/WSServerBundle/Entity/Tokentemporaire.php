<?php

namespace WSServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tokentemporaire
 *
 * @ORM\Table(name="tokentemporaire")
 * @ORM\Entity
 */
class Tokentemporaire
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     */
    private $idUser;

    /**
     * @var integer
     *
     * @ORM\Column(name="accesslevel", type="integer", nullable=false)
     */
    private $accesslevel;

    /**
     * @var string
     *
     * @ORM\Column(name="tokentemporaire", type="string", length=30, nullable=false)
     */
    private $tokentemporaire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="countingPoint", type="datetime", nullable=false)
     */
    private $countingpoint;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return Tokentemporaire
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return integer
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set accesslevel
     *
     * @param integer $accesslevel
     *
     * @return Tokentemporaire
     */
    public function setAccesslevel($accesslevel)
    {
        $this->accesslevel = $accesslevel;

        return $this;
    }

    /**
     * Get accesslevel
     *
     * @return integer
     */
    public function getAccesslevel()
    {
        return $this->accesslevel;
    }

    /**
     * Set tokentemporaire
     *
     * @param string $tokentemporaire
     *
     * @return Tokentemporaire
     */
    public function setTokentemporaire($tokentemporaire)
    {
        $this->tokentemporaire = $tokentemporaire;

        return $this;
    }

    /**
     * Get tokentemporaire
     *
     * @return string
     */
    public function getTokentemporaire()
    {
        return $this->tokentemporaire;
    }

    /**
     * Set countingpoint
     *
     * @param \DateTime $countingpoint
     *
     * @return Tokentemporaire
     */
    public function setCountingpoint($countingpoint)
    {
        $this->countingpoint = $countingpoint;

        return $this;
    }

    /**
     * Get countingpoint
     *
     * @return \DateTime
     */
    public function getCountingpoint()
    {
        return $this->countingpoint;
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
