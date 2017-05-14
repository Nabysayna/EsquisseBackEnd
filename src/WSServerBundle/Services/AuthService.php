<?php

namespace WSServerBundle\Services;

class AuthService
{
    private $em;

  	public function __construct(\Doctrine\ORM\EntityManager $entityManager){
  		$this->em = $entityManager;
  	}

    public function hello($name)
    {
        return 'OKA says hello , '.$name;
    }
    
    // public function authentification($login){
    //   // $dbuser = $this->em->getRepository('WSServerBundle:User')->findOneBy(array('login' => $connect['login'],'pwd' => $connect['pwd']));
      
    //   // $result = '';
    //   // $formatted = [];
    //   // $message = ['response' => 'OK'];
    //   // if (empty($user)) {
    //   //   $message = ['response' => 'User not found'];
    //   //   $result = 'faux';
    //   // }
    //   // else {
    //   //   $formatted = [
    //   //      'id' => $user->getId(),
    //   //      'prenom' => $user->getPrenom(),
    //   //      'nom' => $user->getNom(),
    //   //      'email' => $user->getLogin(),
    //   //   ];
    //   //   $result .=  $user->getPrenom();
    //   // }
    //   // // return array('user' => $formatted, 'message' => $message) ;      
    //   // return $result ;      
    //   // return $testConnect;

    //   return $login;
    // //   return array(
    // //             'login' => 'assane',
    // //             'pwd' => 'ka'
    // //             );
    // }

    function authentification($user) {
      $prenom = 'Assane says hello , ' . $user['login'] .'. It is nice to meet a ' . $user['pwd'];
    
    $token = sha1($user['login'].'-'.$user['pwd']);
    $result = $user['login'] == $user['pwd'];

    return array(
                'prenom' => $prenom,
                'token' => $token,
                'result' => $result
                );
    }
    
}