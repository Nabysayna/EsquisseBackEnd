<?php

namespace WSServerBundle\Services;

class TntService
{

    public function __construct()
    {

    }

    function verifinumeroabonnement($params)
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
  
  function ajoutabonnement($params)
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

        return $reponse;
    }

  function listabonnement($params)
    {
        $reponse = array(
          'api' => 1,
          'token' => 'as12',
          'Status' => 1,
          'prenom' => '0123',
          'nom' => '0123',
          'telephone' => 0123,
          'adresse' => '456.0',
          'departement' => '0123',
          'region' => '123',
          'cni' => 789,
          'numerochip' => 0123,
          'numerocarte' => 0123,
          'nombredemois' => 123,
          'typedebouquet' => '123'
        );

        return ''. json_encode($reponse);
    }


}