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
        $reponse = ['Amath', 'Demba', 'Oury', 'Adja', 'Aliou', 'Sy'];                                    

        return ''. json_encode($reponse);


}
    
function zone($params) {
        $reponse = ['Dakar', 'Diamalaye', 'Rufisque', 'Parcelles', 'VDN', 'Keur Mbaye fall'];                                    

        return ''. json_encode($reponse);


}


}