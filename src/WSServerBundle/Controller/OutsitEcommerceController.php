<?php

namespace WSServerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class OutsitEcommerceController extends Controller
{
    public function __construct() {  
        header("Access-Control-Allow-Origin: *"); 
        header("Access-Control-Allow-Headers: SOAPAction, Content-Type"); 
    }

    public function outsitecommerceAction()
    {
        $server = new \SoapServer('wsdl_outsitecommerce/ws_outsitecommerce.wsdl',array('cache_wsdl' => WSDL_CACHE_NONE));
        $server->setObject($this->get('test_server_outsitecommerce'));

        $response = new Response();
        $response->headers->set('Content-Type', 'text/xml; charset=ISO-8859-1');

        ob_start();
        $server->handle();
        $response->setContent(ob_get_clean());

        return $response;
    }

}
