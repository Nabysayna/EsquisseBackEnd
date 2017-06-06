<?php

namespace WSServerBundle\Services;

class PostCashService
{

    private $em;
    private $postCashClient;

  public function __construct(\Doctrine\ORM\EntityManager $entityManager, \WSClientBundle\Services\PostCashService $postCashClientService)
  {
    $this->em = $entityManager;
    $this->postCashClient = $postCashClientService;
  }

  function rechargementespece($params)
    {
      $result = $this->postCashClient->rechargementespece($params);
      return ''. json_encode($result);

    }

  function retraitespece($params)
    {
        $result = $this->postCashClient->retraitespece($params);
      return ''. json_encode($result);

    }

function achatcodewoyofal($params)
    {
        $result = $this->postCashClient->achatcodewoyofal($params);
      return ''. json_encode($result);

    }

function reglementsenelec($params)
    {
        $result = $this->postCashClient->reglementsenelec($params);
      return ''. json_encode($result);

    }

function achatjula($params)
{
        $result = $this->postCashClient->achatjula($params);
      return ''. json_encode($result);

    }

function achatcredittelephonique($params)
{
        $result = $this->postCashClient->achatcredittelephonique($params);
      return ''. json_encode($result);

    }




}
