<?php

namespace WSServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Services
 *
 * @ORM\Table(name="services")
 * @ORM\Entity
 */
class Services
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="idadminpdv", type="integer", nullable=false)
     */
    private $idadminpdv;

    /**
     * @var integer
     *
     * @ORM\Column(name="idpdv", type="integer", nullable=false)
     */
    private $idpdv;

    /**
     * @var string
     *
     * @ORM\Column(name="designations", type="string", length=1000, nullable=false)
     */
    private $designations;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout", type="datetime", nullable=false)
     */
    private $dateAjout;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Services
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set idadminpdv
     *
     * @param integer $idadminpdv
     *
     * @return Services
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
     * Set idpdv
     *
     * @param integer $idpdv
     *
     * @return Services
     */
    public function setIdpdv($idpdv)
    {
        $this->idpdv = $idpdv;

        return $this;
    }

    /**
     * Get idpdv
     *
     * @return integer
     */
    public function getIdpdv()
    {
        return $this->idpdv;
    }

    /**
     * Set designations
     *
     * @param string $designations
     *
     * @return Services
     */
    public function setDesignations($designations)
    {
        $this->designations = $designations;

        return $this;
    }

    /**
     * Get designations
     *
     * @return string
     */
    public function getDesignations()
    {
        return $this->designations;
    }

    /**
     * Set dateAjout
     *
     * @param \DateTime $dateAjout
     *
     * @return Services
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
