<?php

namespace WSClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


class DefaultController extends Controller
{
    private $client = null;
    function __construct(){
        $this->client = new \nusoap_client('http://localhost/dev-bbsinvest-plateform/EsquisseBackEnd/web/app_dev.php/invest/logging?wsdl', true);
    }

    public function indexAction()
    {
        $testDB = $this->container->get('test_server_authentification');

        $result = $testDB->testDB();
        return new JsonResponse(array('result' => $result));

    }

    public function loggingAction()
    {
<<<<<<< HEAD
        $client = new \nusoap_client('http://localhost:8888/EsquisseBackEnd/web/app_dev.php/invest/logging?wsdl', true);
=======
>>>>>>> d954fb831b155a2d77d03cd0775c666790841d73
        $user = array('login' => 'assane.ka@bbstvnet.com', 'pwd' => 'assane');
        $result = $this->client->call('authentification', array('user' => $user));

        return new JsonResponse(array('result' => $result)); 
    }

    public function disconnectAction()
    {
<<<<<<< HEAD
        $client = new \nusoap_client('http://localhost:8888/EsquisseBackEnd/web/app_dev.php/invest/logging?wsdl', true);
        $fromUs =  sha1("bay3k00_f1_n10un") ;
        $user = array( 'token' => "8a6e82beca15168315400832ec3bc0f318a20623", 'hdeconnexion' => "459d" ) ;
        $result = $client->call('deconnexion', array('user' => $user));
=======
        $fromUs =  sha1("bay3k00_f1_n10un") ;
        $user = array( 'token' => "4d7cf1e43dd42cf993af52d55bfa0ff14e37b050", 'hdeconnexion' => "459d" ) ;
        $result = $this->client->call('deconnexion', array('user' => $user));
>>>>>>> d954fb831b155a2d77d03cd0775c666790841d73

        return new JsonResponse(array('result' => $result));  /* assane.ka@bbstvnet.com */
    }

}
