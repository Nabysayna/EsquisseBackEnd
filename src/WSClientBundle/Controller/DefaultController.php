<?php

namespace WSClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


class DefaultController extends Controller
{
    public function indexAction()
    {
        $testDB = $this->container->get('test_server_authentification');

        $result = $testDB->testDB();
        return new JsonResponse(array('result' => $result));

    }

    public function loggingAction()
    {
        $client = new \nusoap_client('http://localhost/EsquisseBackEnd/web/app_dev.php/invest/logging?wsdl', true);
        $user = array('login' => 'assane.ka@bbstvnet.com', 'pwd' => 'assane');
        $result = $client->call('authentification', array('user' => $user));

        return new JsonResponse(array('result' => $result)); 
    }

    public function disconnectAction()
    {
        $client = new \nusoap_client('http://localhost/EsquisseBackEnd/web/app_dev.php/invest/logging?wsdl', true);
        $fromUs =  sha1("bay3k00_f1_n10un") ;
        $user = array( 'token' => "4d7cf1e43dd42cf993af52d55bfa0ff14e37b050", 'hdeconnexion' => "459d" ) ;
        $result = $client->call('deconnexion', array('user' => $user));

        return new JsonResponse(array('result' => $result));  /* assane.ka@bbstvnet.com */
    }

}
