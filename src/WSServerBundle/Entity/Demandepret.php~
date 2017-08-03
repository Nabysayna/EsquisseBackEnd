<?php

namespace WSServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Demandepret
 *
 * @ORM\Table(name="demandepret")
 * @ORM\Entity
 */
class Demandepret
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     */
    private $idUser;

    /**
     * @var integer
     *
     * @ORM\Column(name="depends_on", type="integer", nullable=false)
     */
    private $dependsOn;

    /**
     * @var integer
     *
     * @ORM\Column(name="montantdemande", type="integer", nullable=false)
     */
    private $montantdemande;

    /**
     * @var integer
     *
     * @ORM\Column(name="plafond", type="integer", nullable=false)
     */
    private $plafond;

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
