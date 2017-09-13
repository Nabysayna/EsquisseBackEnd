<?php

namespace WSServerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TestSmSController extends Controller
{

    public function indexAction()
    {

        $SmsServer = $this->container->get('ws_api_service_sms');

        // $SmsServer->sendCode("+221772220594", "TEST SMS", "0998");

        return $SmsServer->sendCode("+221772220594", "TEST SMS", "0998") ;
    }

    
}
