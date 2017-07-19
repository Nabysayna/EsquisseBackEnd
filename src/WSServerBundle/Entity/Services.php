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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
