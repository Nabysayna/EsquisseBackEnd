<?php

namespace WSClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


class OutsitEcommerceController extends Controller
{
    
    private $client = null;
    function __construct(){
        $this->client = new \nusoap_client('http://localhost/dev-bbsinvest-plateform/EsquisseBackEnd/web/app_dev.php/invest/outsitecommerce?wsdl', true);
    }

    public function listerarticleecomoutsiteAction()
    {
        $params = array('token' => 'assaneka', 'type' => "test");
        $result = $this->client->call('listerarticleecomoutsite', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }



}