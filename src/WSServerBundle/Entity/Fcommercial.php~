<?php

namespace WSServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fcommercial
 *
 * @ORM\Table(name="fcommercial")
 * @ORM\Entity
 */
class Fcommercial
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_commercial", type="integer", nullable=false)
     */
    private $idCommercial;

    /**
     * @var integer
     *
     * @ORM\Column(name="telclient", type="integer", nullable=false)
     */
    private $telclient;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomclient", type="string", length=40, nullable=false)
     */
    private $prenomclient;

    /**
     * @var string
     *
     * @ORM\Column(name="nomclient", type="string", length=30, nullable=false)
     */
    private $nomclient;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=30, nullable=false)
     */
    private $categorie;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set idCommercial
     *
     * @param integer $idCommercial
     *
     * @return Fcommercial
     */
    public function setIdCommercial($idCommercial)
    {
        $this->idCommercial = $idCommercial;

        return $this;
    }

    /**
     * Get idCommercial
     *
     * @return integer
     */
    public function getIdCommercial()
    {
        return $this->idCommercial;
    }

    /**
     * Set telclient
     *
     * @param integer $telclient
     *
     * @return Fcommercial
     */
    public function setTelclient($telclient)
    {
        $this->telclient = $telclient;

        return $this;
    }

    /**
     * Get telclient
     *
     * @return integer
     */
    public function getTelclient()
    {
        return $this->telclient;
    }

    /**
     * Set prenomclient
     *
     * @param string $prenomclient
     *
     * @return Fcommercial
     */
    public function setPrenomclient($prenomclient)
    {
        $this->prenomclient = $prenomclient;

        return $this;
    }

    /**
     * Get prenomclient
     *
     * @return string
     */
    public function getPrenomclient()
    {
        return $this->prenomclient;
    }

    /**
     * Set nomclient
     *
     * @param string $nomclient
     *
     * @return Fcommercial
     */
    public function setNomclient($nomclient)
    {
        $this->nomclient = $nomclient;

        return $this;
    }

    /**
     * Get nomclient
     *
     * @return string
     */
    public function getNomclient()
    {
        return $this->nomclient;
    }

    /**
     * Set categorie
     *
     * @param string $categorie
     *
     * @return Fcommercial
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
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
