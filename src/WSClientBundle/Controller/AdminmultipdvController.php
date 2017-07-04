<?php

namespace WSClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


class AdminmultipdvController extends Controller
{
    private $client = null;
    function __construct(){
        $this->client = new \nusoap_client('http://localhost:8888/dev-bbsinvest-plateform/EsquisseBackEnd/web/app_dev.php/invest/adminmultipdv?wsdl', true);
    }

    public function nombredereclamationagentpdvventeAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'type' =>  '65443');
        $result = $this->client->call('nombredereclamationagentpdvvente', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    
    public function depositinitialconsommeparserviceAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'type' =>  '65443');
        $result = $this->client->call('depositinitialconsommeparservice', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    
    public function performanceagentAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'type' =>  '65443');
        $result = $this->client->call('performanceagent', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    
    public function listmapAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'type' =>  '65443');
        $result = $this->client->call('listmap', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    
    public function historiquerecouvrementAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'type' =>  '65443');
        $result = $this->client->call('historiquerecouvrement', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    
    public function historiquereclamationAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'type' =>  '65443');
        $result = $this->client->call('historiquereclamation', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    
    public function activiteservicesAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'type' =>  '65443');
        $result = $this->client->call('activiteservices', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    
    public function demanderetraitfondAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'type' =>  '65443');
        $result = $this->client->call('demanderetraitfond', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    
    public function listmajcautionsAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'type' =>  '65443');
        $result = $this->client->call('listmajcautions', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    
    public function modifymajcautionAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'type' =>  '65443', 'idagent' =>  65443, 'modifycaution' =>  '65443');
        $result = $this->client->call('modifymajcaution', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    
    
}