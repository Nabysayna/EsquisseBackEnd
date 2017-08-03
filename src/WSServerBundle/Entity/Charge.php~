<?php

namespace WSServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Charge
 *
 * @ORM\Table(name="charge")
 * @ORM\Entity
 */
class Charge
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
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=50, nullable=false)
     */
    private $libelle;

    /**
     * @var integer
     *
     * @ORM\Column(name="montant", type="bigint", nullable=false)
     */
    private $montant;

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
