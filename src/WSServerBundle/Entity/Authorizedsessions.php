<?php

namespace WSServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Authorizedsessions
 *
 * @ORM\Table(name="authorizedsessions", uniqueConstraints={@ORM\UniqueConstraint(name="token", columns={"token"})})
 * @ORM\Entity
 */
class Authorizedsessions
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
     * @ORM\Column(name="accessLevel", type="integer", nullable=false)
     */
    private $accesslevel;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=80, nullable=false)
     */
    private $token;

    /**
     * @var string
     *
     * @ORM\Column(name="authorized_apis", type="string", length=80, nullable=false)
     */
    private $authorizedApis;

    /**
     * @var integer
     *
     * @ORM\Column(name="depends_on", type="integer", nullable=false)
     */
    private $dependsOn = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="session_start", type="datetime", nullable=false)
     */
    private $sessionStart;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_session", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSession;



    public function __construct()
    {
        // Par défaut, la sessionStart de l'Authorizedsessions est la date d'aujourd'hui
        $this->sessionStart = new \Datetime();
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
     * @return integer
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set accesslevel
     *
     * @param integer $accesslevel
     *
     * @return Authorizedsessions
     */
    public function setAccesslevel($accesslevel)
    {
        $this->accesslevel = $accesslevel;

        return $this;
    }

    /**
     * Get accesslevel
     *
     * @return integer
     */
    public function getAccesslevel()
    {
        return $this->accesslevel;
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
     * @return integer
     */
    public function getDependsOn()
    {
        return $this->dependsOn;
    }

    /**
     * Set sessionStart
     *
     * @param \DateTime $sessionStart
     *
     * @return Authorizedsessions
     */
    public function setSessionStart($sessionStart)
    {
        $this->sessionStart = $sessionStart;

        return $this;
    }

    /**
     * Get sessionStart
     *
     * @return \DateTime
     */
    public function getSessionStart()
    {
        return $this->sessionStart;
    }

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
