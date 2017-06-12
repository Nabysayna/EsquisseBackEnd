<?php

namespace WSServerBundle\Services;

class JoniJoniService
{

  private $em;
  private $jonijoniClient;

  public function __construct(\Doctrine\ORM\EntityManager $entityManager, \WSClientBundle\Services\JoniJoniService $jonijoniClientService)
  {
    $this->em = $entityManager;
    $this->jonijoniClient = $jonijoniClientService;
  }

    
  function cashtocash_getcommissionsttc($params)
  {
    $result = $this->jonijoniClient->cashtocash_getcommissionsttc($params);
    return ''. json_encode($result);
  }

  function cashtocash_sendtransaction($params) {

    $result = $this->jonijoniClient->cashtocash_sendtransaction($params);
    return ''. json_encode($result);
  }
  
  function cashtocash_checktransactioncode($params) {

    $result = $this->jonijoniClient->cashtocash_checktransactioncode($params);
    return ''. json_encode($result);
  }

  function cashtocash_paytransaction($params) {

    $result = $this->jonijoniClient->cashtocash_paytransaction($params);
    return ''. json_encode($result);
  }

  function cashtocash_canceltransaction($params) {

    $result = $this->jonijoniClient->cashtocash_canceltransaction($params);
    return ''. json_encode($result);
  }

  function vitfe_getinfocomptevitfe($params) {

    $result = $this->jonijoniClient->vitfe_getinfocomptevitfe($params);
    return ''. json_encode($result);
  }

  function vitfe_getcommissionsttcvitfe($params) {

    $result = $this->jonijoniClient->vitfe_getcommissionsttcvitfe($params);
    return ''. json_encode($result);
  }

  function vitfe_approcompte($params) {

    $result = $this->jonijoniClient->vitfe_approcompte($params);
    return ''. json_encode($result);
  }

  function monetique_getinfocarte($params) {

    $result = $this->jonijoniClient->monetique_getinfocarte($params);
    return ''. json_encode($result);
  }

  function monetique_getcommissionsttccarte($params) {

    $result = $this->jonijoniClient->monetique_getcommissionsttccarte($params);
    return ''. json_encode($result);
  }

  function monetique_rechargecarte($params) {

    $result = $this->jonijoniClient->monetique_rechargecarte($params);
    return ''. json_encode($result);
  }


}