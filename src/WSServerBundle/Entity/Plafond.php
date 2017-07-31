<?php

namespace WSServerBundle\Entity;

/**
 * Plafond
 */
class Plafond
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
     * @return Plafond
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
     * @return Plafond
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
     * Set plafond
     *
     * @param integer $plafond
     *
     * @return Plafond
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

