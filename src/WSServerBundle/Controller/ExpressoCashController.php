<?php

namespace WSServerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ExpressoCashController extends Controller
{

     public function __construct() {  
        header("Access-Control-Allow-Origin: *"); 
        header("Access-Control-Allow-Headers: SOAPAction, Content-Type"); 
    }

    public function expressocashAction()
    {
        $server = new \SoapServer('wsdl_expressocash/ws_expressocash.wsdl',array('cache_wsdl' => WSDL_CACHE_NONE));
        $server->setObject($this->get('test_server_expressocash'));

        $response = new Response();
        $response->headers->set('Content-Type', 'text/xml; charset=ISO-8859-1');

        ob_start();
        $server->handle();
        $response->setContent(ob_get_clean());

        return $response;
    }

}
