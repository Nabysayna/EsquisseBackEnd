<?php

namespace WSServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Processdeposit
 *
 * @ORM\Table(name="processdeposit")
 * @ORM\Entity
 */
class Processdeposit
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
     * @ORM\Column(name="montantdeposit", type="integer", nullable=false)
     */
    private $montantdeposit;

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
     * @var string
     *
     * @ORM\Column(name="initiateur", type="string", length=250, nullable=false)
     */
    private $initiateur;

    /**
     * @var string
     *
     * @ORM\Column(name="agent_recouvreur", type="string", length=250, nullable=false)
     */
    private $agentRecouvreur;

    /**
     * @var string
     *
     * @ORM\Column(name="imageqrcode", type="string", length=250, nullable=false)
     */
    private $imageqrcode;

    /**
     * @var string
     *
     * @ORM\Column(name="agent_positionneur", type="string", length=250, nullable=false)
     */
    private $agentPositionneur;

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
     * @return Processdeposit
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
     * Set montantdeposit
     *
     * @param integer $montantdeposit
     *
     * @return Processdeposit
     */
    public function setMontantdeposit($montantdeposit)
    {
        $this->montantdeposit = $montantdeposit;

        return $this;
    }

    /**
     * Get montantdeposit
     *
     * @return integer
     */
    public function getMontantdeposit()
    {
        return $this->montantdeposit;
    }

    /**
     * Set etatdemande
     *
     * @param integer $etatdemande
     *
     * @return Processdeposit
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
     * @return Processdeposit
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
     * Set initiateur
     *
     * @param string $initiateur
     *
     * @return Processdeposit
     */
    public function setInitiateur($initiateur)
    {
        $this->initiateur = $initiateur;

        return $this;
    }

    /**
     * Get initiateur
     *
     * @return string
     */
    public function getInitiateur()
    {
        return $this->initiateur;
    }

    /**
     * Set agentRecouvreur
     *
     * @param string $agentRecouvreur
     *
     * @return Processdeposit
     */
    public function setAgentRecouvreur($agentRecouvreur)
    {
        $this->agentRecouvreur = $agentRecouvreur;

        return $this;
    }

    /**
     * Get agentRecouvreur
     *
     * @return string
     */
    public function getAgentRecouvreur()
    {
        return $this->agentRecouvreur;
    }

    /**
     * Set imageqrcode
     *
     * @param string $imageqrcode
     *
     * @return Processdeposit
     */
    public function setImageqrcode($imageqrcode)
    {
        $this->imageqrcode = $imageqrcode;

        return $this;
    }

    /**
     * Get imageqrcode
     *
     * @return string
     */
    public function getImageqrcode()
    {
        return $this->imageqrcode;
    }

    /**
     * Set agentPositionneur
     *
     * @param string $agentPositionneur
     *
     * @return Processdeposit
     */
    public function setAgentPositionneur($agentPositionneur)
    {
        $this->agentPositionneur = $agentPositionneur;

        return $this;
    }

    /**
     * Get agentPositionneur
     *
     * @return string
     */
    public function getAgentPositionneur()
    {
        return $this->agentPositionneur;
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
