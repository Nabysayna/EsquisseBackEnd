<?php

namespace WSServerBundle\Services;


class ComptapdvService
{
    private $em;

    public function __construct(\Doctrine\ORM\EntityManager $entityManager){
      $this->em = $entityManager;
    }
   
    // Define the method as a PHP function
    public function totaloperationparapi($params) {   
      $reponse = array(
        'api' => 1,
        'token' => 'as12',
        'typedebouquet' => '123'
      );

      return ''. json_encode($reponse);
    }

    public function totalenvoiesparapi($params) {   
      $reponse = array(
        'api' => 1,
        'token' => 'as12',
        'typedebouquet' => '123'
      );

      return ''. json_encode($reponse);
    }

    public function totalreceptionsparapi($params) {   
      $reponse = array(
        'api' => 1,
        'token' => 'as12',
        'typedebouquet' => '123'
      );

      return ''. json_encode($reponse);
    }

    public function totalfraistransfertpercueparapi($params) {   
      $reponse = array(
        'api' => 1,
        'token' => 'as12',
        'typedebouquet' => '123'
      );

      return ''. json_encode($reponse);
    }

    public function totalcommissionparapi($params) {   
      $reponse = array(
        'api' => 1,
        'token' => 'as12',
        'typedebouquet' => '123'
      );

      return ''. json_encode($reponse);
    }

    public function totaloperationall($params) {   
      $reponse = array(
        'api' => 1,
        'token' => 'as12',
        'typedebouquet' => '123'
      );

      return ''. json_encode($reponse);
    }

    public function totalenvoiesall($params) {   
      $reponse = array(
        'api' => 1,
        'token' => 'as12',
        'typedebouquet' => '123'
      );

      return ''. json_encode($reponse);
    }

    public function totalreceptionsall($params) {   
      $reponse = array(
        'api' => 1,
        'token' => 'as12',
        'typedebouquet' => '123'
      );

      return ''. json_encode($reponse);
    }

    public function totalfraistransfertpercuesall($params) {   
      $reponse = array(
        'api' => 1,
        'token' => 'as12',
        'typedebouquet' => '123'
      );

      return ''. json_encode($reponse);
    }
    
    public function totalcommissionall($params) {   
      $reponse = array(
        'api' => 1,
        'token' => 'as12',
        'typedebouquet' => '123'
      );

      return ''. json_encode($reponse);
    }



    
}