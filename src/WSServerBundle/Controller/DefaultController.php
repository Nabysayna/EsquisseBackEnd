<?php

namespace WSServerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $server = new \SoapServer('webservice.wsdl',array('cache_wsdl' => WSDL_CACHE_NONE));
        $server->setObject($this->get('test_service'));

        $response = new Response();
        $response->headers->set('Content-Type', 'text/xml; charset=ISO-8859-1');

        ob_start();
        $server->handle();
        $response->setContent(ob_get_clean());

        return $response;
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
