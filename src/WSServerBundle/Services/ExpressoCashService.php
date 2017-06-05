<?php

namespace WSServerBundle\Services;

class ExpressoCashService
{

    public function __construct()
    {

    }

    function cashin($params)
    {
        $reponse = array(
          'api' => 1,
          'token' => 'as12',
          'Status' => 1,
          'description' => '0123',
          'message' => '789',
          'destinationBalance' => 456.0,
          'referenceID' => '123',
          'hashValue' => '123'
        );

        return ''. json_encode($reponse);
    }
  
  function cashout($params)
    {
        $reponse = array(
          'api' => 1,
          'token' => 'as12',
          'Status' => 1,
          'description' => '0123',
          'message' => '789',
          'referenceID' => '123',
          'hashValue' => '123'
        );

        return ''. json_encode($reponse);
    }

  function topup($params)
    {
        $reponse = array(
          'api' => 1,
          'token' => 'as12',
          'Status' => 1,
          'description' => '0123',
          'message' => '789',
          'referenceID' => '123',
          'hashValue' => '123'
        );

        return ''. json_encode($reponse);
    }

  function checkbalance($params)
    {
        $reponse = array(
          'api' => 1,
          'token' => 'as12',
          'Status' => 1,
          'description' => '0123',
          'message' => '0123',
          'firstname' => '0123',
          'lastname' => '0123',
          'hashValue' => '0123'
        );

        return ''. json_encode($reponse);
    }







}