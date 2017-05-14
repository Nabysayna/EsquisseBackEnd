<?php

namespace WSServerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function indexAction()
    {
        $server = new \SoapServer('wsdl_auth/ws_auth.wsdl');
        $server->setObject($this->get('test_server_authentification'));

        $response = new Response();
        $response->headers->set('Content-Type', 'text/xml; charset=ISO-8859-1');

        ob_start();
        $server->handle();
        $response->setContent(ob_get_clean());

        return $response;
    }
    
}
