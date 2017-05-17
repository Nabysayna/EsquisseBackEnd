<?php

namespace WSClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


class PostCashController extends Controller
{
    private $client = null;
    function __construct(){
        $this->client = new \nusoap_client('http://localhost/dev-bbsinvest-plateform/EsquisseBackEnd/web/app_dev.php/invest/postcash?wsdl', true);
    }

    public function rechargementespeceAction()
    {
        $params = array('api' => 1, 'token' => 'assaneka', 'tel_destinataire' => 12, 'montant' => 'assaneka');
        $result = $this->client->call('rechargementespece', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function retraitespeceAction()
    {
        $params = array('api' => 1, 'token' => 'assaneka', 'code_validation' => 123, 'police' => 'assaneka', 'num_facture' => 'assaneka');
        $result = $this->client->call('retraitespece', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function achatcodewoyofalAction()
    {
        $params = array('api' => 1, 'token' => 'assaneka', 'montant' => 12345, 'compteur' => 'assaneka');
        $result = $this->client->call('achatcodewoyofal', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function reglementsenelecAction()
    {
        $params = array('api' => 1, 'token' => 'assaneka', 'police' => 'assaneka', 'num_facture' => 'assaneka');
        $result = $this->client->call('reglementsenelec', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function achatjulaAction()
    {
        $params = array('api' => 1, 'token' => 'assaneka', 'mt_carte' => 'assaneka', 'nb_carte' => 'assaneka');
        $result = $this->client->call('achatjula', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function achatcredittelephoniqueAction()
    {
        $params = array('api' => 1, 'token' => 'assaneka', 'numero_a_recharger' => 'assaneka', 'montant' => 12345);
        $result = $this->client->call('achatjula', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }


}