<?php

namespace WSClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


class DefaultController extends Controller
{
    private $client = null;
    function __construct(){
        $this->client = new \nusoap_client('http://localhost/EsquisseBackEnd/web/app_dev.php/invest/logging?wsdl', true);
    }

    public function indexAction()
    {
        $testDB = $this->container->get('test_server_authentification');

        $result = $testDB->testDB();
        return new JsonResponse(array('result' => $result));

    }

    public function loggingAction()
    {
        $user = array('login' => 'assane.ka@bbstvnet.com', 'pwd' => 'assane');
        $result = $this->client->call('authentification', array('user' => $user));

        return new JsonResponse(array('result' => $result)); 
    }

    public function disconnectAction()
    {
        $fromUs =  sha1("bay3k00_f1_n10un") ;
        $user = array( 'token' => "4d7cf1e43dd42cf993af52d55bfa0ff14e37b050", 'hdeconnexion' => "459d" ) ;
        $result = $this->client->call('deconnexion', array('user' => $user));

        return new JsonResponse(array('result' => $result));  /* assane.ka@bbstvnet.com */
    }

}
