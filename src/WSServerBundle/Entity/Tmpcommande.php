<?php

namespace WSServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tmpcommande
 *
 * @ORM\Table(name="tmpcommande")
 * @ORM\Entity
 */
class Tmpcommande
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_commande", type="datetime", nullable=false)
     */
    private $dateCommande;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_client", type="integer", nullable=false)
     */
    private $idClient;

    /**
     * @var string
     *
     * @ORM\Column(name="code_commande", type="string", length=20, nullable=false)
     */
    private $codeCommande;

    /**
     * @var string
     *
     * @ORM\Column(name="telclient", type="string", length=50, nullable=false)
     */
    private $telclient;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomclient", type="string", length=50, nullable=false)
     */
    private $prenomclient;

    /**
     * @var string
     *
     * @ORM\Column(name="nomclient", type="string", length=50, nullable=false)
     */
    private $nomclient;

    /**
     * @var integer
     *
     * @ORM\Column(name="mntcmd", type="integer", nullable=false)
     */
    private $mntcmd;

    /**
     * @var string
     *
     * @ORM\Column(name="ordered_articles", type="string", length=5000, nullable=false)
     */
    private $orderedArticles;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set dateCommande
     *
     * @param \DateTime $dateCommande
     *
     * @return Tmpcommande
     */
    public function setDateCommande($dateCommande)
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    /**
     * Get dateCommande
     *
     * @return \DateTime
     */
    public function getDateCommande()
    {
        return $this->dateCommande;
    }

    /**
     * Set idClient
     *
     * @param integer $idClient
     *
     * @return Tmpcommande
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

    /**
     * Set codeCommande
     *
     * @param string $codeCommande
     *
     * @return Tmpcommande
     */
    public function setCodeCommande($codeCommande)
    {
        $this->codeCommande = $codeCommande;

        return $this;
    }

    /**
     * Get codeCommande
     *
     * @return string
     */
    public function getCodeCommande()
    {
        return $this->codeCommande;
    }

    /**
     * Set telclient
     *
     * @param string $telclient
     *
     * @return Tmpcommande
     */
    public function setTelclient($telclient)
    {
        $this->telclient = $telclient;

        return $this;
    }

    /**
     * Get telclient
     *
     * @return string
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
     * @return Tmpcommande
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
     * @return Tmpcommande
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
     * Set mntcmd
     *
     * @param integer $mntcmd
     *
     * @return Tmpcommande
     */
    public function setMntcmd($mntcmd)
    {
        $this->mntcmd = $mntcmd;

        return $this;
    }

    /**
     * Get mntcmd
     *
     * @return integer
     */
    public function getMntcmd()
    {
        return $this->mntcmd;
    }

    /**
     * Set orderedArticles
     *
     * @param string $orderedArticles
     *
     * @return Tmpcommande
     */
    public function setOrderedArticles($orderedArticles)
    {
        $this->orderedArticles = $orderedArticles;

        return $this;
    }

    /**
     * Get orderedArticles
     *
     * @return string
     */
    public function getOrderedArticles()
    {
        return $this->orderedArticles;
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
