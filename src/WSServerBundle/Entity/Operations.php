<?php

namespace WSServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Operations
 *
 * @ORM\Table(name="operations")
 * @ORM\Entity
 */
class Operations
{
    /**
     * @var string
     *
     * @ORM\Column(name="date", type="string", length=20, nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="operateur", type="string", length=20, nullable=false)
     */
    private $operateur;

    /**
     * @var string
     *
     * @ORM\Column(name="traitement", type="string", length=30, nullable=false)
     */
    private $traitement;

    /**
     * @var string
     *
     * @ORM\Column(name="infoclient", type="string", length=50, nullable=false)
     */
    private $infoclient;

    /**
     * @var integer
     *
     * @ORM\Column(name="depends_on", type="integer", nullable=false)
     */
    private $dependsOn;

    /**
     * @var integer
     *
     * @ORM\Column(name="montant", type="integer", nullable=false)
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
     * Set date
     *
     * @param string $date
     *
     * @return Operations
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set operateur
     *
     * @param string $operateur
     *
     * @return Operations
     */
    public function setOperateur($operateur)
    {
        $this->operateur = $operateur;

        return $this;
    }

    /**
     * Get operateur
     *
     * @return string
     */
    public function getOperateur()
    {
        return $this->operateur;
    }

    /**
     * Set traitement
     *
     * @param string $traitement
     *
     * @return Operations
     */
    public function setTraitement($traitement)
    {
        $this->traitement = $traitement;

        return $this;
    }

    /**
     * Get traitement
     *
     * @return string
     */
    public function getTraitement()
    {
        return $this->traitement;
    }

    /**
     * Set infoclient
     *
     * @param string $infoclient
     *
     * @return Operations
     */
    public function setInfoclient($infoclient)
    {
        $this->infoclient = $infoclient;

        return $this;
    }

    /**
     * Get infoclient
     *
     * @return string
     */
    public function getInfoclient()
    {
        return $this->infoclient;
    }

    /**
     * Set dependsOn
     *
     * @param integer $dependsOn
     *
     * @return Operations
     */
    public function setDependsOn($dependsOn)
    {
        $this->dependsOn = $dependsOn;

        return $this;
    }

    /**
     * Get dependsOn
     *
     * @return integer
     */
    public function getDependsOn()
    {
        return $this->dependsOn;
    }

    /**
     * Set montant
     *
     * @param integer $montant
     *
     * @return Operations
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