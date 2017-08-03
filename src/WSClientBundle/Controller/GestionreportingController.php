<?php

namespace WSClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


class GestionreportingController extends Controller
{
    private $client = null;
    function __construct(){
        $this->client = new \nusoap_client('http://localhost:8888/EsquisseBackEnd/web/app_dev.php/invest/gestionreporting?wsdl', true);
    }


    public function gestionreportingAction()
    {
        $params = array('token' => '3fea65929f0e36ac15d4c35ead4084115c89864f');
        $result = $this->client->call('gestionreporting', $params);
        return new JsonResponse(array('result' => $result));
    }


    public function servicepointAction()
    {
        $params = array('token' => '3fea65929f0e36ac15d4c35ead4084115c89864f');
        $result = $this->client->call('servicepoint', $params);
        return new JsonResponse(array('result' => $result));
    }

    public function ajoutdepenseAction()
    {
        $params = array('token' => '3fea65929f0e36ac15d4c35ead4084115c89864f', 'type' => "test", 'libelle' => "impression", 'detail' => "Achat d'une imprimante", 'montant' => 50000);
        $result = $this->client->call('ajoutdepense', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

     public function reclamationAction()
    {
        $params = array('token' => '3fea65929f0e36ac15d4c35ead4084115c89864f', 'type' => "test", 'sujet' => "vente", 'service' => "e-commerce", 'message' => "plus de stock");
        $result = $this->client->call('reclamation', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function venteAction()
    {
        $params = array('token' => '2cf4017955cf78cf1d1055e0d93b76aea98b520d','servicevente'=>"gh", 'designation'=>"gf",'quantite'=>4);
        $result = $this->client->call('vente', $params);
        return new JsonResponse(array('result' => $result));
    }
  
}