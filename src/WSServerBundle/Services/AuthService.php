<?php

namespace WSServerBundle\Services;

class AuthService
{
    private $em;

  	public function __construct(\Doctrine\ORM\EntityManager $entityManager){
  		$this->em = $entityManager;
  	}

    public function testDB(){
      $dbuser = $this->em->getRepository('WSServerBundle:User')->findOneBy(array('login' => 'assane@ka.com', 'pwd' => 'assaneka'));
      
      if (empty($dbuser)) {
        return array(
          'prenom' => '',
          'token' => '',
          'reponse' => false
        );
      }
      else {
        return array(
          'prenom' => $dbuser->getPrenom(),
          'token' => sha1($dbuser->getPrenom()),
          'reponse' => true
        );
      }
    }

    public function hello($name)
    {
        return 'OKA says hello , '.$name;
    }

    function authentification($user) {
      $dbuser = $this->em->getRepository('WSServerBundle:User')->findOneBy(array('login' => $user->login, 'pwd' => $user->pwd));
      
      if (empty($dbuser)) {
        return array(
          'prenom' => '',
          'token' => '',
          'reponse' => false
        );
      }
      else {
        return array(
          'prenom' => $dbuser->getPrenom(),
          'token' => sha1($dbuser->getPrenom()),
          'reponse' => true
        );
      }
    }
    
}