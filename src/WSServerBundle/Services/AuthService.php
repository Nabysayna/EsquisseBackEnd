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
       $dbuser = $this->em->getRepository('WSServerBundle:Users')->findOneBy(array('login' => 'assane@ka.com', 'pwd' => 'assaneka'));

      if (empty($dbuser)) {
        $reponse = array('prenom' => '', 'token' => '', 'reponse' => false);
        return ''. json_encode($reponse);
      }
      else {
        $token = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
        $dbprerogative = $this->em->getRepository('WSServerBundle:Prerogatives')->find($dbuser->getIdUser());        
        $authorizedsession = new Authorizedsessions();
        $authorizedsession->setIdUser($dbuser->getIdUser());
        $authorizedsession->setAccessLevel($dbuser->getAccesslevel());
        $authorizedsession->setToken($token);
        $authorizedsession->setAuthorizedApis($dbprerogative->getAuthorizedApis());
        $authorizedsession->setDependsOn($dbuser->getDependsOn());
        $authorizedsession->setSessionStart(new \Datetime());

        $this->em->persist($authorizedsession);
        $this->em->flush();

        $reponse = array(
          'prenom' => $dbuser->getPrenom(),
          'token' => $token,
          'reponse' => true
        );
        return ''. json_encode($reponse);
      }
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
        $token = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
        $dbprerogative = $this->em->getRepository('WSServerBundle:Prerogatives')->find($dbuser->getIdUser());
        $authorizedsession = new Authorizedsessions();
        $authorizedsession->setIdUser($dbuser->getIdUser());
        $authorizedsession->setAccessLevel($dbuser->getAccesslevel());
        $authorizedsession->setToken($token);
        $authorizedsession->setAuthorizedApis($dbprerogative->getAuthorizedApis());
        $authorizedsession->setDependsOn($dbuser->getDependsOn());
        $authorizedsession->setSessionStart(new \Datetime());

        $this->em->persist($authorizedsession);
        $this->em->flush();
        
        $reponse = array(
          'prenom' => $dbuser->getPrenom(),
          'token' => $token,
          'reponse' => true
        );
        return ''. json_encode($reponse);
      }

    }
    
}