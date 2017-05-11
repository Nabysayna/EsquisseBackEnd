<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
include('./lib/nusoap.php');

class DefaultController extends Controller
{
    public function indexAction()
    {
        $server = new \SoapServer('webservice.wsdl');
        $server->setObject($this->get('hello_service'));

        $response = new Response();
        $response->headers->set('Content-Type', 'text/xml; charset=ISO-8859-1');

        ob_start();
        $server->handle();
        $response->setContent(ob_get_clean());

        return $response;
    }

    public function clientoapAction()
    {

        
        $client = new \nusoap_client('http://localhost/dev-bbsinvest-plateform/EsquisseBackEnd/web/app_dev.php?wsdl', true);
 
        $result = $client->call('hello', array('name' => 'Team'));
 
        return new JsonResponse(array('result' => $result));
    }
}
