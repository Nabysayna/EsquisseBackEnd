<?php

namespace WSServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ventes
 *
 * @ORM\Table(name="ventes")
 * @ORM\Entity
 */
class Ventes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_commande", type="integer", nullable=false)
     */
    private $idCommande;

    /**
     * @var integer
     *
     * @ORM\Column(name="montant", type="integer", nullable=false)
     */
    private $montant;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     */
    private $idUser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_vente", type="datetime", nullable=false)
     */
    private $dateVente;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set idCommande
     *
     * @param integer $idCommande
     *
     * @return Ventes
     */
    public function setIdCommande($idCommande)
    {
        $this->idCommande = $idCommande;

        return $this;
    }

    /**
     * Get idCommande
     *
     * @return integer
     */
    public function getIdCommande()
    {
        return $this->idCommande;
    }

    /**
     * Set montant
     *
     * @param integer $montant
     *
     * @return Ventes
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
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return Ventes
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return integer
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set dateVente
     *
     * @param \DateTime $dateVente
     *
     * @return Ventes
     */
    public function setDateVente($dateVente)
    {
        $this->dateVente = $dateVente;

        return $this;
    }

    /**
     * Get dateVente
     *
     * @return \DateTime
     */
    public function getDateVente()
    {
        return $this->dateVente;
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
    /**
     * @var string
     */
    private $type;

    /**
     * @var integer
     */
    private $dependOn;

    /**
     * @var string
     */
    private $infovente;

    /**
     * @var integer
     */
    private $idClient;


    /**
     * Set type
     *
     * @param string $type
     *
     * @return Ventes
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set dependOn
     *
     * @param integer $dependOn
     *
     * @return Ventes
     */
    public function setDependOn($dependOn)
    {
        $this->dependOn = $dependOn;

        return $this;
    }

    /**
     * Get dependOn
     *
     * @return integer
     */
    public function getDependOn()
    {
        return $this->dependOn;
    }

    /**
     * Set infovente
     *
     * @param string $infovente
     *
     * @return Ventes
     */
    public function setInfovente($infovente)
    {
        $this->infovente = $infovente;

        return $this;
    }

    /**
     * Get infovente
     *
     * @return string
     */
    public function getInfovente()
    {
        return $this->infovente;
    }

    /**
     * Set idClient
     *
     * @param integer $idClient
     *
     * @return Ventes
     */
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;

        return $this;
    }

    /**
     * Get idClient
     *
     * @return integer
     */
    public function getIdClient()
    {
        return $this->idClient;
    }
}
