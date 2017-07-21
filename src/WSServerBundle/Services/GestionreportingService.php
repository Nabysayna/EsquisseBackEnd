<?php

namespace WSServerBundle\Services;

class GestionreportingService
{

  private $em;
  private $gestionreportingClient;

  public function __construct(\Doctrine\ORM\EntityManager $entityManager)
  {
    $this->em = $entityManager;
  }

  public function gestionreporting($params)
    {
  
        $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params));

      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{
        
          $gestreport = $this->em->getRepository('WSServerBundle:Operations')->findBy(array('dependsOn' => $correspSession->getIdUser()));
          
          $formatted=[];
          
        foreach ($gestreport as $gst) {
            $formatted[] = [
               'date' => $gst->getDate(),
               'operateur' => $gst->getOperateur(),
               'traitement' => $gst->getTraitement(),
               'montant' => $gst->getMontant()

              ];

            
        }
         return ''. json_encode($formatted);

        }
      
      
    }
    
  
 

  }


