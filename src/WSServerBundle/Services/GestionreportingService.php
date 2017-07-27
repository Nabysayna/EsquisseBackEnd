<?php

namespace WSServerBundle\Services;
use WSServerBundle\Entity\Authorizedsessions;
use WSServerBundle\Entity\Charges;
use WSServerBundle\Entity\Reclamations;
use WSServerBundle\Entity\Ventes;


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

    public function servicepoint($params)
    {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params));

      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{
        
          $servicept = $this->em->getRepository('WSServerBundle:Services')->findBy(array('idpdv' => $correspSession->getIdUser()));
          
          $formatted=[];
          
        foreach ($servicept as $srv) {
            $formatted[] = [
               'nom' => $srv->getNom(),
               'designations' => $srv->getDesignations()

              ];

            
        }
         return ''. json_encode($formatted);

        }
    }

     public function ajoutdepense($params) {   
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{      
        $newCharge = new Charges();
        $newCharge->setIduser( $correspSession->getIdUser());
        $newCharge->setDateajout(new \Datetime());
        $newCharge->setMontant($params->montant);
        $newCharge->setService($params->service);
        $newCharge->setLibelle($params->libelle);

        $this->em->persist($newCharge);
        $this->em->flush();
        
        return ''. json_encode(array('errorCode' => 1, 'response' => "ok"));
      }
    }
    
     public function reclamation($params) {   
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{      
        $newReclamations = new Reclamations();
        $newReclamations->setIduser( $correspSession->getIdUser());
        $newReclamations->setSujet($params->sujet);
        $newReclamations->setNomservice($params->nomservice);
        $newReclamations->setMessage($params->message);
        $newReclamations->setDateajout(new \Datetime());

        $this->em->persist($newReclamations);
        $this->em->flush();
        
        return ''. json_encode(array('errorCode' => 1, 'response' => "ok"));
      }
    }

     public function vente($params) {   
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));
      

      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{   
        $service = $this->em->getRepository('WSServerBundle:Services')->findBy(array('nom'=>$params->servicevente));
        $listedesignations=json_decode($service->getDesignations());
        $desigCurrent=null;
        foreach ($listedesignations as $designation) {
          if($designation->name==$params->designation){
            $designation->stock=$designation->stock-$params->quantite;
            $desigCurrent=$designation;
          }
        }
        $montant=$params->quantite*$desigCurrent->prixunitaire;
        $service->setDesignations($listedesignations);
        persist($service);   

        $newVentes = new Ventes();
        $newVentes->setIduser( $correspSession->getIdUser());
        $newVentes->setDependOn($correspSession->getDependsOn());
        $newVentes->setMontant($montant);
        $newVentes->setDateVente(new \Datetime());
        $newVentes->setTypedevente($service->getNom());
        $infovente = array('designations' =>$params->designation ,'stocki' );
        $newVentes->setInfovente($params->infovente);
        $newVentes->setIdClient($params->idclient);
        $newVentes->setServicevente($params->servicevente);


        $this->em->persist($newVentes);
        $this->em->flush();
        
        return ''. json_encode(array('errorCode' => 1, 'response' => "ok"));
      }
    }
    
  
 

  }


