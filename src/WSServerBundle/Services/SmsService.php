<?php

namespace WSServerBundle\Services;

//use Jhg\NexmoBundle\Managers\SmsManager;
  use Symfony\Component\HttpFoundation\JsonResponse ;
  use Unirest ;

// use GuzzleHttp\Client;

class SmsService
{

    private $client ;
    private $token_client ='nwRwSwXAbFCPiG95' ;

    public function __construct()
    {
    }

    public function sendCode($destination, $subject, $mainContain)
    {
        $msg = $subject."\n".$mainContain ;

        if ($this->sendSMS($destination, 'BBSInvest', $msg, $this->token_client)==true)
            return 'Success' ;
    }


    /**
     * @param $url string
     * @param $data array
     * @return string
     */
    public  function post($url, $data = [])
    {
        $strPostField = http_build_query($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $strPostField);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0) ;
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,0) ;
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/x-www-form-urlencoded;charset=utf-8',
                'Content-Length: ' . mb_strlen($strPostField))
        );

        return curl_exec($ch);
    }

    /**
     * @param $recipients array|string
     * @param $senderName string
     * @param $message string
     * @param $token string
     * @return bool
     */
    public function sendSms($recipients, $senderName, $message, $token)
    {
        $recipients = is_array($recipients) ? implode("#", $recipients) : $recipients;
        $sendUrl = 'https://sms-api.empiredigital.info/send/index.php';

        $rawResult = $this->post($sendUrl, [
           'client_token' => $token,
            'sms_to' => $recipients,
            'sms_text' => $message,
            'name' => $senderName
        ]);

        $jsonResult = json_decode($rawResult, true);

        var_dump($rawResult) ;

        if(is_array($jsonResult) && isset($jsonResult['statusCode']) && $jsonResult['statusCode'] == 200)
        {
            return true;
        }


        return false;
    }




}