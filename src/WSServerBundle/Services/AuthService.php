<?php

namespace WSServerBundle\Services;

use WSServerBundle\Entity\Authorizedsessions;

class AuthService
{
    private $em;

  	public function __construct(\Doctrine\ORM\EntityManager $entityManager){
  		$this->em = $entityManager;
  	}

    public function testDB(){
      //  $dbuser = $this->em->getRepository('WSServerBundle:Users')->findOneBy(array('login' => 'assane@ka.com', 'pwd' => 'assaneka'));

      // if (empty($dbuser)) {
      //   $reponse = array('prenom' => '', 'token' => '', 'reponse' => false);
      //   return ''. json_encode($reponse);
      // }
      // else {
      //   $token = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
      //   $dbprerogative = $this->em->getRepository('WSServerBundle:Prerogatives')->find($dbuser->getIdUser());        
      //   $authorizedsession = new Authorizedsessions();
      //   $authorizedsession->setIdUser($dbuser->getIdUser());
      //   $authorizedsession->setAccessLevel($dbuser->getAccesslevel());
      //   $authorizedsession->setToken($token);
      //   $authorizedsession->setAuthorizedApis($dbprerogative->getAuthorizedApis());
      //   $authorizedsession->setDependsOn($dbuser->getDependsOn());
      //   $authorizedsession->setSessionStart(new \Datetime());

      //   $this->em->persist($authorizedsession);
      //   $this->em->flush();

      //   $reponse = array(
      //     'prenom' => $dbuser->getPrenom(),
      //     'token' => $token,
      //     'reponse' => true
      //   );
      //   return ''. json_encode($reponse);
      // }

      $reponse = array('prenom' => '', 'token' => '', 'reponse' => false);
      return ''. json_encode($reponse);

    }

    public function hello($name)
    {
        return 'OKA says hello , '.$name;
    }

    function authentification($user) {
      
      $dbuser = $this->em->getRepository('WSServerBundle:Users')->findOneBy(array('login' => $user->login, 'pwd' => $user->pwd));

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

    
}