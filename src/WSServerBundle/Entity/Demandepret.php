<?php

namespace WSServerBundle\Entity;

/**
 * Demandepret
 */
class Demandepret
{
    /**
     * @var integer
     */
    private $idUser;

    /**
     * @var integer
     */
    private $dependsOn;

    /**
     * @var string
     */
    private $nomdemandeur;

    /**
     * @var string
     */
    private $prenomdemandeur;

    /**
     * @var string
     */
    private $adresse;

    /**
     * @var integer
     */
    private $montantdemande;

    /**
     * @var integer
     */
    private $plafond;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return Demandepret
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
     * Set dependsOn
     *
     * @param integer $dependsOn
     *
     * @return Demandepret
     */
    public function setDependsOn($dependsOn)
    {
        $this->dependsOn = $dependsOn;

        return $this;
    }

    /**
     * Get dependsOn
     *
     * @return integer
     */
    public function getDependsOn()
    {
        return $this->dependsOn;
    }

    /**
     * Set nomdemandeur
     *
     * @param string $nomdemandeur
     *
     * @return Demandepret
     */
    public function setNomdemandeur($nomdemandeur)
    {
        $this->nomdemandeur = $nomdemandeur;

        return $this;
    }

    /**
     * Get nomdemandeur
     *
     * @return string
     */
    public function getNomdemandeur()
    {
        return $this->nomdemandeur;
    }

    /**
     * Set prenomdemandeur
     *
     * @param string $prenomdemandeur
     *
     * @return Demandepret
     */
    public function setPrenomdemandeur($prenomdemandeur)
    {
        $this->prenomdemandeur = $prenomdemandeur;

        return $this;
    }

    /**
     * Get prenomdemandeur
     *
     * @return string
     */
    public function getPrenomdemandeur()
    {
        return $this->prenomdemandeur;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Demandepret
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
     * Set montantdemande
     *
     * @param integer $montantdemande
     *
     * @return Demandepret
     */
    public function setMontantdemande($montantdemande)
    {
        $this->montantdemande = $montantdemande;

        return $this;
    }

    /**
     * Get montantdemande
     *
     * @return integer
     */
    public function getMontantdemande()
    {
        return $this->montantdemande;
    }

    /**
     * Set plafond
     *
     * @param integer $plafond
     *
     * @return Demandepret
     */
    public function setPlafond($plafond)
    {
        $this->plafond = $plafond;

        return $this;
    }

    /**
     * Get plafond
     *
     * @return integer
     */
    public function getPlafond()
    {
        return $this->plafond;
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

