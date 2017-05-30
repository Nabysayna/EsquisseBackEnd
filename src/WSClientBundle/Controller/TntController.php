<?php

namespace WSClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


class TntController extends Controller
{
    private $client = null;
    function __construct(){
        $this->client = new \nusoap_client('http://localhost/EsquisseBackEnd/web/app_dev.php/invest/tnt?wsdl', true);
    }

    public function verifinumeroabonnementAction()
    {
        $params = array('token' => 'bamba', 'numeroCarteChip' =>  '00616241893');
        $result = $this->client->call('verifinumeroabonnement', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    
    public function listabonnementAction()
    {
        $params = array('token' => 'assaneka');
        $result = $this->client->call('listabonnement', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function ajoutabonnementAction()
    {
        $params = array('token' => 'acf5db804799448755b5b2fcb76bdaed0da6fbe2', 'prenom' => 'assaneka', 'nom' => 'assaneka', 'tel' => 'assaneka', 'adresse' => 'assaneka', 'region' => 'assaneka', 'city' => 'assaneka', 'cni' => 'assaneka', 'numerochip' => 'assaneka', 'numerocarte' => 'assaneka', 'duree' => 2, 'typedebouquet' => 1);
        $result = $this->client->call('ajoutabonnement', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }


}