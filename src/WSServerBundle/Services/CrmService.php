<?php

namespace WSServerBundle\Services;
use Symfony\Component\Validator\Constraints\Date;

class CrmService
{

  private $em;
  private $crmClient;

  public function __construct(\Doctrine\ORM\EntityManager $entityManager)
  {
    $this->em = $entityManager;
  }

  public function portefeuille($params)
    {
    	$correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params));

      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{
        
          $portefeuille = $this->em->getRepository('WSServerBundle:Clients')->findBy(array('dependsOn' => $correspSession->getIdUser()));
          
          $formatted=[];
          
        foreach ($portefeuille as $cls) {
            $formatted[] = [
               'prenom' => $cls->getPrenom(),
               'nom' => $cls->getNom(),
               'nombre_operation' => $cls->getNbreOperation(),
               'telephone' => $cls->getTelephone(),
               'fidelite' => $cls->getFidelite(),
               'date_ajout' => $cls->getDateAjout()

              ];

            
        }
         return ''. json_encode($formatted);

        }
      
    }
    
  
  public function relance($params)
  {
  	$correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params));
  	$tayy = date("Y-m-d") ;
	$dateDansDix = date ('Y-m-d', strtotime($tayy.' +10 days')) ;


      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{
        
         $result = $this->em->getRepository('WSServerBundle:Tnt')->createQueryBuilder('t')->where("t.echeance <= :dateDansDix and t.dependsOn =:idUser")->setParameter('dateDansDix', $dateDansDix)->setParameter('idUser',$correspSession->getIdUser())->getQuery()->getArrayResult();

     		return ''.json_encode($result) ;


          }
        
        

  }

  public function promotion($params)
  {
  	$correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params));

      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{
        
          $clients = $this->em->getRepository('WSServerBundle:Clients')->findBy(array('dependsOn' => $correspSession->getIdUser()));

          
        foreach ($clients as $cls) {
            $formatted[] = [
               'prenom' => $cls->getPrenom(),
               'nom' => $cls->getNom(),
               'nombre_operation' => $cls->getNbreOperation(),
               'telephone' => $cls->getTelephone(),
               'fidelite' => $cls->getFidelite(),
               'date_ajout' => $cls->getDateAjout()

              ];

            
        }
         return ''. json_encode($formatted);

        }

  }

  public function prospection($params)
  {
  	$correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params));
  	

      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{
        
         $query = $this->em->createQuery("
          SELECT c 
          FROM WSServerBundle\Entity\Clients c
          where c.nbreOperation>2 and c.id not in(SELECT v.idClient FROM WSServerBundle\Entity\Ventes v ) 
          ");
        	
        	$result = $query->getArrayResult();

     		return ''.json_encode($result) ;


          }

  }

  public function suivicommande($params)
  {
  	$correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params));
  	$tayy = date("Y-m-d") ;
	$dateilyadeuxjrs = date ('Y-m-d', strtotime($tayy.' -2 days')) ;


      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{
        
         $result = $this->em->getRepository('WSServerBundle:Commandes')->createQueryBuilder('c')->where("c.dateCommande >= :dateilyadeuxjrs and c.dependsOn =:idUser")->setParameter('dateilyadeuxjrs', $dateilyadeuxjrs)->setParameter('idUser',$correspSession->getIdUser())->getQuery()->getArrayResult();

     		return ''.json_encode($result) ;


          }

  }
}


