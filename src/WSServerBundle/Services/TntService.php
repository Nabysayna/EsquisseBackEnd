<?php

namespace WSServerBundle\Services;


class TntService
{

    private $em;
    private $tntClient;

    public function __construct(\Doctrine\ORM\EntityManager $entityManager, \WSClientBundle\Services\TntService $tntClientService)
    {
      $this->em = $entityManager;
      $this->tntClient = $tntClientService;

    }

    function verifinumeroabonnement($params)
    {
      $result = $this->tntClient->verifinumeroabonnement($params);
      return $result;
    }
  
    function ajoutabonnement($params)
    {
      $result = $this->tntClient->ajoutabonnement($params);
      return $result;
    }

    function listabonnement($params)
    {
        $result = $this->tntClient->listabonnement($params);

        return $result;
    }


}