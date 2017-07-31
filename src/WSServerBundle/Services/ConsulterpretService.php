<?php

namespace WSServerBundle\Services;
use WSServerBundle\Entity\Authorizedsessions;
use WSServerBundle\Entity\Demandepret;

class ConsulterpretService
{

  private $em;
  private $consulterpretClient;

  public function __construct(\Doctrine\ORM\EntityManager $entityManager)
  {
    $this->em = $entityManager;
  }

  public function consulterpret($params)
    {
  
        $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params));

      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{
        
          $consulterpret = $this->em->getRepository('WSServerBundle:Demandepret')->findBy(array('dependsOn' => $correspSession->getIdUser()));
          
          $formatted=[];
          
        foreach ($consulterpret as $cltp) {
            $formatted[] = [
               'montantdemande' => $cltp->getmontantdemande()

              ];

            
        }
         return ''. json_encode($formatted);

        }
      
      
    }

    
    
 

  }


