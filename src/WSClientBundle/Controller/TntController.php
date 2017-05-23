<?php

namespace WSClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


class TntController extends Controller
{
    private $client = null;
    function __construct(){
        $this->client = new \nusoap_client('http://localhost/dev-bbsinvest-plateform/EsquisseBackEnd/web/app_dev.php/invest/tnt?wsdl', true);
    }

    public function listabonnementAction()
    {
        $params = array('api' => 1, 'token' => 'assaneka');
        $result = $this->client->call('listabonnement', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

   

}