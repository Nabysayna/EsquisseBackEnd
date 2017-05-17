<?php

namespace WSServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cautions
 *
 * @ORM\Table(name="cautions")
 * @ORM\Entity
 */
class Cautions
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
     * @ORM\Column(name="caution", type="integer", nullable=false)
     */
    private $caution = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="id_caution", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCaution;



    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return Cautions
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
     * Set caution
     *
     * @param integer $caution
     *
     * @return Cautions
     */
    public function setCaution($caution)
    {
        $this->caution = $caution;

        return $this;
    }

    /**
     * Get caution
     *
     * @return integer
     */
    public function getCaution()
    {
        return $this->caution;
    }

    /**
     * Get idCaution
     *
     * @return integer
     */
    public function getIdCaution()
    {
        return $this->idCaution;
    }
}
