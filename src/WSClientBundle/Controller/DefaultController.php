<?php

namespace WSClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


class DefaultController extends Controller
{
    public function indexAction()
    {
        // return $this->render('WSClientBundle:Default:index.html.twig');

         // On récupère le service
        $testDB = $this->container->get('test_server_authentification');

        $result = $testDB->testDB();
        return new JsonResponse(array('result' => $result));

    }

    public function loggingAction()
    {
        $client = new \nusoap_client('http://localhost/dev-bbsinvest-plateform/EsquisseBackEnd/web/app_dev.php/invest/logging?wsdl', true);
        $user = array('login' => 'assane@ka.com', 'pwd' => 'assanek');
        $result = $client->call('authentification', array('user' => $user));

        return new JsonResponse(array('result' => $result));
    }


}
