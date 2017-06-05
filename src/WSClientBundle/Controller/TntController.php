<?php

namespace WSClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


class TntController extends Controller
{
    private $client = null;
    function __construct(){
        $this->client = new \nusoap_client('http://localhost/dev-bbsinvest-plateform/EsquisseBackEnd/web/app_dev.php/invest/tnt?wsdl', true);
    }

    public function verifinumeroabonnementAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'numeroCarteChip' =>  '00616241893');
        $result = $this->client->call('verifinumeroabonnement', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    
    public function listabonnementAction()
    {
        $params = array('token' => '092a18aae3e71d3707688a4c9e9d12ea2dab3bdd');
        $result = $this->client->call('listabonnement', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function ajoutabonnementAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'prenom' => 'OKA', 'nom' => 'OKA', 'tel' => 'assaneka', 'adresse' => 'assaneka', 'region' => 'assaneka', 'city' => 'assaneka', 'cni' => 'assaneka', 'numerochip' => '098765', 'numerocarte' => '65443', 'duree' => 2, 'typedebouquet' => 1);
        $result = $this->client->call('ajoutabonnement', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function ventedecodeurAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'prenom' => 'assaneka', 'nom' => 'assaneka', 'tel' => 'assaneka', 'adresse' => 'assaneka', 'region' => 'assaneka', 'city' => 'assaneka', 'cni' => 'assaneka', 'numerochip' => 'assaneka', 'numerocarte' => 'assaneka', 'typedecodeur' => '+hjds', 'prix' => 1000);
        $result = $this->client->call('ventedecodeur', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    
    public function listdecodeurAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0');
        $result = $this->client->call('listdecodeur', array('params' => $params));
        // $result = "Assane";
        return new JsonResponse(array('result' => $result));
    }

}