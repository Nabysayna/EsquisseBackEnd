<?php

namespace WSClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WSClientBundle:Default:index.html.twig');
    }

    public function loggingAction()
    {
    
        // $client = new \nusoap_client('http://localhost/dev-bbsinvest-plateform/EsquisseBackEnd-test-nusoap/web/app_dev.php/invest/logging?wsdl', true);
        // $user = array('login' => 'assane@ka.com', 'pwd' => 'assaneka');
        // $result = $client->call('authentification', array('user' => $user));
        // return new JsonResponse(array('result' => $result));

        $client = new \nusoap_client('http://localhost/dev-bbsinvest-plateform/EsquisseBackEnd/web/app_dev.php/invest/logging?wsdl', true);
        $result = $client->call('hello', array('name' => 'Bamba'));
        return new JsonResponse(array('result' => $result));        
    }


}
