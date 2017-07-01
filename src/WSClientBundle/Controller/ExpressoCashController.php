<?php

namespace WSClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


class ExpressoCashController extends Controller
{
    private $client = null;
    function __construct(){
        $this->client = new \nusoap_client('http://localhost:8888/dev-bbsinvest-plateform/EsquisseBackEnd/web/invest/expressocash?wsdl', true);
    }


    public function cashinAction()
    {
        $params = array(
            'token' => 'assaneka', 
            'transactionID' => '12345678902',
            'destination' => '221703593438',
            'amount' => '100',
            'purposeOfTransfer' => "bank cash in",
            'externaldata1' => 'N/A',
            'externaldata2' => 'N/A',
            'clientID' => 'TEST _BANK',
            'clientPassword' => 'C1B5669733701269F11862510C93E932',
            'hashValue' => '9A1D2C5FD5B16EBD0184E0DE8108EB814635CDDC509999A922C4A4A267A7FCFB172B44D1D05AC536989'
        );
        $result = $this->client->call('cashin', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function cashoutAction()
    {
        $params = array(
            'token' => 'assaneka', 
            'transactionID' => '12345678902',
            'customer' => '221703593438',
            'amount' => '100',
            'purposeOfTransfer' => "bank cash out",
            'externaldata1' => 'N/A',
            'externaldata2' => 'N/A',
            'clientID' => 'TEST _BANK',
            'clientPassword' => 'C1B5669733701269F11862510C93E932',
            'hashValue' => '9A1D2C5FD5B16EBD0184E0DE8108EB814635CDDC509999A922C4A4A267A7FCFB172B44D1D05AC536989'
        );
        $result = $this->client->call('cashout', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function topupAction()
    {
        $params = array(
            'token' => 'assaneka', 
            "transactionID" => "12345678902",
            "destination" => "221703593438",
            "amount" => "100",
            "purposeOfTransfer" => "bank top up",
            "externaldata1" => "N/A",
            "externaldata2" => "N/A",
            "clientID" =>  "TEST _BANK",
            "clientPassword" => " C1B5669733701269F11862510C93E932",
            "hashValue" => "9A1D2C5FD5B16EBD0184E0DE8108EB814635CDDC509999A922C4A4A267A7FCFB172B44D1D05AC536989903D"
        );
        $result = $this->client->call('topup', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function checkbalanceAction()
    {
        $params = array(
            'token' => 'assaneka', 
            'clientID' => "TEST _BANK",
            'clientPassword' => 'C1B5669733701269F11862510C93E932',
            'hashValue' => "9A1D2C5FD5B16EBD0184E0DE8108EB814635CDDC509999A922C4A4A267A7FCFB172B44D1D05AC536989"
        );
        $result = $this->client->call('checkbalance', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }


}