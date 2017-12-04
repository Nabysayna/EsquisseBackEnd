<?php

namespace WSServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commissionnements
 *
 * @ORM\Table(name="commissionnements")
 * @ORM\Entity
 */
class Commissionnements
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idapis", type="integer", nullable=false)
     */
    private $idapis;

    /**
     * @var string
     *
     * @ORM\Column(name="concedant", type="string", length=50, nullable=false)
     */
    private $concedant;

    /**
     * @var string
     *
     * @ORM\Column(name="libelleoperation", type="string", length=50, nullable=false)
     */
    private $libelleoperation;

    /**
     * @var integer
     *
     * @ORM\Column(name="borneinf", type="integer", nullable=false)
     */
    private $borneinf;

    /**
     * @var integer
     *
     * @ORM\Column(name="bornesup", type="integer", nullable=false)
     */
    private $bornesup;

    /**
     * @var integer
     *
     * @ORM\Column(name="frais", type="integer", nullable=false)
     */
    private $frais;

    /**
     * @var integer
     *
     * @ORM\Column(name="partconcedant", type="integer", nullable=false)
     */
    private $partconcedant;

    /**
     * @var integer
     *
     * @ORM\Column(name="partdistributeur", type="integer", nullable=false)
     */
    private $partdistributeur;

    /**
     * @var integer
     *
     * @ORM\Column(name="partbbs", type="integer", nullable=false)
     */
    private $partbbs;

    /**
     * @var integer
     *
     * @ORM\Column(name="partpdv", type="integer", nullable=false)
     */
    private $partpdv;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set idapis
     *
     * @param integer $idapis
     *
     * @return Commissionnements
     */
    public function setIdapis($idapis)
    {
        $this->idapis = $idapis;

        return $this;
    }

    /**
     * Get idapis
     *
     * @return integer
     */
    public function getIdapis()
    {
        return $this->idapis;
    }

    /**
     * Set concedant
     *
     * @param string $concedant
     *
     * @return Commissionnements
     */
    public function setConcedant($concedant)
    {
        $this->concedant = $concedant;

        return $this;
    }

    /**
     * Get concedant
     *
     * @return string
     */
    public function getConcedant()
    {
        return $this->concedant;
    }

    /**
     * Set libelleoperation
     *
     * @param string $libelleoperation
     *
     * @return Commissionnements
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
     * Set borneinf
     *
     * @param integer $borneinf
     *
     * @return Commissionnements
     */
    public function setBorneinf($borneinf)
    {
        $this->borneinf = $borneinf;

        return $this;
    }

    /**
     * Get borneinf
     *
     * @return integer
     */
    public function getBorneinf()
    {
        return $this->borneinf;
    }

    /**
     * Set bornesup
     *
     * @param integer $bornesup
     *
     * @return Commissionnements
     */
    public function setBornesup($bornesup)
    {
        $this->bornesup = $bornesup;

        return $this;
    }

    /**
     * Get bornesup
     *
     * @return integer
     */
    public function getBornesup()
    {
        return $this->bornesup;
    }

    /**
     * Set frais
     *
     * @param integer $frais
     *
     * @return Commissionnements
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
     * Set partconcedant
     *
     * @param integer $partconcedant
     *
     * @return Commissionnements
     */
    public function setPartconcedant($partconcedant)
    {
        $this->partconcedant = $partconcedant;

        return $this;
    }

    /**
     * Get partconcedant
     *
     * @return integer
     */
    public function getPartconcedant()
    {
        return $this->partconcedant;
    }

    /**
     * Set partdistributeur
     *
     * @param integer $partdistributeur
     *
     * @return Commissionnements
     */
    public function setPartdistributeur($partdistributeur)
    {
        $this->partdistributeur = $partdistributeur;

        return $this;
    }

    /**
     * Get partdistributeur
     *
     * @return integer
     */
    public function getPartdistributeur()
    {
        return $this->partdistributeur;
    }

    /**
     * Set partbbs
     *
     * @param integer $partbbs
     *
     * @return Commissionnements
     */
    public function setPartbbs($partbbs)
    {
        $this->partbbs = $partbbs;

        return $this;
    }

    /**
     * Get partbbs
     *
     * @return integer
     */
    public function getPartbbs()
    {
        return $this->partbbs;
    }

    /**
     * Set partpdv
     *
     * @param integer $partpdv
     *
     * @return Commissionnements
     */
    public function setPartpdv($partpdv)
    {
        $this->partpdv = $partpdv;

        return $this;
    }

    /**
     * Get partpdv
     *
     * @return integer
     */
    public function getPartpdv()
    {
        return $this->partpdv;
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
