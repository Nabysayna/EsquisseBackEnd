<?php

namespace WSServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tnt
 *
 * @ORM\Table(name="tnt")
 * @ORM\Entity
 */
class Tnt
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idUser", type="integer", nullable=false)
     */
    private $iduser;

    /**
     * @var string
     *
     * @ORM\Column(name="typeOperation", type="string", length=255, nullable=false)
     */
    private $typeoperation;

    /**
     * @var string
     *
     * @ORM\Column(name="infosOperation", type="string", length=255, nullable=false)
     */
    private $infosoperation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_operation", type="datetime", nullable=false)
     */
    private $dateOperation;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set iduser
     *
     * @param integer $iduser
     *
     * @return Tnt
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;

        return $this;
    }

    /**
     * Get iduser
     *
     * @return integer
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * Set typeoperation
     *
     * @param string $typeoperation
     *
     * @return Tnt
     */
    public function setTypeoperation($typeoperation)
    {
        $this->typeoperation = $typeoperation;

        return $this;
    }

    /**
     * Get typeoperation
     *
     * @return string
     */
    public function getTypeoperation()
    {
        return $this->typeoperation;
    }

    /**
     * Set infosoperation
     *
     * @param string $infosoperation
     *
     * @return Tnt
     */
    public function setInfosoperation($infosoperation)
    {
        $this->infosoperation = $infosoperation;

        return $this;
    }

    /**
     * Get infosoperation
     *
     * @return string
     */
    public function getInfosoperation()
    {
        return $this->infosoperation;
    }

    /**
     * Set dateOperation
     *
     * @param \DateTime $dateOperation
     *
     * @return Tnt
     */
    public function setDateOperation($dateOperation)
    {
        $this->dateOperation = $dateOperation;

        return $this;
    }

    /**
     * Get dateOperation
     *
     * @return \DateTime
     */
    public function getDateOperation()
    {
        return $this->dateOperation;
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
     * @var \DateTime
     */
    private $echeance;


    /**
     * Set echeance
     *
     * @param \DateTime $echeance
     *
     * @return Tnt
     */
    public function setEcheance($echeance)
    {
        $this->echeance = $echeance;

        return $this;
    }

    /**
     * Get echeance
     *
     * @return \DateTime
     */
    public function getEcheance()
    {
        return $this->echeance;
    }
    /**
     * @var integer
     */
    private $dependsOn;


    /**
     * Set dependsOn
     *
     * @param integer $dependsOn
     *
     * @return Tnt
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
}
