<?php

namespace WSServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prerogative
 *
 * @ORM\Table(name="prerogatives")
 * @ORM\Entity(repositoryClass="WSServerBundle\Repository\PrerogativeRepository")
 */
class Prerogative
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_auth", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="id_user", type="integer")
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="authorized_apis", type="string", length=255)
     */
    private $authorizedApis;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return Prerogative
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return int
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
     * @return Prerogative
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
}

