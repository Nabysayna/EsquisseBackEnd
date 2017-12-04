<?php

namespace WSServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fraistransferts
 *
 * @ORM\Table(name="fraistransferts")
 * @ORM\Entity
 */
class Fraistransferts
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idapis", type="integer", nullable=false)
     */
    private $idapis;

    /**
     * @var integer
     *
     * @ORM\Column(name="bornsupenvoi", type="integer", nullable=false)
     */
    private $bornsupenvoi;

    /**
     * @var integer
     *
     * @ORM\Column(name="borninfenvoi", type="integer", nullable=false)
     */
    private $borninfenvoi;

    /**
     * @var integer
     *
     * @ORM\Column(name="bornsupretrait", type="integer", nullable=false)
     */
    private $bornsupretrait;

    /**
     * @var integer
     *
     * @ORM\Column(name="borninfretrait", type="integer", nullable=false)
     */
    private $borninfretrait;

    /**
     * @var integer
     *
     * @ORM\Column(name="fraissupenvoi", type="integer", nullable=false)
     */
    private $fraissupenvoi;

    /**
     * @var integer
     *
     * @ORM\Column(name="fraisinfenvoi", type="integer", nullable=false)
     */
    private $fraisinfenvoi;

    /**
     * @var integer
     *
     * @ORM\Column(name="fraissupretrait", type="integer", nullable=false)
     */
    private $fraissupretrait;

    /**
     * @var integer
     *
     * @ORM\Column(name="fraisinfretrait", type="integer", nullable=false)
     */
    private $fraisinfretrait;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateajout", type="datetime", nullable=false)
     */
    private $dateajout;

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
     * @return Fraistransferts
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
     * Set bornsupenvoi
     *
     * @param integer $bornsupenvoi
     *
     * @return Fraistransferts
     */
    public function setBornsupenvoi($bornsupenvoi)
    {
        $this->bornsupenvoi = $bornsupenvoi;

        return $this;
    }

    /**
     * Get bornsupenvoi
     *
     * @return integer
     */
    public function getBornsupenvoi()
    {
        return $this->bornsupenvoi;
    }

    /**
     * Set borninfenvoi
     *
     * @param integer $borninfenvoi
     *
     * @return Fraistransferts
     */
    public function setBorninfenvoi($borninfenvoi)
    {
        $this->borninfenvoi = $borninfenvoi;

        return $this;
    }

    /**
     * Get borninfenvoi
     *
     * @return integer
     */
    public function getBorninfenvoi()
    {
        return $this->borninfenvoi;
    }

    /**
     * Set bornsupretrait
     *
     * @param integer $bornsupretrait
     *
     * @return Fraistransferts
     */
    public function setBornsupretrait($bornsupretrait)
    {
        $this->bornsupretrait = $bornsupretrait;

        return $this;
    }

    /**
     * Get bornsupretrait
     *
     * @return integer
     */
    public function getBornsupretrait()
    {
        return $this->bornsupretrait;
    }

    /**
     * Set borninfretrait
     *
     * @param integer $borninfretrait
     *
     * @return Fraistransferts
     */
    public function setBorninfretrait($borninfretrait)
    {
        $this->borninfretrait = $borninfretrait;

        return $this;
    }

    /**
     * Get borninfretrait
     *
     * @return integer
     */
    public function getBorninfretrait()
    {
        return $this->borninfretrait;
    }

    /**
     * Set fraissupenvoi
     *
     * @param integer $fraissupenvoi
     *
     * @return Fraistransferts
     */
    public function setFraissupenvoi($fraissupenvoi)
    {
        $this->fraissupenvoi = $fraissupenvoi;

        return $this;
    }

    /**
     * Get fraissupenvoi
     *
     * @return integer
     */
    public function getFraissupenvoi()
    {
        return $this->fraissupenvoi;
    }

    /**
     * Set fraisinfenvoi
     *
     * @param integer $fraisinfenvoi
     *
     * @return Fraistransferts
     */
    public function setFraisinfenvoi($fraisinfenvoi)
    {
        $this->fraisinfenvoi = $fraisinfenvoi;

        return $this;
    }

    /**
     * Get fraisinfenvoi
     *
     * @return integer
     */
    public function getFraisinfenvoi()
    {
        return $this->fraisinfenvoi;
    }

    /**
     * Set fraissupretrait
     *
     * @param integer $fraissupretrait
     *
     * @return Fraistransferts
     */
    public function setFraissupretrait($fraissupretrait)
    {
        $this->fraissupretrait = $fraissupretrait;

        return $this;
    }

    /**
     * Get fraissupretrait
     *
     * @return integer
     */
    public function getFraissupretrait()
    {
        return $this->fraissupretrait;
    }

    /**
     * Set fraisinfretrait
     *
     * @param integer $fraisinfretrait
     *
     * @return Fraistransferts
     */
    public function setFraisinfretrait($fraisinfretrait)
    {
        $this->fraisinfretrait = $fraisinfretrait;

        return $this;
    }

    /**
     * Get fraisinfretrait
     *
     * @return integer
     */
    public function getFraisinfretrait()
    {
        return $this->fraisinfretrait;
    }

    /**
     * Set dateajout
     *
     * @param \DateTime $dateajout
     *
     * @return Fraistransferts
     */
    public function setDateajout($dateajout)
    {
        $this->dateajout = $dateajout;

        return $this;
    }

    /**
     * Get dateajout
     *
     * @return \DateTime
     */
    public function getDateajout()
    {
        return $this->dateajout;
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
