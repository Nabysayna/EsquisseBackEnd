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

    
 public function listoperateurs($params)
    {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if (!empty($correspSession)){
  
        $operateurs = $this->em->getRepository('WSServerBundle:Users')->findBy(array('accesslevel' => 2));
        
        foreach ($operateurs as $operateur) {
            $formatted[] = [
               'id' => $operateur->getIdUser(),
               'prenom' => $operateur->getPrenom(),
               'nom' => $operateur->getNom(),
               'adresse' => $operateur->getAdresse(),
               'telephone' => $operateur->getTelephone(),
               'accesslevel' => $operateur->getAccesslevel()

              ];
        }

        $coursierss = $this->em->getRepository('WSServerBundle:Users')->findBy(array('accesslevel' => 3));
        foreach ($coursierss as $coursiere) {
            $formatted[] = [
               'id' => $coursiere->getIdUser(),
               'prenom' => $coursiere->getPrenom(),
               'nom' => $coursiere->getNom(),
               'adresse' => $coursiere->getAdresse(),
               'telephone' => $coursiere->getTelephone(),
               'accesslevel' => $coursiere->getAccesslevel()

              ];
        }

        return ''. json_encode($formatted);
      }
      return json_encode( array('errorCode' => 0, 'message' => 'Utilisateur non authentifié') ) ;
    }

     public function listcommerciaux($params)
    {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if (!empty($correspSession)){
  
        $operateurs = $this->em->getRepository('WSServerBundle:Users')->findBy(array('accesslevel' => 7));
        
        foreach ($commerciaux as $commercial) {
            $formatted[] = [
               'id' => $commercial->getIdUser(),
               'prenom' => $commercial->getPrenom(),
               'nom' => $commercial->getNom()

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