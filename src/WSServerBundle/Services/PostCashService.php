<?php

namespace WSServerBundle\Services;

use WSServerBundle\Entity\Postcash;
use WSServerBundle\Entity\Authorizedsessions;


class PostCashService
{

  private $em;
  private $postCashClient;

  public function __construct(\Doctrine\ORM\EntityManager $entityManager, \WSClientBundle\Services\PostCashService $postCashClientService)
  {
    $this->em = $entityManager;
    $this->postCashClient = $postCashClientService;
  }

  function getcardusername($params)
  {
    $result = $this->postCashClient->getcardusername($params);
    return $result;
  }

  function getfraispartenaire($params)
  {
    $result = $this->postCashClient->getfraispartenaire($params);
    return $result;
  }

  function rechargementespece($params)
  {
    $result = $this->postCashClient->rechargementespece($params);
    return $result;
  }

  function retraitespece($params)
  {
    $result = $this->postCashClient->retraitespece($params);
    return $result;
  }

  function debitercarte($params)
  {
    $result = $this->postCashClient->debitercarte($params);
    return $result;
  }

  function debitcartedirect($params)
  {
    $result = $this->postCashClient->debitcartedirect($params);
    return $result;
  }

  function codevalidation($params)
  {
    $result = $this->postCashClient->codevalidation($params);
    return $result;
  }

  function achatcodewoyofal($params)
  {
    $result = $this->postCashClient->achatcodewoyofal($params);
    return $result;
  }

  function reglementsenelec($params)
  {
    $result = $this->postCashClient->reglementsenelec($params);
    return $result;
  }

  function detailfacturesenelec($params)
  {
    $result = $this->postCashClient->detailfacturesenelec($params);
    return $result;
  }

  function achatneo($params)
  {
    $result = $this->postCashClient->achatneo($params);
    return $result;
  }

  function achatjula($params)
  {
    $result = $this->postCashClient->achatjula($params);
    return $result;
  }

  function getinfosnumber($params)
  {
    $result = $this->postCashClient->getinfosnumber($params);
    return $result;
  }

  function getinfosnumberap($params)
  {
    $result = $this->postCashClient->getinfosnumberap($params);
    return $result;
  }

  function achatcredittelephonique($params)
  {
    $result = $this->postCashClient->achatcredittelephonique($params);
    return $result;
  }

  function cashtocashsend($params)
  {
    $result = $this->postCashClient->cashtocashsend($params);
    return $result;
  }

  function cashtocashreceive($params)
  {
    $result = $this->postCashClient->cashtocashreceive($params);
    return $result;
  }

  function transfertverstamtam($params)
  {
    $result = $this->postCashClient->transfertverstamtam($params);
    return $result;
  }

  function consultersoldeneo($params)
  {
    $result = $this->postCashClient->consultersoldeneo($params);
    return $result;
  }

  function debitercompteneo($params)
  {
    $result = $this->postCashClient->debitercompteneo($params);
    return $result;
  }

  function saveachatneo($params)
  {
    $result = $this->postCashClient->saveachatneo($params);
    return $result;
  }

  function transfertverstamtamviaapay($params)
  {
    $result = $this->postCashClient->transfertverstamtamviaapay($params);
    return $result;
  }

  function fraistamtamviaapay($params)
  {
    $result = $this->postCashClient->fraistamtamviaapay($params);
    return $result;
  }

  function histotransactmarchand($params)
  {
    $result = $this->postCashClient->histotransactmarchand($params);
    return $result;
  }
  

}

