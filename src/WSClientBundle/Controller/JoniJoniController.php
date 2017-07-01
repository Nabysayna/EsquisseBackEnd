<?php

namespace WSClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


class JoniJoniController extends Controller
{
    private $client = null;
    function __construct(){
        $this->client = new \nusoap_client('http://localhost:8888/dev-bbsinvest-plateform/EsquisseBackEnd/web/app_dev.php/invest/jonijoni?wsdl', true);
    }

    public function cashtocash_getcommissionsttcAction()
    {
        $params = array('token' => 'assaneka', 'type' => "test");
        $result = $this->client->call('cashtocash_getcommissionsttc', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function cashtocash_sendtransactionAction()
    {
        $params = array('token' => 'assaneka', 'type' => "test");
        $result = $this->client->call('cashtocash_sendtransaction', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function cashtocash_checktransactioncodeAction()
    {
        $params = array('token' => 'assaneka', 'type' => "test");
        $result = $this->client->call('cashtocash_checktransactioncode', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function cashtocash_paytransactionAction()
    {
        $params = array('token' => 'assaneka', 'type' => "test");
        $result = $this->client->call('cashtocash_paytransaction', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function cashtocash_canceltransactionAction()
    {
        $params = array('token' => 'assaneka', 'type' => "test");
        $result = $this->client->call('cashtocash_canceltransaction', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function vitfe_getinfocomptevitfeAction()
    {
        $params = array('token' => 'assaneka', 'type' => "test");
        $result = $this->client->call('vitfe_getinfocomptevitfe', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function vitfe_getcommissionsttcvitfeAction()
    {
        $params = array('token' => 'assaneka', 'type' => "test");
        $result = $this->client->call('vitfe_getcommissionsttcvitfe', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function vitfe_approcompteAction()
    {
        $params = array('token' => 'assaneka', 'type' => "test");
        $result = $this->client->call('vitfe_approcompte', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function monetique_getinfocarteAction()
    {
        $params = array('token' => 'assaneka', 'type' => "test");
        $result = $this->client->call('monetique_getinfocarte', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function monetique_getcommissionsttccarteAction()
    {
        $params = array('token' => 'assaneka', 'type' => "test");
        $result = $this->client->call('monetique_getcommissionsttccarte', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function monetique_rechargecarteAction()
    {
        $params = array('token' => 'assaneka', 'type' => "test");
        $result = $this->client->call('monetique_rechargecarte', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }


}