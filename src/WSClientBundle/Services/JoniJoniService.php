<?php

namespace WSClientBundle\Services;

class JoniJoniService
{

    // private $client = null;
    // private $token_api = 'postcash';
    // private $marchand = 546;
    // private $keyMarchand = '37e231cce92babd1c4fb7731632bfbf80a238b7a';
    
    public function __construct()
    {
        // $this->client = new \nusoap_client('http://abonnement.bbstvnet.com/wsclient/index.php?wsdl', true);
    }

    // Define the method as a PHP function
    function cashtocash_getcommissionsttc($params) {
      $reponse = array( 'result' => "test cashtocash_getcommissionsttc" );
      return $reponse;
    }

    // Define the method as a PHP function
    function cashtocash_sendtransaction($params) {

        $reponse = array( 'result' => "test cashtocash_sendtransaction" );
        return $reponse;
    }
    
    // Define the method as a PHP function
    function cashtocash_checktransactioncode($params) {

        $reponse = array( 'result' => "test cashtocash_checktransactioncode" );
        return $reponse;
    }
    // Define the method as a PHP function
    function cashtocash_paytransaction($params) {

        $reponse = array( 'result' => "test cashtocash_paytransaction" );
        return $reponse;
    }
    // Define the method as a PHP function
    function cashtocash_canceltransaction($params) {

        $reponse = array( 'result' => "test cashtocash_canceltransaction" );
        return $reponse;
    }
    // Define the method as a PHP function
    function vitfe_getinfocomptevitfe($params) {

        $reponse = array( 'result' => "test vitfe_getinfocomptevitfe" );
        return $reponse;
    }
    // Define the method as a PHP function
    function vitfe_getcommissionsttcvitfe($params) {

        $reponse = array( 'result' => "test vitfe_getcommissionsttcvitfe" );
        return $reponse;
    }
    // Define the method as a PHP function
    function vitfe_approcompte($params) {

        $reponse = array( 'result' => "test vitfe_approcompte" );
        return $reponse;
    }
    // Define the method as a PHP function
    function monetique_getinfocarte($params) {

        $reponse = array( 'result' => "test monetique_getinfocarte" );
        return $reponse;
    }
    // Define the method as a PHP function
    function monetique_getcommissionsttccarte($params) {

        $reponse = array( 'result' => "test monetique_getcommissionsttccarte" );
        return $reponse;
    }
    // Define the method as a PHP function
    function monetique_rechargecarte($params) {

        $reponse = array( 'result' => "test monetique_rechargecarte" );
        return $reponse;
    }


}
