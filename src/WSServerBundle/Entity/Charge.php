<?php

namespace WSServerBundle\Entity;

/**
 * Charge
 */
class Charge
{
    /**
     * @var integer
     */
    private $idgerantpdv;

    /**
     * @var integer
     */
    private $idadminpdv;

    /**
     * @var string
     */
    private $libelle;

    /**
     * @var integer
     */
    private $montant;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set idgerantpdv
     *
     * @param integer $idgerantpdv
     *
     * @return Charge
     */
    public function setIdgerantpdv($idgerantpdv)
    {
        $this->idgerantpdv = $idgerantpdv;

        return $this;
    }

    /**
     * Get idgerantpdv
     *
     * @return integer
     */
    public function getIdgerantpdv()
    {
        return $this->idgerantpdv;
    }

    /**
     * Set idadminpdv
     *
     * @param integer $idadminpdv
     *
     * @return Charge
     */
    public function setIdadminpdv($idadminpdv)
    {
        $this->idadminpdv = $idadminpdv;

        return $this;
    }

    /**
     * Get idadminpdv
     *
     * @return integer
     */
    public function getIdadminpdv()
    {
        return $this->idadminpdv;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Charge
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set montant
     *
     * @param integer $montant
     *
     * @return Charge
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return integer
     */
    public function getMontant()
    {
        return $this->montant;
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

