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
    private $caution;

    /**
     * @var integer
     *
     * @ORM\Column(name="cautionconsomme", type="integer", nullable=false)
     */
    private $cautionconsomme;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modif", type="datetime", nullable=true)
     */
    private $dateModif;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout", type="datetime", nullable=false)
     */
    private $dateAjout;

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
     * Set cautionconsomme
     *
     * @param integer $cautionconsomme
     *
     * @return Cautions
     */
    public function setCautionconsomme($cautionconsomme)
    {
        $this->cautionconsomme = $cautionconsomme;

        return $this;
    }

    /**
     * Get cautionconsomme
     *
     * @return integer
     */
    public function getCautionconsomme()
    {
        return $this->cautionconsomme;
    }

    /**
     * Set dateModif
     *
     * @param \DateTime $dateModif
     *
     * @return Cautions
     */
    public function setDateModif($dateModif)
    {
        $this->dateModif = $dateModif;

        return $this;
    }

    /**
     * Get dateModif
     *
     * @return \DateTime
     */
    public function getDateModif()
    {
        return $this->dateModif;
    }

    /**
     * Set dateAjout
     *
     * @param \DateTime $dateAjout
     *
     * @return Cautions
     */
    public function setDateAjout($dateAjout)
    {
        $this->dateAjout = $dateAjout;

        return $this;
    }

    /**
     * Get dateAjout
     *
     * @return \DateTime
     */
    public function getDateAjout()
    {
        return $this->dateAjout;
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
