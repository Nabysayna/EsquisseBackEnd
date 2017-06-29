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
        $user = array('login' => 'nabysayna@gmail.com', 'pwd' => 'fallou');
        $result = $testDB->authentification($user);
        return new JsonResponse(array('result' => $result));

    }

    public function loggingAction()
    {

        $client = new \nusoap_client('http://localhost/EsquisseBackEnd/web/app_dev.php/invest/logging?wsdl', true);

        //$user = array('login' => 'nabysayna@gmail.com', 'pwd' => 'fallou');

        $user = array('tokentemporaire'=>"0.89215000 1498305028"); 
        $result = $this->client->call('authentificationPhaseTwo', array('user' => $user));

        return new JsonResponse(array('result' => $result)); 
    }

    public function disconnectAction()
    {
        $client = new \nusoap_client('http://localhost/EsquisseBackEnd/web/app_dev.php/invest/logging?wsdl', true);
        $fromUs =  sha1("bay3k00_f1_n10un") ;
        $user = array( 'token' => "8a6e82beca15168315400832ec3bc0f318a20623", 'hdeconnexion' => "459d" ) ;
        $result = $this->client->call('deconnexion', array('user' => $user));
        return new JsonResponse(array('result' => $result));  /* assane.ka@bbstvnet.com */
    }

    public function smsAction()
    {

        $message = \Swift_Message::newInstance() ;

        $message->setContentType('text/html') ;

        $message->setSubject('Test Symfony mailer from crontoller code.') ;

        $message->setFrom('naby.hikam@gmail.com') ;

        $message->setTo('nabysayna@gmail.com') ;

        $message->setBody("FUBU!For Us By Us.");

        $this->get('mailer')->send($message);

        return new JsonResponse(array('result' =>"SuccessFull!")) ;
    }

}
