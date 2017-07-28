<?php

namespace WSClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


class ConsulterpretController extends Controller
{
    private $client = null;
    function __construct(){
        $this->client = new \nusoap_client('http://localhost:8888/EsquisseBackEnd/web/app_dev.php/invest/consulterpret?wsdl', true);
    }


    public function consulterpretAction()
    {
        $params = array('token' => '3fea65929f0e36ac15d4c35ead4084115c89864f');
        $result = $this->client->call('consulterpret', $params);
        return new JsonResponse(array('result' => $result));
    }

   
  
}