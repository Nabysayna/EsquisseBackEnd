<?php

namespace WSServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Postcash
 *
 * @ORM\Table(name="postcash")
 * @ORM\Entity
 */
class Postcash
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
     * @return Postcash
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
     * @return Postcash
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
     * @return Postcash
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
