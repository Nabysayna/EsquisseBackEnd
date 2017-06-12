<?php

namespace WSClientBundle\Services;

class ExpressoCashService
{

    // private $client = null;
    // private $token_api = 'postcash';
    // private $marchand = 546;
    // private $keyMarchand = '37e231cce92babd1c4fb7731632bfbf80a238b7a';
    
    public function __construct()
    {
        // $this->client = new \nusoap_client('http://abonnement.bbstvnet.com/wsclient/index.php?wsdl', true);
    }


    
    function cashin($params)
    {
        $reponse = array(
          'Status' => 1,
          'description' => '0123',
          'message' => '789',
          'destinationBalance' => 456.0,
          'referenceID' => '123',
          'hashValue' => '123'
        );

        return $reponse;
    }

    function cashout($params)
    {
        $reponse = array(
          'Status' => 1,
          'description' => '0123',
          'message' => '789',
          'referenceID' => '123',
          'hashValue' => '123'
        );

        return $reponse;
    }

    function topup($params)
    {
        $reponse = array(
          'Status' => 1,
          'description' => '0123',
          'message' => '789',
          'referenceID' => '123',
          'hashValue' => '123'
        );

        return $reponse;
    }

    function checkbalance($params)
    {
        $reponse = array(
          'Status' => 1,
          'description' => '0123'
        );

        return $reponse;
    }


}
