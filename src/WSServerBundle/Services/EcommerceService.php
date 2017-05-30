<?php

namespace WSServerBundle\Services;

class EcommerceService
{
    private $em;

  	public function __construct(\Doctrine\ORM\EntityManager $entityManager){
  		$this->em = $entityManager;
  	}

   
    public function ajoutarticle($params)
    {
        $reponse = array(
          'api' => 1,
          'token' => 'as12',
          'typedebouquet' => '123'
        );

        return ''. json_encode($reponse);
    }
    public function ajoutcommande($params)
    {
        $reponse = array(
          'api' => 1,
          'token' => 'as12',
          'typedebouquet' => '123'
        );

        return ''. json_encode($reponse);
    }
    public function ajoutvente($params)
    {
        $reponse = array(
          'api' => 1,
          'token' => 'as12',
          'typedebouquet' => '123'
        );

        return ''. json_encode($reponse);
    }
    public function listerarticle($params)
    {
        $reponse = array(
          'api' => 1,
          'token' => 'as12',
          'typedebouquet' => '123'
        );

        return ''. json_encode($reponse);
    }
    public function listercommande($params)
    {
        $reponse = array(
          'api' => 1,
          'token' => 'as12',
          'typedebouquet' => '123'
        );

        return ''. json_encode($reponse);
    }
    public function listervente($params)
    {
        $reponse = array(
          'api' => 1,
          'token' => 'as12',
          'typedebouquet' => '123'
        );

        return ''. json_encode($reponse);
    }



    
}