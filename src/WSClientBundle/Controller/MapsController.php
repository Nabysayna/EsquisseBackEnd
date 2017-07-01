<?php

namespace WSClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


class MapsController extends Controller
{
    private $client = null;
    function __construct(){
        $this->client = new \nusoap_client('http://localhost:8888/dev-bbsinvest-plateform/EsquisseBackEnd/web/app_dev.php/invest/maps?wsdl', true);
    }


    public function listmapsAction()
    {
        $params = array('token' => 'assaneka', 'type' => '12345678902');
        $result = $this->client->call('listmaps', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function listmapsdepartAction()
    {
        $params = array('token' => 'assaneka', 'type' => '12345678902');
        $result = $this->client->call('listmapsdepart', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function listmapspardepartAction()
    {
        $params = array('token' => 'assaneka', 'type' => 'Dakar');
        $result = $this->client->call('listmapspardepart', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }



}