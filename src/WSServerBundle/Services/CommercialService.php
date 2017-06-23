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

    
 public function listcoursier($params)
    {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if (!empty($correspSession)){
  
        $coursiers = $this->em->getRepository('WSServerBundle:Users')->findBy(array('accesslevel' => 2));
        foreach ($coursiers as $coursier) {
            $formatted[] = [
               'id' => $coursier->getIdUser(),
               'prenom' => $coursier->getPrenom(),
               'nom' => $coursier->getNom()
              ];
        }

        return ''. json_encode($formatted);
      }
      return json_encode( array('errorCode' => 0, 'message' => 'Utilisateur non authentifié') ) ;
    }
    
function zone($params) {
        $reponse = ['Dakar', 'Diamalaye', 'Rufisque', 'Parcelles', 'VDN', 'Keur Mbaye fall'];                                    

        return ''. json_encode($reponse);


}


}