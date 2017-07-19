<?php

namespace WSServerBundle\Entity;

/**
 * Wari
 */
class Wari
{
    /**
     * @var integer
     */
    private $iduser;

    /**
     * @var string
     */
    private $typeoperation;

    /**
     * @var string
     */
    private $infosoperation;

    /**
     * @var \DateTime
     */
    private $dateOperation;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set iduser
     *
     * @param integer $iduser
     *
     * @return Wari
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
     * @return Wari
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
     * @return Wari
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
     * @return Wari
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
}
