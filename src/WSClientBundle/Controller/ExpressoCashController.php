<?php

namespace WSClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


class ExpressoCashController extends Controller
{
    private $client = null;
    function __construct(){
        $this->client = new \nusoap_client('http://localhost/dev-bbsinvest-plateform/EsquisseBackEnd/web/app_dev.php/invest/expressocash?wsdl', true);
    }

    public function checkbalanceAction()
    {
        $params = array(
            'api' => 1, 
            'token' => 'assaneka', 
            'clientID' => 'TEST _BANK',
            'clientPassword' => 'C1B5669733701269F11862510C93E932',
            'hashValue' => '9A1D2C5FD5B16EBD0184E0DE8108EB814635CDDC509999A922C4A4A267A7FCFB172B44D1D05AC536989
        903DC4E2EDAFBABAA57D08FAA674E65C4E136E5C7D4D4'
        );
        // $params = array('api' => 1, 'token' => 'assaneka', 'tel_destinataire' => 12, 'montant' => 'assaneka');
        $result = $this->client->call('checkbalance', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    // public function retraitespeceAction()
    // {
    //     $params = array('api' => 1, 'token' => 'assaneka', 'code_validation' => 123, 'police' => 'assaneka', 'num_facture' => 'assaneka');
    //     $result = $this->client->call('retraitespece', array('params' => $params));

    //     return new JsonResponse(array('result' => $result));
    // }

    // public function achatcodewoyofalAction()
    // {
    //     $params = array('api' => 1, 'token' => 'assaneka', 'montant' => 12345, 'compteur' => 'assaneka');
    //     $result = $this->client->call('achatcodewoyofal', array('params' => $params));

    //     return new JsonResponse(array('result' => $result));
    // }

    // public function reglementsenelecAction()
    // {
    //     $params = array('api' => 1, 'token' => 'assaneka', 'police' => 'assaneka', 'num_facture' => 'assaneka');
    //     $result = $this->client->call('reglementsenelec', array('params' => $params));

    //     return new JsonResponse(array('result' => $result));
    // }

    // public function achatjulaAction()
    // {
    //     $params = array('api' => 1, 'token' => 'assaneka', 'mt_carte' => 'assaneka', 'nb_carte' => 'assaneka');
    //     $result = $this->client->call('achatjula', array('params' => $params));

    //     return new JsonResponse(array('result' => $result));
    // }

    // public function achatcredittelephoniqueAction()
    // {
    //     $params = array('api' => 1, 'token' => 'assaneka', 'numero_a_recharger' => 'assaneka', 'montant' => 12345);
    //     $result = $this->client->call('achatjula', array('params' => $params));

    //     return new JsonResponse(array('result' => $result));
    // }


}