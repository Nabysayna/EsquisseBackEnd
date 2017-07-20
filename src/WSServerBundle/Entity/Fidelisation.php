<?php

namespace WSServerBundle\Entity;

/**
 * Fidelisation
 */
class Fidelisation
{
    /**
     * @var string
     */
    private $typeOperation;

    /**
     * @var integer
     */
    private $montant;

    /**
     * @var integer
     */
    private $nbrePoint;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set typeOperation
     *
     * @param string $typeOperation
     *
     * @return Fidelisation
     */
    public function setTypeOperation($typeOperation)
    {
        $this->typeOperation = $typeOperation;

        return $this;
    }

    /**
     * Get typeOperation
     *
     * @return string
     */
    public function getTypeOperation()
    {
        return $this->typeOperation;
    }

    /**
     * Set montant
     *
     * @param integer $montant
     *
     * @return Fidelisation
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
     * Set nbrePoint
     *
     * @param integer $nbrePoint
     *
     * @return Fidelisation
     */
    public function setNbrePoint($nbrePoint)
    {
        $this->nbrePoint = $nbrePoint;

        return $this;
    }

    /**
     * Get nbrePoint
     *
     * @return integer
     */
    public function getNbrePoint()
    {
        return $this->nbrePoint;
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
