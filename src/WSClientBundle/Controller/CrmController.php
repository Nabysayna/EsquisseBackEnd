<?php

namespace WSClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


class CrmController extends Controller
{
    private $client = null;
    function __construct(){
        $this->client = new \nusoap_client('http://localhost:8888/EsquisseBackEnd/web/app_dev.php/invest/crm?wsdl', true);
    }


    public function portefeuilleAction()
    {
        $params = array('token' => '75ee5c59e68e2efab0a629b9a2cf0b62d9b9a70c');
        $result = $this->client->call('portefeuille', $params);
        return new JsonResponse(array('result' => $result));
    }

    public function relanceAction()
    {
        $params = array('token' => 'c7156ea5fb7e3dcbd00ac3de1d3fdd26f291c760');
        $result = $this->client->call('relance', $params);
        return new JsonResponse(array('result' => $result));
    }

    public function promotionAction()
    {
        $params = array('token' => '75ee5c59e68e2efab0a629b9a2cf0b62d9b9a70c');
        $result = $this->client->call('promotion', $params);
        return new JsonResponse(array('result' => $result));
    }

     public function prospectionAction()
    {
        $params = array('token' => '75ee5c59e68e2efab0a629b9a2cf0b62d9b9a70c');
        $result = $this->client->call('prospection', $params);
        return new JsonResponse(array('result' => $result));
    }

    public function suivicommandeAction()
    {
        $params = array('token' => '930c008643aad959e33f9d94c5e7e3e388e6fa94');
        $result = $this->client->call('suivicommande', $params);
        return new JsonResponse(array('result' => $result));
    }

    
    public function servicepointAction()
    {
        $params = array('token' => '3fea65929f0e36ac15d4c35ead4084115c89864f');
        $result = $this->client->call('servicepoint', $params);
        return new JsonResponse(array('result' => $result));
    }

}