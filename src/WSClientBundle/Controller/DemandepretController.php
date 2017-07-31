<?php

namespace WSClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


class DemandepretController extends Controller
{
    private $client = null;
    function __construct(){
        $this->client = new \nusoap_client('http://localhost:8888/EsquisseBackEnd/web/app_dev.php/invest/demandepret?wsdl', true);
    }


    public function demandepretAction()
    {
        $params = array('token' => '3fea65929f0e36ac15d4c35ead4084115c89864f');
        $result = $this->client->call('demandepret', $params);
        return new JsonResponse(array('result' => $result));
    }

    public function ajoutdemandepretAction()
        {
            $params = array('token' => '3fea65929f0e36ac15d4c35ead4084115c89864f');
            $result = $this->client->call('ajoutdemandepret', $params);
            return new JsonResponse(array('result' => $result));
        }
  
}