<?php

namespace WSServerBundle\Services;
use WSServerBundle\Entity\Authorizedsessions;
use WSServerBundle\Entity\Charges;
use WSServerBundle\Entity\Reclamations;
use WSServerBundle\Entity\Ventes;
use WSServerBundle\Entity\Exploitations;
use WSServerBundle\Entity\Abonnements;
use WSServerBundle\Entity\Clients;
use WSServerBundle\Entity\Operations;


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
          $idGerant = $correspSession->getIdUser();

          $queryHisto = $this->em->createQuery("SELECT 
              o
              FROM 
              WSServerBundle\Entity\Operations o 
              WHERE o.idpdv=:idGerant and o.dateoperation>=:today
          ")->setParameter('idGerant', $idGerant)->setParameter('today', date('Y-m-d'));
          $results = $queryHisto->getArrayResult();
         return json_encode($results);

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
        $newReclamations->setEtat(0);
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
          if(strcasecmp($params->servicevente,'assurance')==0 )
          {
             $infoassurance=array('servicevente'=>$params->servicevente, 'designation'=>$params->designation);
             $params->designation=json_decode($params->designation)->desig;
          }
           

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
                  $today=new \Datetime();

                  $newVentes= new Ventes();
                  $newVentes->setDependOn( $correspSession->getDependsOn());
                  $newVentes->setIdClient(0);
                  $newVentes->setIdUser($correspSession->getIdUser());
                  $newVentes->setServicevente($params->servicevente);
                  $infovente = array('produit' =>$params->designation ,'nbrarticle'=>$params->quantite);
                  $newVentes->setInfovente(json_encode($infovente));
                  $newVentes->setMontant($tempDesignation->prixunitaire*$params->quantite);
                  $newVentes->setDateVente($today);
                  $this->em->persist($newVentes);
                  $exploitation=$this->em->getRepository('WSServerBundle:Exploitations')->findOneBy(array('produit'=>$params->designation, 'dateAjout'=>$today));
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
                    $newExploitation->setDateAjout($today);
                    $this->em->persist($newExploitation);

                  }
                  if(strcasecmp($params->servicevente,'assurance')==0 )
               {
                  $newAbonnement= new Abonnements();
                  $newAbonnement->setNomservice('assurance');
                  $infosup=json_encode( array('type'=>json_decode($infoassurance["designation"])->desig) );
                  $newAbonnement->setInfosup($infosup);
                  $newAbonnement->setPrenom(json_decode($infoassurance["designation"])->prenom);
                  $newAbonnement->setNom(json_decode($infoassurance["designation"])->nom);
                  $newAbonnement->setTelephone(json_decode($infoassurance["designation"])->telephone);
                  $newAbonnement->setDateajout( new \Datetime(json_decode($infoassurance["designation"])->datedebut) );
                  $newAbonnement->setEcheance( new \Datetime(json_decode($infoassurance["designation"])->datefin) );
                  $newAbonnement->setIdUser( $correspSession->getIdUser());
                  $newAbonnement->setDependsOn( $correspSession->getDependsOn());
                  $this->em->persist($newAbonnement);

                   $client = $this->em->getRepository('WSServerBundle:Clients')->findOneBy(array('telephone'=>$newAbonnement->getTelephone()));
                   if(empty($client))
                   {
                    $newClient= new Clients();
                    $newClient->setNom($newAbonnement->getNom());
                    $newClient->setPrenom($newAbonnement->getPrenom());
                    $newClient->setTelephone($newAbonnement->getTelephone());
                    $newClient->setIdUser( $correspSession->getIdUser());
                     $newClient->setDependsOn( $correspSession->getDependsOn());
                     $addTime = new \Datetime();
                     $newClient->setDateAjout($addTime);
                     $this->em->persist($newClient);

                   }
      
               }
               $this->em->flush();

               return ''. json_encode(array('errorCode' => 1, 'response' => "ok"));



              }

     
           }

}


