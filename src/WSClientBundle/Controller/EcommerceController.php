<?php

namespace WSClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


class EcommerceController extends Controller
{
    private $client = null;
    function __construct(){
        $this->client = new \nusoap_client('http://localhost/EsquisseBackEnd/web/app_dev.php/invest/ecommerce?wsdl', true);
    }

    public function ajoutarticleAction()
    {
        $params = array('token' => 'assaneka', 'designation' => "test", 'description' => 'assaneka', 'prix' => 2000, 'stock' => 20, 'img_link' => 'awa.jpg');
        $result = $this->client->call('ajoutarticle', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function ajoutcommandeAction()
    {
        $params = array('token' => 'assaneka', 'id_article' => 2, 'quantite' => 50, 'fullname' => "AKOKA", 'tel' => 50233005000);
        $result = $this->client->call('ajoutcommande', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function ajoutventeAction()
    {
        $params = array('token' => 'assaneka', 'id_commande' => 2, 'montant' => 50000);
        $result = $this->client->call('ajoutvente', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function listerarticleAction()
    {
        $params = array('token' => 'assaneka', 'type' => ''*);
        $result = $this->client->call('listerarticle', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function listercommandeAction()
    {
        $params = array('token' => 'assaneka');
        $result = $this->client->call('listercommande', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function listerventeAction()
    {
        $params = array('token' => 'assaneka');
        $result = $this->client->call('listervente', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }


}