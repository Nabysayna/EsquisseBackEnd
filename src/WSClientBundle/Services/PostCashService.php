<?php

namespace WSClientBundle\Services;

class PostCashService
{

    private $client = null;
    
    public function __construct()
    {
        $this->client = new \nusoap_client('http://abonnement.bbstvnet.com/wsclient/index.php?wsdl', true);
    }

    function rechargementespece($params)
    {
        $result = $this->client->call('rechargementespece', array('params' => $params));
        return $result;
    }

function retraitespece($params)
    {
        $result = $this->client->call('retraitespece', array('params' => $params));
        return $result;
    }

function achatcodewoyofal($params)
    {
        $result = $this->client->call('achatcodewoyofal', array('params' => $params));
        return $result;
    }

function reglementsenelec($params)
    {
        $result = $this->client->call('reglementsenelec', array('params' => $params));
        return $result;
    }

function achatjula($params)
{
        $result = $this->client->call('achatjula', array('params' => $params));
        return $result;
    }

function achatcredittelephonique($params)
{
        $result = $this->client->call('achatcredittelephonique', array('params' => $params));
        return $result;
    }




}
