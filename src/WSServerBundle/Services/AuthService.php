<?php

namespace WSServerBundle\Services;

use WSServerBundle\Entity\Authorizedsessions;
use WSServerBundle\Entity\Tokentemporaire;

class AuthService
{
    private $em;
    private $mailer;
  	public function __construct(\Doctrine\ORM\EntityManager $entityManager, $mailer){
  		$this->em = $entityManager;
      $this->mailer = $mailer;
  	}

    public function testDB(){
      $reponse = array('prenom' => '', 'token' => '', 'reponse' => false);
      return ''. json_encode($reponse);

    }

    public function hello($name)
    {
        return 'OKA says hello , '.$name;
    }

    function  authentification($user) {
      
      $dbuser = $this->em->getRepository('WSServerBundle:Users')->findOneBy(array('login' => $user->login, 'pwd' => $user->pwd));

      if (empty($dbuser)) {
        $reponse = array('prenom' => '', 'token' => '', 'reponse' => false);
        return ''. json_encode($reponse);
      }
      else {

          $sessionStart = new \Datetime() ;
         // $tokenTemp =  microtime() ;
           $explodedToken = explode(" ", $dbuser->getToken() ) ;
          
           $line = [];
           $colm = [];

           $line[0] = mt_rand(0, 19);
           $colm[0] = mt_rand(0, 5);
           $chaineAttendue = strval($line[0]+1)."--".strval($colm[0]+1);
           $tokenTemp = $explodedToken[$line[0]][$colm[0]] ;

           for ($i=1; $i <4 ; $i++) { 
             $line[$i] = mt_rand(0, 19);
             $colm[$i] = mt_rand(0, 5);
             $chaineAttendue = $chaineAttendue." ".strval($line[$i]+1)."--".strval($colm[$i]+1);
             $tokenTemp = $tokenTemp.$explodedToken[$line[$i]][$colm[$i]] ;
           }
          
          $newTempRow = new Tokentemporaire();
          $newTempRow->setIdUser($dbuser->getIdUser());
          $newTempRow->setAccessLevel($dbuser->getAccesslevel());
          $newTempRow->setTokentemporaire($tokenTemp);
          $newTempRow->setCountingpoint($sessionStart);

          $this->em->persist($newTempRow);
          $this->em->flush();

         // $this->envoyerSMS('naby.hikam@gmail.com', $dbuser->getLogin(), strval($tokenTemp) ) ;

          return $chaineAttendue;
      }

    }

    function authentificationPhaseTwo($params)
    {
      $tempRow = $this->em->getRepository('WSServerBundle:Tokentemporaire')->findOneBy(array('tokentemporaire'=>$params->tokentemporaire));

      $dbuser = $this->em->getRepository('WSServerBundle:Users')->findOneBy(array('idUser' => $tempRow->getIdUser()));

      if (empty($dbuser)) {
        $reponse = array('prenom' => '', 'token' => '', 'reponse' => false);
        return ''. json_encode($reponse);
      }
      else {
        if ( $dbuser->getDependsOn()==0 )
          $dbprerogative = $this->em->getRepository('WSServerBundle:Prerogatives')->findOneBy(array('idUser'=>$dbuser->getIdUser())) ;
        else
          $dbprerogative = $this->em->getRepository('WSServerBundle:Prerogatives')->findOneBy(array('idUser' =>$dbuser->getDependsOn())) ;

          $fromUs =  sha1("bay3k00_f1_n10un") ;
          $sessionStart = new \Datetime() ;
          $differenciator = sha1( $sessionStart->format('Y-m-d H:i') ) ;
          $baseToken = strval($dbuser->getIdUser()).$differenciator ;

          $authorizedsession = new Authorizedsessions();
          $authorizedsession->setIdUser($dbuser->getIdUser());
          $authorizedsession->setAccessLevel($dbuser->getAccesslevel());
          $authorizedsession->setToken( sha1($baseToken.$fromUs) );
          $authorizedsession->setAuthorizedApis($dbprerogative->getAuthorizedApis());
          $authorizedsession->setDependsOn($dbuser->getDependsOn());
          $authorizedsession->setSessionStart($sessionStart);

          $this->em->remove($tempRow) ;
          $this->em->persist($authorizedsession);
          $this->em->flush();

          $reponse = array(
            'prenom' => $dbuser->getPrenom(),
            'accessLevel' => $dbuser->getAccesslevel(),
            'authorizedApis' => $dbprerogative->getAuthorizedApis(),
            'baseToken'=> $baseToken,
            'reponse' => true
          );          
          return ''. json_encode($reponse);
        }
    }


    function deconnexion($user)
    {
    try{
      $sessionToRemove = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$user->token));
        $this->em->remove($sessionToRemove) ;
        $this->em->flush() ;
        return 1;    
      }catch(Exception $e){
        return 0;
      }    
    }


    function envoyerSMS($from, $to, $content)
    {
        $message = \Swift_Message::newInstance() ;
        $message->setContentType('text/html') ;
        $message->setSubject('Authentification WELMA') ;
        $message->setFrom($from) ;
        $message->setTo($to) ;
        $message->setBody($content);
        $this->mailer->send($message);
    }
    
}