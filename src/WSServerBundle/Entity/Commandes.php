<?php

namespace WSServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commandes
 *
 * @ORM\Table(name="commandes")
 * @ORM\Entity
 */
class Commandes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_article", type="integer", nullable=false)
     */
    private $idArticle;

    /**
     * @var integer
     *
     * @ORM\Column(name="commanditaire", type="integer", nullable=false)
     */
    private $commanditaire;

    /**
     * @var integer
     *
     * @ORM\Column(name="pourvoyeur", type="integer", nullable=true)
     */
    private $pourvoyeur;

    /**
     * @var integer
     *
     * @ORM\Column(name="idclient", type="integer", nullable=false)
     */
    private $idclient;

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
     * @var string
     *
     * @ORM\Column(name="telephoneclient", type="string", length=50, nullable=false)
     */
    private $telephoneclient;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer", nullable=false)
     */
    private $quantite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_commande", type="datetime", nullable=false)
     */
    private $dateCommande;

    /**
     * @var integer
     *
     * @ORM\Column(name="fourni", type="integer", nullable=false)
     */
    private $fourni = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="livre", type="integer", nullable=false)
     */
    private $livre = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="recu", type="integer", nullable=false)
     */
    private $recu = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="codepayement", type="integer", nullable=false)
     */
    private $codepayement;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set idArticle
     *
     * @param integer $idArticle
     *
     * @return Commandes
     */
    public function setIdArticle($idArticle)
    {
        $this->idArticle = $idArticle;

        return $this;
    }

    /**
     * Get idArticle
     *
     * @return integer
     */
    public function getIdArticle()
    {
        return $this->idArticle;
    }

    /**
     * Set commanditaire
     *
     * @param integer $commanditaire
     *
     * @return Commandes
     */
    public function setCommanditaire($commanditaire)
    {
        $this->commanditaire = $commanditaire;

        return $this;
    }

    /**
     * Get commanditaire
     *
     * @return integer
     */
    public function getCommanditaire()
    {
        return $this->commanditaire;
    }

    /**
     * Set pourvoyeur
     *
     * @param integer $pourvoyeur
     *
     * @return Commandes
     */
    public function setPourvoyeur($pourvoyeur)
    {
        $this->pourvoyeur = $pourvoyeur;

        return $this;
    }

    /**
     * Get pourvoyeur
     *
     * @return integer
     */
    public function getPourvoyeur()
    {
        return $this->pourvoyeur;
    }

    /**
     * Set idclient
     *
     * @param integer $idclient
     *
     * @return Commandes
     */
    public function setIdclient($idclient)
    {
        $this->idclient = $idclient;

        return $this;
    }

    /**
     * Get idclient
     *
     * @return integer
     */
    public function getIdclient()
    {
        return $this->idclient;
    }

    /**
     * Set prenomclient
     *
     * @param string $prenomclient
     *
     * @return Commandes
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
     * @return Commandes
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
     * Set telephoneclient
     *
     * @param string $telephoneclient
     *
     * @return Commandes
     */
    public function setTelephoneclient($telephoneclient)
    {
        $this->telephoneclient = $telephoneclient;

        return $this;
    }

    /**
     * Get telephoneclient
     *
     * @return string
     */
    public function getTelephoneclient()
    {
        return $this->telephoneclient;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return Commandes
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set dateCommande
     *
     * @param \DateTime $dateCommande
     *
     * @return Commandes
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
     * Set fourni
     *
     * @param integer $fourni
     *
     * @return Commandes
     */
    public function setFourni($fourni)
    {
        $this->fourni = $fourni;

        return $this;
    }

    /**
     * Get fourni
     *
     * @return integer
     */
    public function getFourni()
    {
        return $this->fourni;
    }

    /**
     * Set livre
     *
     * @param integer $livre
     *
     * @return Commandes
     */
    public function setLivre($livre)
    {
        $this->livre = $livre;

        return $this;
    }

    /**
     * Get livre
     *
     * @return integer
     */
    public function getLivre()
    {
        return $this->livre;
    }

    /**
     * Set recu
     *
     * @param integer $recu
     *
     * @return Commandes
     */
    public function setRecu($recu)
    {
        $this->recu = $recu;

        return $this;
    }

    /**
     * Get recu
     *
     * @return integer
     */
    public function getRecu()
    {
        return $this->recu;
    }

    /**
     * Set codepayement
     *
     * @param integer $codepayement
     *
     * @return Commandes
     */
    public function setCodepayement($codepayement)
    {
        $this->codepayement = $codepayement;

        return $this;
    }

    /**
     * Get codepayement
     *
     * @return integer
     */
    public function getCodepayement()
    {
        return $this->codepayement;
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
