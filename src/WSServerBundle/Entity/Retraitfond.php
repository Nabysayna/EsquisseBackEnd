<?php

namespace WSServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Retraitfond
 *
 * @ORM\Table(name="retraitfond")
 * @ORM\Entity
 */
class Retraitfond
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idadminpdv", type="integer", nullable=false)
     */
    private $idadminpdv;

    /**
     * @var integer
     *
     * @ORM\Column(name="montantdemande", type="integer", nullable=false)
     */
    private $montantdemande;

    /**
     * @var integer
     *
     * @ORM\Column(name="etatdemande", type="smallint", nullable=false)
     */
    private $etatdemande;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datedemande", type="datetime", nullable=false)
     */
    private $datedemande;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set idadminpdv
     *
     * @param integer $idadminpdv
     *
     * @return Retraitfond
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
     * Set montantdemande
     *
     * @param integer $montantdemande
     *
     * @return Retraitfond
     */
    public function setMontantdemande($montantdemande)
    {
        $this->montantdemande = $montantdemande;

        return $this;
    }

    /**
     * Get montantdemande
     *
     * @return integer
     */
    public function getMontantdemande()
    {
        return $this->montantdemande;
    }

    /**
     * Set etatdemande
     *
     * @param integer $etatdemande
     *
     * @return Retraitfond
     */
    public function setEtatdemande($etatdemande)
    {
        $this->etatdemande = $etatdemande;

        return $this;
    }

    /**
     * Get etatdemande
     *
     * @return integer
     */
    public function getEtatdemande()
    {
        return $this->etatdemande;
    }

    /**
     * Set datedemande
     *
     * @param \DateTime $datedemande
     *
     * @return Retraitfond
     */
    public function setDatedemande($datedemande)
    {
        $this->datedemande = $datedemande;

        return $this;
    }

    /**
     * Get datedemande
     *
     * @return \DateTime
     */
    public function getDatedemande()
    {
        return $this->datedemande;
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
