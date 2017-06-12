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
     * @ORM\Column(name="pourvoyeur", type="integer", nullable=false)
     */
    private $pourvoyeur;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer", nullable=false)
     */
    private $quantite;

    /**
     * @var string
     *
     * @ORM\Column(name="fullname", type="string", length=255, nullable=false)
     */
    private $fullname;

    /**
     * @var integer
     *
     * @ORM\Column(name="tel", type="bigint", nullable=false)
     */
    private $tel;

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
    private $fourni;

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
     * Set fullname
     *
     * @param string $fullname
     *
     * @return Commandes
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;

        return $this;
    }

    /**
     * Get fullname
     *
     * @return string
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * Set tel
     *
     * @param integer $tel
     *
     * @return Commandes
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return integer
     */
    public function getTel()
    {
        return $this->tel;
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
