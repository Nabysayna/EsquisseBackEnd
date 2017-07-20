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

    public function listeventeAction()
    {
        $params = array('token' => 'assaneka', 'type' => "test");
        $result = $this->client->call('listevente', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function listechargeAction()
    {
        $params = array('token' => 'assaneka', 'type' => "test");
        $result = $this->client->call('listecharge', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function ajoutchargeAction()
    {
        $params = array('token' => 'assaneka', 'type' => "test", 'libelle' => "impression", 'detail' => "Achat d'une imprimante", 'montant' => 50000);
        $result = $this->client->call('ajoutcharge', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function supprimerserviceAction()
    {
        $params = array('token' => 'assaneka', 'type' => "test", 'idsupprimer' => 1);
        $result = $this->client->call('supprimerservice', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function modifierserviceAction()
    {
        $params = array('token' => 'assaneka', 'type' => "test", 'nom' => "assane", 'idservice' => 1);
        $result = $this->client->call('modifierservice', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function ajoutserviceAction()
    {
        $params = array('token' => 'assaneka', 'type' => "test", 'nom' => "Assane KA");
        $result = $this->client->call('ajoutservice', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function approvisionnerAction()
    {
        $params = array('token' => 'assaneka', 'type' => "test", 'idpdv' => 4, 'montant' => 400000);
        $result = $this->client->call('approvisionner', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function listecaisseAction()
    {
        $params = array('token' => 'assaneka', 'type' => "test");
        $result = $this->client->call('listecaisse', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function listeserviceAction()
    {
        $params = array('token' => 'assaneka', 'type' => "test");
        $result = $this->client->call('listeservice', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function listerevenuAction()
    {
        $params = array('token' => 'assaneka', 'type' => "test");
        $result = $this->client->call('listerevenu', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }



}