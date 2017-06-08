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
    return ''. json_encode($result);
  }

  function getfraispartenaire($params)
  {
    $result = $this->postCashClient->getfraispartenaire($params);
    return ''. json_encode($result);
  }

  function rechargementespece($params)
  {

    $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=> $params->token));

    if( empty($correspSession) ) {
      return ''.json_encode( array('errorCode' => 0, 'message' => 'Utilisateur non authentifié') ) ;
    }
    else{
      $result = $this->postCashClient->rechargementespece($params);
      if(json_decode($result)->response=="ok"){
        $postcashRecord = new Postcash();
        $postcashRecord->setIduser($correspSession->getIdUser());
        $postcashRecord->setTypeoperation("rechargementespece");
        $postcashRecord->setInfosoperation(''.json_encode($params));
        $postcashRecord->setDateOperation(new \Datetime());

        $this->em->persist($postcashRecord);
        $this->em->flush();
      }
      return ''. json_encode($result);; 
    }
  }


  function retraitespece($params)
  {
    $result = $this->postCashClient->retraitespece($params);
    return ''. json_encode($result);
  }

  function debitercarte($params)
  {
    $result = $this->postCashClient->debitercarte($params);
    return ''. json_encode($result);
  }

  function debitcartedirect($params)
  {
    $result = $this->postCashClient->debitcartedirect($params);
    return ''. json_encode($result);
  }

  function codevalidation($params)
  {
    $result = $this->postCashClient->codevalidation($params);
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

  function detailfacturesenelec($params)
  {
    $result = $this->postCashClient->detailfacturesenelec($params);
    return ''. json_encode($result);
  }

  function achatneo($params)
  {
    $result = $this->postCashClient->achatneo($params);
    return ''. json_encode($result);
  }

  function achatjula($params)
  {
    $result = $this->postCashClient->achatjula($params);
    return ''. json_encode($result);
  }

  function getinfosnumber($params)
  {
    $result = $this->postCashClient->getinfosnumber($params);
    return ''. json_encode($result);
  }

  function getinfosnumberap($params)
  {
    $result = $this->postCashClient->getinfosnumberap($params);
    return ''. json_encode($result);
  }

  function achatcredittelephonique($params)
  {
    $result = $this->postCashClient->achatcredittelephonique($params);
    return ''. json_encode($result);
  }

  function cashtocashsend($params)
  {
    $result = $this->postCashClient->cashtocashsend($params);
    return ''. json_encode($result);
  }

  function cashtocashreceive($params)
  {
    $result = $this->postCashClient->cashtocashreceive($params);
    return ''. json_encode($result);
  }

  function transfertverstamtam($params)
  {
    $result = $this->postCashClient->transfertverstamtam($params);
    return ''. json_encode($result);
  }

  function consultersoldeneo($params)
  {
    $result = $this->postCashClient->consultersoldeneo($params);
    return ''. json_encode($result);
  }

  function debitercompteneo($params)
  {
    $result = $this->postCashClient->debitercompteneo($params);
    return ''. json_encode($result);
  }

  function saveachatneo($params)
  {
    $result = $this->postCashClient->saveachatneo($params);
    return ''. json_encode($result);
  }

  function transfertverstamtamviaapay($params)
  {
    $result = $this->postCashClient->transfertverstamtamviaapay($params);
    return ''. json_encode($result);
  }

  function fraistamtamviaapay($params)
  {
    $result = $this->postCashClient->fraistamtamviaapay($params);
    return ''. json_encode($result);
  }

  function histotransactmarchand($params)
  {
    $result = $this->postCashClient->histotransactmarchand($params);
    return ''. json_encode($result);
  }
  

}
