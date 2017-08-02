<?php

namespace WSServerBundle\Services;
use WSServerBundle\Entity\Authorizedsessions;
use WSServerBundle\Entity\Charges;
use WSServerBundle\Entity\Reclamations;
use WSServerBundle\Entity\Ventes;
use WSServerBundle\Entity\Exploitations;


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
          $service=$this->em->getRepository('WSServerBundle:Services')->findOneBy(array('nom'=>$params->servicevente));
           $designations=json_decode($service->getDesignations());
            foreach ($designations as $dsgn)
             {
                  if($dsgn->name==$params->designation)
                  {
                    $dsgn->stock=$dsgn->stock-$params->quantite;
                      
                  }
                  $tempDesignation=$dsgn;
              
              }
                  $service->setDesignations(json_encode($designations));
                  $this->em->persist($service);
                  $newVentes= new Ventes();
                  $newVentes->setDependOn( $correspSession->getDependsOn());
                  $newVentes->setIdClient(0);
                  $newVentes->setIdUser($correspSession->getIdUser());
                  $newVentes->setServicevente($params->servicevente);
                  $infovente = array('produit' =>$params->designation ,'nbrarticle'=>$params->quantite);
                  $newVentes->setInfovente(json_encode($infovente));
                  $newVentes->setMontant($tempDesignation->prixunitaire*$params->quantite);
                  $newVentes->setDateVente(new \Datetime());
                  $this->em->persist($newVentes);
                  $today=new \Datetime();
                  $exploitation=$this->em->getRepository('WSServerBundle:Exploitations')->findOneBy(array('produit'=>$params->designation, 'date'=>$today));
                  if(!empty($exploitation))
                  {
                    $exploitation->setVente($exploitation->getVente()+$params->quantite);
                    $exploitation->setStockfin($exploitation->getStockini()-$exploitation->getVente());
                    $exploitation->setMontant($params->quantite*$tempDesignation->prixunitaire);
                    $this->em->persist($exploitation);

                  }
                  else
                  {
                    $newExploitation= new Exploitations();
                    $newExploitation->setIdUser( $correspSession->getIdUser());
                    $newExploitation->setDependsOn( $correspSession->getDependsOn());
                    $newExploitation->setInfosup("");
                    $newExploitation->setProduit($params->designation);
                    $newExploitation->setStockini($tempDesignation->stock+$params->quantite);
                    $newExploitation->setVente($params->quantite);
                    $newExploitation->setStockfin($newExploitation->getStockini()-$newExploitation->getVente());
                    $newExploitation->setMontant($params->quantite*$tempDesignation->prixunitaire);
                    $newExploitation->setDate($today);
                    $this->em->persist($newExploitation);

                  }
               $this->em->flush();

               return ''. json_encode(array('errorCode' => 1, 'response' => "ok"));

              }
     
           }

}


