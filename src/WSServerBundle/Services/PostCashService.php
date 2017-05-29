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
        $reponse = array(
          'errorCode' => 1,
          'errorMessage' => 'as12',
          'result' => 1,
          'commission' => 0123,
          'montant_facture' => 789,
          'trasnaction' => 'qwerty',
          'motant_facial' => 456,
          'montant_reel' => 123
        );

        return ''. json_encode($reponse);
    }

function achatcodewoyofal($params)
    {
        $reponse = array(
          'errorCode' => 1,
          'errorMessage' => 'as12',
          'result' => 1,
          'commission' => 0123,
          'montant_facture' => 789,
          'trasnaction' => 'qwerty',
          'motant_facial' => 456,
          'montant_reel' => 123
        );

        return ''. json_encode($reponse);
    }

function reglementsenelec($params)
    {
        $reponse = array(
          'errorCode' => 1,
          'errorMessage' => 'as12',
          'result' => 1,
          'commission' => 0123,
          'montant_facture' => 789,
          'trasnaction' => 'qwerty',
          'motant_facial' => 456,
          'montant_reel' => 123
        );

        return ''. json_encode($reponse);
    }

function achatjula($params)
{
        $reponse = array(
          'errorCode' => 1,
          'errorMessage' => 'as12',
          'result' => 1,
          'commission' => 0123,
          'montant_facture' => 789,
          'trasnaction' => 'qwerty',
          'motant_facial' => 456,
          'montant_reel' => 123
        );

        return ''. json_encode($reponse);
    }

function achatcredittelephonique($params)
{
        $reponse = array(
          'errorCode' => 1,
          'errorMessage' => 'as12',
          'result' => 1,
          'commission' => 0123,
          'montant_facture' => 789,
          'trasnaction' => 'qwerty',
          'motant_facial' => 456,
          'montant_reel' => 123
        );

        return ''. json_encode($reponse);
    }




}
