<?php

namespace WSServerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TntController extends Controller
{

    public function tntAction()
    {
        $server = new \SoapServer('wsdl_tnt/ws_tnt.wsdl',array('cache_wsdl' => WSDL_CACHE_NONE));
        $server->setObject($this->get('ws_api_service_tnt'));

        $response = new Response();
        $response->headers->set('Content-Type', 'text/xml; charset=ISO-8859-1');

        ob_start();
        $server->handle();
        $response->setContent(ob_get_clean());

        return $response;
        // return new Response('test');
    }
}
