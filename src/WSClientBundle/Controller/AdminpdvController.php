<?php

namespace WSClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


class AdminpdvController extends Controller
{
    private $client = null;
    function __construct(){
        $this->client = new \nusoap_client('http://localhost/dev-bbsinvest-plateform/EsquisseBackEnd/web/app_dev.php/invest/adminpdv?wsdl', true);
    }

    public function montanttransfertserviceAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'type' =>  '65443');
        $result = $this->client->call('montanttransfertservice', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    
    

}