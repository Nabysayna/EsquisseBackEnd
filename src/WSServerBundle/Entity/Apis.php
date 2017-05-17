<?php

namespace WSServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Apis
 *
 * @ORM\Table(name="apis")
 * @ORM\Entity
 */
class Apis
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom_api", type="string", length=50, nullable=false)
     */
    private $nomApi;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_api", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idApi;



    /**
     * Set nomApi
     *
     * @param string $nomApi
     *
     * @return Apis
     */
    public function setNomApi($nomApi)
    {
        $this->nomApi = $nomApi;

        return $this;
    }

    /**
     * Get nomApi
     *
     * @return string
     */
    public function getNomApi()
    {
        return $this->nomApi;
    }

    /**
     * Get idApi
     *
     * @return integer
     */
    public function getIdApi()
    {
        return $this->idApi;
    }
}
