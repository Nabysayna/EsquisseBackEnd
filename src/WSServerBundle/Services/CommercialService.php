<?php

namespace WSServerBundle\Services;

class CommercialService
{

  private $em;
  private $expressocashClient;

  public function __construct(\Doctrine\ORM\EntityManager $entityManager)
  {
    $this->em = $entityManager;
  }

    
function listcoursier($params) {
        $reponse = array(
          'test' => 'test testons testez listcoursier'
        );

        return ''. json_encode($reponse);


}


}