<?php

namespace WSServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Apis
 *
 * @ORM\Table(name="apis")
 * @ORM\Entity
 */
class Apis
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom_api", type="string", length=50, nullable=false)
     */
    private $nomApi;

    /**
     * @var string
     *
     * @ORM\Column(name="identifiant", type="string", length=50, nullable=false)
     */
    private $identifiant;

    /**
     * @var string
     *
     * @ORM\Column(name="pwd", type="string", length=255, nullable=false)
     */
    private $pwd;

    /**
     * @var integer
     *
     * @ORM\Column(name="etat", type="integer", nullable=false)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=255, nullable=false)
     */
    private $token;

    /**
     * @var integer
     *
     * @ORM\Column(name="caution", type="integer", nullable=false)
     */
    private $caution;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout", type="datetime", nullable=false)
     */
    private $dateAjout;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_api", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idApi;



    /**
     * Set nomApi
     *
     * @param string $nomApi
     *
     * @return Apis
     */
    public function setNomApi($nomApi)
    {
        $this->nomApi = $nomApi;

        return $this;
    }

    /**
     * Get nomApi
     *
     * @return string
     */
    public function getNomApi()
    {
        return $this->nomApi;
    }

    /**
     * Set identifiant
     *
     * @param string $identifiant
     *
     * @return Apis
     */
    public function setIdentifiant($identifiant)
    {
        $this->identifiant = $identifiant;

        return $this;
    }

    /**
     * Get identifiant
     *
     * @return string
     */
    public function getIdentifiant()
    {
        return $this->identifiant;
    }

    /**
     * Set pwd
     *
     * @param string $pwd
     *
     * @return Apis
     */
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;

        return $this;
    }

    /**
     * Get pwd
     *
     * @return string
     */
    public function getPwd()
    {
        return $this->pwd;
    }

    /**
     * Set etat
     *
     * @param integer $etat
     *
     * @return Apis
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
     * Set token
     *
     * @param string $token
     *
     * @return Apis
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set caution
     *
     * @param integer $caution
     *
     * @return Apis
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
     * Set dateAjout
     *
     * @param \DateTime $dateAjout
     *
     * @return Apis
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
     * Get idApi
     *
     * @return integer
     */
    public function getIdApi()
    {
        return $this->idApi;
    }
}
