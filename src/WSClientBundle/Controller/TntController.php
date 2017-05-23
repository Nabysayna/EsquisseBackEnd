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

    public function listabonnementAction()
    {
        $params = array('api' => 1, 'token' => 'assaneka');
        $result = $this->client->call('listabonnement', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

   

}