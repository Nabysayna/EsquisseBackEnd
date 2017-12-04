<?php

namespace WSServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fidelisation
 *
 * @ORM\Table(name="fidelisation")
 * @ORM\Entity
 */
class Fidelisation
{
    /**
     * @var string
     *
     * @ORM\Column(name="type_operation", type="string", length=40, nullable=false)
     */
    private $typeOperation;

    /**
     * @var integer
     *
     * @ORM\Column(name="montant", type="integer", nullable=false)
     */
    private $montant;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbre_point", type="integer", nullable=false)
     */
    private $nbrePoint;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
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
