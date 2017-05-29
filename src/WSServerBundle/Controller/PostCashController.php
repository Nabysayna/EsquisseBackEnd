<?php

namespace WSServerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class PostCashController extends Controller
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

    public function postcashAction()
    {
        $server = new \SoapServer('wsdl_postcash/ws_postcash.wsdl',array('cache_wsdl' => WSDL_CACHE_NONE));
        $server->setObject($this->get('test_server_postcash'));

        $response = new Response();
        $response->headers->set('Content-Type', 'text/xml; charset=ISO-8859-1');

        ob_start();
        $server->handle();
        $response->setContent(ob_get_clean());

        return $response;
    }

    public function postcashtestclientAction()
    {
        $server = new \SoapServer('wsdl_postcash_test_client/ws_postcash_test_client.wsdl',array('cache_wsdl' => WSDL_CACHE_NONE));
        $server->setObject($this->get('test_server_postcash'));

        $response = new Response();
        $response->headers->set('Content-Type', 'text/xml; charset=ISO-8859-1');

        ob_start();
        $server->handle();
        $response->setContent(ob_get_clean());

        return $response;
    }
}
