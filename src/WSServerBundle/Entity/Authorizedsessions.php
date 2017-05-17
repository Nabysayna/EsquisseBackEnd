<?php

namespace WSServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Authorizedsessions
 *
 * @ORM\Table(name="authorizedsessions")
 * @ORM\Entity(repositoryClass="WSServerBundle\Repository\AuthorizedsessionsRepository")
 */
class Authorizedsessions
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_session", type="integer")
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
     * @var int
     *
     * @ORM\Column(name="accessLevel", type="integer")
     */
    private $accessLevel;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=255)
     */
    private $token;

    /**
     * @var string
     *
     * @ORM\Column(name="authorized_apis", type="string", length=255)
     */
    private $authorizedApis;

    /**
     * @var int
     *
     * @ORM\Column(name="depends_on", type="integer")
     */
    private $dependsOn;


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
     * @return Authorizedsessions
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
     * Set accessLevel
     *
     * @param integer $accessLevel
     *
     * @return Authorizedsessions
     */
    public function setAccessLevel($accessLevel)
    {
        $this->accessLevel = $accessLevel;

        return $this;
    }

    /**
     * Get accessLevel
     *
     * @return int
     */
    public function getAccessLevel()
    {
        return $this->accessLevel;
    }

    /**
     * Set token
     *
     * @param string $token
     *
     * @return Authorizedsessions
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set authorizedApis
     *
     * @param string $authorizedApis
     *
     * @return Authorizedsessions
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
     * Set dependsOn
     *
     * @param integer $dependsOn
     *
     * @return Authorizedsessions
     */
    public function setDependsOn($dependsOn)
    {
        $this->dependsOn = $dependsOn;

        return $this;
    }

    /**
     * Get dependsOn
     *
     * @return int
     */
    public function getDependsOn()
    {
        return $this->dependsOn;
    }
    /**
     * @var integer
     */
    private $accesslevel;

    /**
     * @var integer
     */
    private $idSession;


    /**
     * Get idSession
     *
     * @return integer
     */
    public function getIdSession()
    {
        return $this->idSession;
    }
}
