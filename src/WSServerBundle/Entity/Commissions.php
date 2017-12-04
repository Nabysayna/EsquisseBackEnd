<?php

namespace WSServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commissions
 *
 * @ORM\Table(name="commissions")
 * @ORM\Entity
 */
class Commissions
{
    /**
     * @var string
     *
     * @ORM\Column(name="nomservice", type="string", length=100, nullable=true)
     */
    private $nomservice;

    /**
     * @var string
     *
     * @ORM\Column(name="libelleoperation", type="string", length=100, nullable=true)
     */
    private $libelleoperation;

    /**
     * @var integer
     *
     * @ORM\Column(name="montant", type="integer", nullable=true)
     */
    private $montant;

    /**
     * @var integer
     *
     * @ORM\Column(name="frais", type="integer", nullable=true)
     */
    private $frais;

    /**
     * @var integer
     *
     * @ORM\Column(name="com_concedant", type="integer", nullable=true)
     */
    private $comConcedant;

    /**
     * @var integer
     *
     * @ORM\Column(name="com_distributeur", type="integer", nullable=true)
     */
    private $comDistributeur;

    /**
     * @var integer
     *
     * @ORM\Column(name="commissionbbs", type="integer", nullable=true)
     */
    private $commissionbbs;

    /**
     * @var integer
     *
     * @ORM\Column(name="commissionpdv", type="integer", nullable=true)
     */
    private $commissionpdv;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateoperation", type="datetime", nullable=true)
     */
    private $dateoperation;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set nomservice
     *
     * @param string $nomservice
     *
     * @return Commissions
     */
    public function setNomservice($nomservice)
    {
        $this->nomservice = $nomservice;

        return $this;
    }

    /**
     * Get nomservice
     *
     * @return string
     */
    public function getNomservice()
    {
        return $this->nomservice;
    }

    /**
     * Set libelleoperation
     *
     * @param string $libelleoperation
     *
     * @return Commissions
     */
    public function setLibelleoperation($libelleoperation)
    {
        $this->libelleoperation = $libelleoperation;

        return $this;
    }

    /**
     * Get libelleoperation
     *
     * @return string
     */
    public function getLibelleoperation()
    {
        return $this->libelleoperation;
    }

    /**
     * Set montant
     *
     * @param integer $montant
     *
     * @return Commissions
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
     * Set frais
     *
     * @param integer $frais
     *
     * @return Commissions
     */
    public function setFrais($frais)
    {
        $this->frais = $frais;

        return $this;
    }

    /**
     * Get frais
     *
     * @return integer
     */
    public function getFrais()
    {
        return $this->frais;
    }

    /**
     * Set comConcedant
     *
     * @param integer $comConcedant
     *
     * @return Commissions
     */
    public function setComConcedant($comConcedant)
    {
        $this->comConcedant = $comConcedant;

        return $this;
    }

    /**
     * Get comConcedant
     *
     * @return integer
     */
    public function getComConcedant()
    {
        return $this->comConcedant;
    }

    /**
     * Set comDistributeur
     *
     * @param integer $comDistributeur
     *
     * @return Commissions
     */
    public function setComDistributeur($comDistributeur)
    {
        $this->comDistributeur = $comDistributeur;

        return $this;
    }

    /**
     * Get comDistributeur
     *
     * @return integer
     */
    public function getComDistributeur()
    {
        return $this->comDistributeur;
    }

    /**
     * Set commissionbbs
     *
     * @param integer $commissionbbs
     *
     * @return Commissions
     */
    public function setCommissionbbs($commissionbbs)
    {
        $this->commissionbbs = $commissionbbs;

        return $this;
    }

    /**
     * Get commissionbbs
     *
     * @return integer
     */
    public function getCommissionbbs()
    {
        return $this->commissionbbs;
    }

    /**
     * Set commissionpdv
     *
     * @param integer $commissionpdv
     *
     * @return Commissions
     */
    public function setCommissionpdv($commissionpdv)
    {
        $this->commissionpdv = $commissionpdv;

        return $this;
    }

    /**
     * Get commissionpdv
     *
     * @return integer
     */
    public function getCommissionpdv()
    {
        return $this->commissionpdv;
    }

    /**
     * Set dateoperation
     *
     * @param \DateTime $dateoperation
     *
     * @return Commissions
     */
    public function setDateoperation($dateoperation)
    {
        $this->dateoperation = $dateoperation;

        return $this;
    }

    /**
     * Get dateoperation
     *
     * @return \DateTime
     */
    public function getDateoperation()
    {
        return $this->dateoperation;
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
