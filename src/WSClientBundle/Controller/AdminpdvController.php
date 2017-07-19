<?php

namespace WSClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


class AdminpdvController extends Controller
{
    private $client = null;
    function __construct(){
        $this->client = new \nusoap_client('http://localhost/dev-bbsinvest-plateform/EsquisseBackEnd/web/app_dev.php/invest/adminpdv?wsdl', true);
    }

    public function listuserpdvAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'type' =>  '65443');
        $result = $this->client->call('listuserpdv', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    
    public function nombredereclamationpdvventeAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'type' =>  '65443');
        $result = $this->client->call('nombredereclamationpdvvente', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    
    public function montanttransfertserviceAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'type' =>  '65443');
        $result = $this->client->call('montanttransfertservice', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    
    public function performancepdvAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'type' =>  '65443');
        $result = $this->client->call('performancepdv', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    
    public function notificationsAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'type' =>  '65443');
        $result = $this->client->call('notifications', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    
    public function bilandepositAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'type' =>  '65443');
        $result = $this->client->call('bilandeposit', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    
    public function consommationdepositserviceAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'type' =>  '65443');
        $result = $this->client->call('consommationdepositservice', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    
    public function consommationdepositpdvAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'type' =>  '65443');
        $result = $this->client->call('consommationdepositpdv', array('params' => $params));
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
    

}