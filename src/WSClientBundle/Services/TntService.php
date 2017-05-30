<?php

namespace WSClientBundle\Services;

class TntService
{

    private $client = null;
    private $id = 43;

    function __construct(){
        $this->client = new \nusoap_client('http://abonnement.bbstvnet.com/integration-server-ws-tnt/index.php?wsdl', true);
    }

    public function verifinumeroabonnement($params)
    {
        $params = array('id' => $this->id, 'token' => $params->token, 'numeroCarteChip' =>  $params->numeroCarteChip);
        $result = $this->client->call('verifinumeroabonnement', array('params' => $params));
        return $result;
    }
    
    public function listabonnement($params)
    {
        $params = array('id' => $this->id, 'token' => $params->token);
        $result = $this->client->call('listabonnement', array('params' => $params));
        return $result;
    }

    public function ajoutabonnement($params)
    {
        $param = array('id' => $this->id, 'token' => 'assaneka', 'prenom' => $params->prenom, 'nom' => $params->nom, 'tel' => $params->tel, 'adresse' => $params->adresse, 'region' => $params->region, 'city' => $params->city, 'cni' => $params->cni, 'numerochip' => $params->numerochip, 'numerocarte' => $params->numerocarte, 'duree' => $params->duree, 'typedebouquet' => $params->typedebouquet);

        $result = $this->client->call('ajoutabonnement', array('params' => $param));
        
        return $result;
    }


}