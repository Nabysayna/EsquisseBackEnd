<?php

namespace WSClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


class CommercialController extends Controller
{
    private $client = null;
    function __construct(){
        $this->client = new \nusoap_client('http://localhost:8888/dev-bbsinvest-plateform/EsquisseBackEnd/web/app_dev.php/invest/commercial?wsdl', true);
    }


    public function listcoursierAction()
    {
        $params = array(
            'token' => 'assaneka', 
            'type' => '12345678902'
        );
        $result = $this->client->call('listcoursier', array('params' => $params));
        // $result = 'aert';
        return new JsonResponse(array('result' => $result));
    }

}