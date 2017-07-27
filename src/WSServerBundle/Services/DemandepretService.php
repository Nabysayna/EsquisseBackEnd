<?php

namespace WSServerBundle\Services;
use WSServerBundle\Entity\Authorizedsessions;

class DemandepretService
{

  private $em;
  private $demandepretClient;

  public function __construct(\Doctrine\ORM\EntityManager $entityManager)
  {
    $this->em = $entityManager;
  }

  public function demandepret($params)
    {
  
        $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params));

      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{
        
          $demandepret = $this->em->getRepository('WSServerBundle:Demandepret')->findBy(array('dependsOn' => $correspSession->getIdUser()));
          
          $formatted=[];
          
        foreach ($demandepret as $dmdp) {
            $formatted[] = [
               'plafond' => $dmdp->getPlafond()

              ];

            
        }
         return ''. json_encode($formatted);

        }
      
      
    }

    
    
     public function ajoutdemandepret($params) {   
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{      
        $newDemandepret = new Demandepret();
        $newDemandepret->setIduser( $correspSession->getIdUser());
        $newDemandepret->setMontantdemande($params->montantdemande);
        $this->em->persist($newDemandepret);
        $this->em->flush();
        
        return ''. json_encode(array('errorCode' => 1, 'response' => "ok"));
      }
    }

 

  }


