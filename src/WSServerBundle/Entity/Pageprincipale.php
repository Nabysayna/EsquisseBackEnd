<?php

namespace WSServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pageprincipale
 *
 * @ORM\Table(name="pageprincipale")
 * @ORM\Entity
 */
class Pageprincipale
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="designation", type="string", length=30, nullable=false)
     */
    private $designation;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="prix", type="integer", nullable=false)
     */
    private $prix;

    /**
     * @var integer
     *
     * @ORM\Column(name="stock", type="integer", nullable=false)
     */
    private $stock;

    /**
     * @var string
     *
     * @ORM\Column(name="img_link", type="string", length=255, nullable=false)
     */
    private $imgLink;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout", type="datetime", nullable=false)
     */
    private $dateAjout;

    /**
     * @var integer
     *
     * @ORM\Column(name="idcategorie", type="integer", nullable=true)
     */
    private $idcategorie;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=255, nullable=false)
     */
    private $categorie;

    /**
     * @var integer
     *
     * @ORM\Column(name="avis", type="integer", nullable=true)
     */
    private $avis;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbreavis", type="integer", nullable=false)
     */
    private $nbreavis;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=300, nullable=false)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="couleur", type="string", length=20, nullable=false)
     */
    private $couleur;

    /**
     * @var integer
     *
     * @ORM\Column(name="taille", type="integer", nullable=false)
     */
    private $taille;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return Pageprincipale
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
     * Set designation
     *
     * @param string $designation
     *
     * @return Pageprincipale
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get designation
     *
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Pageprincipale
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set prix
     *
     * @param integer $prix
     *
     * @return Pageprincipale
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return integer
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     *
     * @return Pageprincipale
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return integer
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set imgLink
     *
     * @param string $imgLink
     *
     * @return Pageprincipale
     */
    public function setImgLink($imgLink)
    {
        $this->imgLink = $imgLink;

        return $this;
    }

    /**
     * Get imgLink
     *
     * @return string
     */
    public function getImgLink()
    {
        return $this->imgLink;
    }

    /**
     * Set dateAjout
     *
     * @param \DateTime $dateAjout
     *
     * @return Pageprincipale
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
     * Set idcategorie
     *
     * @param integer $idcategorie
     *
     * @return Pageprincipale
     */
    public function setIdcategorie($idcategorie)
    {
        $this->idcategorie = $idcategorie;

        return $this;
    }

    /**
     * Get idcategorie
     *
     * @return integer
     */
    public function getIdcategorie()
    {
        return $this->idcategorie;
    }

    /**
     * Set categorie
     *
     * @param string $categorie
     *
     * @return Pageprincipale
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
     * Set avis
     *
     * @param integer $avis
     *
     * @return Pageprincipale
     */
    public function setAvis($avis)
    {
        $this->avis = $avis;

        return $this;
    }

    /**
     * Get avis
     *
     * @return integer
     */
    public function getAvis()
    {
        return $this->avis;
    }

    /**
     * Set nbreavis
     *
     * @param integer $nbreavis
     *
     * @return Pageprincipale
     */
    public function setNbreavis($nbreavis)
    {
        $this->nbreavis = $nbreavis;

        return $this;
    }

    /**
     * Get nbreavis
     *
     * @return integer
     */
    public function getNbreavis()
    {
        return $this->nbreavis;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Pageprincipale
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set couleur
     *
     * @param string $couleur
     *
     * @return Pageprincipale
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get couleur
     *
     * @return string
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * Set taille
     *
     * @param integer $taille
     *
     * @return Pageprincipale
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;

        return $this;
    }

    /**
     * Get taille
     *
     * @return integer
     */
    public function getTaille()
    {
        return $this->taille;
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
