<?php

namespace WSClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


class ComptapdvController extends Controller
{
    private $client = null;
    function __construct(){
        $this->client = new \nusoap_client('http://localhost/dev-bbsinvest-plateform/EsquisseBackEnd/web/app_dev.php/invest/comptapdv?wsdl', true);
    }

    public function totaloperationparapiAction()
    {
        $params = array('token' => 'assaneka', 'typeapi' => "test");
        $result = $this->client->call('totaloperationparapi', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function totalenvoiesparapiAction()
    {
        $params = array('token' => 'assaneka', 'typeapi' => "test");
        $result = $this->client->call('totalenvoiesparapi', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function totalreceptionsparapiAction()
    {
        $params = array('token' => 'assaneka', 'typeapi' => "test");
        $result = $this->client->call('totalreceptionsparapi', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function totalfraistransfertpercueparapiAction()
    {
        $params = array('token' => 'assaneka', 'typeapi' => "test");
        $result = $this->client->call('totalfraistransfertpercueparapi', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function totalcommissionparapiAction()
    {
        $params = array('token' => 'assaneka', 'typeapi' => "test");
        $result = $this->client->call('totalcommissionparapi', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function totaloperationallAction()
    {
        $params = array('token' => 'assaneka', 'typeapi' => "test");
        $result = $this->client->call('totaloperationall', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function totalenvoiesallAction()
    {
        $params = array('token' => 'assaneka', 'typeapi' => "test");
        $result = $this->client->call('totalenvoiesall', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function totalreceptionsallAction()
    {
        $params = array('token' => 'assaneka', 'typeapi' => "test");
        $result = $this->client->call('totalreceptionsall', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function totalfraistransfertpercuesallAction()
    {
        $params = array('token' => 'assaneka', 'typeapi' => "test");
        $result = $this->client->call('totalfraistransfertpercuesall', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function totalcommissionallAction()
    {
        $params = array('token' => 'assaneka', 'typeapi' => "test");
        $result = $this->client->call('totalcommissionall', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }



}