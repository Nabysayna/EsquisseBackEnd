<?php

namespace WSServerBundle\Services;

class MailingService
{
    private $mailer;

  	public function __construct(\Swift_Mailer $mailer)
  	{
    	$this->mailer    = $mailer;
  	}

 	public function envoifromsite($to, $sujet, $content)
  	{
	    $message = \Swift_Message::newInstance() ;
        $message->setContentType('text/html');
        $message->setSubject($sujet) ;
        $message->setFrom('naby.hikam@gmail.com');
        $message->setTo("kasanesn@gmail.com");
        $message->setBody("<h3>De ".$to."</h3><p>".$content."!</p>");
        $this->mailer->send($message);
        return 'ok';
  	}

	public function alerttoclientsite($to, $sujet, $content)
  	{
	    $message = \Swift_Message::newInstance() ;
        $message->setContentType('text/html') ;
        $message->setSubject('Notification E-PDV') ;
        $message->setFrom('naby.hikam@gmail.com') ;
        $message->setTo($to) ;
        $message->setBody("<h3>".$content."!</h3>");
        $this->mailer->send($message);
        return 'ok';

  	}


}