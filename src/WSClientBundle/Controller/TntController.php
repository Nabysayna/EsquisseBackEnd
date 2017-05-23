<?php

namespace WSClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


class TntController extends Controller
{
    private $client = null;
    function __construct(){
        $this->client = new \nusoap_client('http://abonnement.bbstvnet.com/integration-server-ws-tnt/index.php?wsdl', true);
    }

    public function verifinumeroabonnementAction()
    {
        $params = array('api' => 12, 'token' => 'bamba', 'numeroCarteChip' =>  '659071289');
        $result = $this->client->call('verifinumeroabonnement', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    
    public function listabonnementAction()
    {
        $params = array('api' => 1, 'token' => 'assaneka');
        $result = $this->client->call('listabonnement', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function ajoutabonnementAction()
    {

        $params = array('api' => 1, 'token' => 'assaneka', 'prenom' => 'assaneka', 'nom' => 'assaneka', 'telephone' => 'assaneka', 'adresse' => 'assaneka', 'departement' => 'assaneka', 'region' => 'assaneka', 'cni' => 'assaneka', 'numerochip' => 'assaneka', 'numerocarte' => 'assaneka', 'nombredemois' => 123, 'typedebouquet' => 'assaneka');
        $result = $this->client->call('ajoutabonnement', array('params' => $params));
        // $result = 'assane';
        return new JsonResponse(array('result' => $result));
    }

      

}