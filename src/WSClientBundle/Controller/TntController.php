<?php

namespace WSClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


class TntController extends Controller
{
    private $client = null;
    function __construct(){
        $this->client = new \nusoap_client('http://localhost:8888/dev-bbsinvest-plateform/EsquisseBackEnd/web/app_dev.php/invest/tnt?wsdl', true);
    }

    public function verifinumeroabonnementAction()
    {
        $params = array('token' => '799ee082bad2870e8839588f5020f741a74613e2', 'numeroCarteChip' =>  '00616241893');
        $result = $this->client->call('verifinumeroabonnement', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    
    public function listabonnementAction()
    {
        $params = array('token' => '799ee082bad2870e8839588f5020f741a74613e2');
        $result = $this->client->call('listabonnement', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function ajoutabonnementAction()
    {
        $params = array('token' => '799ee082bad2870e8839588f5020f741a74613e2', 'prenom' => 'OKA', 'nom' => 'OKA', 'tel' => 'assaneka', 'adresse' => 'assaneka', 'region' => 'assaneka', 'city' => 'assaneka', 'cni' => 'assaneka', 'numerochip' => '098765', 'numerocarte' => '65443', 'duree' => 2, 'typedebouquet' => 1);
        $result = $this->client->call('ajoutabonnement', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function ventedecodeurAction()
    {
        $params = array('token' => '799ee082bad2870e8839588f5020f741a74613e2', 'prenom' => 'assaneka', 'nom' => 'assaneka', 'tel' => 'assaneka', 'adresse' => 'assaneka', 'region' => 'assaneka', 'city' => 'assaneka', 'cni' => 'assaneka', 'numerochip' => '0056523333', 'numerocarte' => '0009684747', 'typedebouquet' => '+hjds', 'prix' => 1000);
        $result = $this->client->call('ventedecodeur', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    
    public function ventecarteAction()
    {
        $params = array('token' => '799ee082bad2870e8839588f5020f741a74613e2', 'prenom' => 'assaneka', 'nom' => 'assaneka', 'tel' => 'assaneka', 'adresse' => 'assaneka', 'region' => 'assaneka', 'city' => 'assaneka', 'cni' => 'assaneka', 'numerocarte' => '0009684747', 'prix' => 1000);
        $result = $this->client->call('ventecarte', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    

    public function listdecodeurAction()
    {
        $params = array('token' => '799ee082bad2870e8839588f5020f741a74613e2');
        $result = $this->client->call('listdecodeur', array('params' => $params));
        // $result = "Assane";
        return new JsonResponse(array('result' => $result));
    }

    public function listcarteAction()
    {
        $params = array('token' => '799ee082bad2870e8839588f5020f741a74613e2');
        $result = $this->client->call('listcarte', array('params' => $params));
        // $result = "Assane";
        return new JsonResponse(array('result' => $result));
    }

}