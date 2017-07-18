<?php

namespace WSServerBundle\Entity;

/**
 * NiouAkNioom
 */
class NiouAkNioom
{
    /**
     * @var integer
     */
    private $api;

    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $pwd;

    /**
     * @var integer
     */
    private $deposit;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set api
     *
     * @param integer $api
     *
     * @return NiouAkNioom
     */
    public function setApi($api)
    {
        $this->api = $api;

        return $this;
    }

    /**
     * Get api
     *
     * @return integer
     */
    public function getApi()
    {
        return $this->api;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return NiouAkNioom
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set pwd
     *
     * @param string $pwd
     *
     * @return NiouAkNioom
     */
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;

        return $this;
    }

    /**
     * Get pwd
     *
     * @return string
     */
    public function getPwd()
    {
        return $this->pwd;
    }

    /**
     * Set deposit
     *
     * @param integer $deposit
     *
     * @return NiouAkNioom
     */
    public function setDeposit($deposit)
    {
        $this->deposit = $deposit;

        return $this;
    }

    /**
     * Get deposit
     *
     * @return integer
     */
    public function getDeposit()
    {
        return $this->deposit;
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
