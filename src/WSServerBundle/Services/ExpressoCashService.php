<?php

namespace WSServerBundle\Services;

class ExpressoCashService
{

  private $em;
  private $expressocashClient;

  public function __construct(\Doctrine\ORM\EntityManager $entityManager, \WSClientBundle\Services\ExpressoCashService $expressocashClientService)
  {
    $this->em = $entityManager;
    $this->expressocashClient = $expressocashClientService;
  }

    
  function cashin($params)
  {
    $result = $this->expressocashClient->cashin($params);
    return ''. json_encode($result);
  }

  function cashout($params)
  {
    $result = $this->expressocashClient->cashout($params);
    return ''. json_encode($result);
  }

  function topup($params)
  {
    $result = $this->expressocashClient->topup($params);
    return ''. json_encode($result);
  }

  function checkbalance($params)
  {
    $result = $this->expressocashClient->checkbalance($params);
    return ''. json_encode($result);
  }


}