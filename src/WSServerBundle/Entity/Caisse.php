<?php

namespace WSServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Caisse
 *
 * @ORM\Table(name="caisse")
 * @ORM\Entity
 */
class Caisse
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idgerantpdv", type="integer", nullable=false)
     */
    private $idgerantpdv;

    /**
     * @var integer
     *
     * @ORM\Column(name="idadminpdv", type="integer", nullable=false)
     */
    private $idadminpdv;

    /**
     * @var integer
     *
     * @ORM\Column(name="solde_ouvert", type="bigint", nullable=false)
     */
    private $soldeOuvert;

    /**
     * @var integer
     *
     * @ORM\Column(name="solde_fermet", type="bigint", nullable=false)
     */
    private $soldeFermet;

    /**
     * @var integer
     *
     * @ORM\Column(name="etat", type="integer", nullable=false)
     */
    private $etat = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set idgerantpdv
     *
     * @param integer $idgerantpdv
     *
     * @return Caisse
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
     * @return Caisse
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
     * Set soldeOuvert
     *
     * @param integer $soldeOuvert
     *
     * @return Caisse
     */
    public function setSoldeOuvert($soldeOuvert)
    {
        $this->soldeOuvert = $soldeOuvert;

        return $this;
    }

    /**
     * Get soldeOuvert
     *
     * @return integer
     */
    public function getSoldeOuvert()
    {
        return $this->soldeOuvert;
    }

    /**
     * Set soldeFermet
     *
     * @param integer $soldeFermet
     *
     * @return Caisse
     */
    public function setSoldeFermet($soldeFermet)
    {
        $this->soldeFermet = $soldeFermet;

        return $this;
    }

    /**
     * Get soldeFermet
     *
     * @return integer
     */
    public function getSoldeFermet()
    {
        return $this->soldeFermet;
    }

    /**
     * Set etat
     *
     * @param integer $etat
     *
     * @return Caisse
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return integer
     */
    public function getEtat()
    {
        return $this->etat;
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
