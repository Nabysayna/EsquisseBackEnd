<?php

namespace WSServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prerogatives
 *
 * @ORM\Table(name="prerogatives")
 * @ORM\Entity
 */
class Prerogatives
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
     * @ORM\Column(name="authorized_apis", type="string", length=80, nullable=false)
     */
    private $authorizedApis;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout", type="datetime", nullable=false)
     */
    private $dateAjout;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_auth", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAuth;



    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return Prerogatives
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
     * Set authorizedApis
     *
     * @param string $authorizedApis
     *
     * @return Prerogatives
     */
    public function setAuthorizedApis($authorizedApis)
    {
        $this->authorizedApis = $authorizedApis;

        return $this;
    }

    /**
     * Get authorizedApis
     *
     * @return string
     */
    public function getAuthorizedApis()
    {
        return $this->authorizedApis;
    }

    /**
     * Set dateAjout
     *
     * @param \DateTime $dateAjout
     *
     * @return Prerogatives
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
     * Get idAuth
     *
     * @return integer
     */
    public function getIdAuth()
    {
        return $this->idAuth;
    }
}
