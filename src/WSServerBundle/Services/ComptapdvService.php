<?php

namespace WSServerBundle\Services;

use WSServerBundle\Entity\Charges;
use WSServerBundle\Entity\Services;
use WSServerBundle\Entity\Designations;


class ComptapdvService
{
    private $em;

    public function __construct(\Doctrine\ORM\EntityManager $entityManager){
      $this->em = $entityManager;
    }
   
    
    public function listecaisse($params) {   
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{      
        $query = $this->em->createQuery("SELECT cais.id, cais.soldeOuvert AS caisse, u.prenom, u.nom, u.idUser AS idpdv FROM WSServerBundle\Entity\Caisse cais, WSServerBundle\Entity\Users u WHERE cais.idadminpdv=:idadminpdv and cais.idgerantpdv=u.idUser")->setParameter('idadminpdv', $correspSession->getIdUser());
        $results = $query->getArrayResult();
        return ''. json_encode(array('errorCode' => 1, 'response' => $results));
      }
    }
    
    public function etatcaisse($params) {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));
      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{      
        $query = $this->em->createQuery("SELECT cais FROM WSServerBundle\Entity\Caisse cais WHERE cais.idgerantpdv=:idgerantpdv")->setParameter('idgerantpdv', $correspSession->getIdUser());
        $results = $query->getArrayResult();
        return ''. json_encode(array('errorCode' => 1, 'response' => $results[0]));
      }
    }

    public function validerapprovisionn($params) {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{      
        $caissepdv = $this->em->getRepository('WSServerBundle:Caisse')->find($params->idcaisse);
        $caissepdv->setEtat(1);
        $this->em->flush();   
        return ''. json_encode(array('errorCode' => 1, 'response' => "ok"));
      }
    }

    public function approvisionner($params) {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{      
        $caissepdv = $this->em->getRepository('WSServerBundle:Caisse')->find($params->idpdv);
        $newsolde = $caissepdv->getSoldeOuvert() + $params->montant;
        $caissepdv->setSoldeOuvert($newsolde);
        $this->em->flush();   
        return ''. json_encode(array('errorCode' => 1, 'response' => "ok"));
      }
    }

    public function listecharge($params) {   
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{      
        $query = $this->em->createQuery("SELECT charg FROM WSServerBundle\Entity\Charges charg WHERE charg.iduser=:idpdv")->setParameter('idpdv', $params->idpdv);
        $results = $query->getArrayResult();
        return ''. json_encode(array('errorCode' => 1, 'response' => $results));
      }
    }

    public function ajoutcharge($params) {   
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{      
        $newCharge = new Charges();
        $newCharge->setIduser($params->idpdv);
        $newCharge->setDateAjout(new \Datetime());
        $newCharge->setMontant($params->montant);
        $newCharge->setService($params->service);
        $newCharge->setLibelle($params->libelle);

        $this->em->persist($newCharge);
        $this->em->flush();
        
        return ''. json_encode(array('errorCode' => 1, 'response' => "ok"));
      }
    }
    
    public function listerevenu($params) {   
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{      
        $formatted = array();
        $exploitationvente = $this->em->getRepository('WSServerBundle:Ventes')->findBy( array('idUser' => $params->idpdv) );
        foreach ($exploitationvente as $vente) {
            $infovente = json_decode( $vente->getInfovente() );
            $formatted[] = [
               'service' => $vente->getType(),
               'libelle' => $infovente->designation,
               'montant' => $vente->getMontant(),
               'date' => $vente->getDateVente(),
              ];
        }

        return ''. json_encode(array('errorCode' => 1, 'response' => $formatted));
      }
    }

    public function listevente($params) {   
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{      
        $formatted = array();
        $exploitationvente = $this->em->getRepository('WSServerBundle:Ventes')->findBy(array('idUser' => $params->idpdv));
        foreach ($exploitationvente as $vente) {
            $infovente = json_decode( $vente->getInfovente() );
            $formatted[] = [
               'idpdv' => $vente->getIdUser(),
               'designation' => $infovente->designation,
               'stocki' => $infovente->stocki,
               'vente' => $infovente->stockvente,
               'stockf' => $infovente->stocki - $infovente->stockvente,
               'mnt' => $vente->getMontant(),
              ];
        }

        return ''. json_encode(array('errorCode' => 1, 'response' => $formatted));
      }
    }

    public function listeservice($params) {   
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{      
        $query = $this->em->createQuery("SELECT serv.id AS idservice, serv.nom AS services, serv.designations AS design FROM WSServerBundle\Entity\Services serv WHERE serv.idadminpdv=:idadmin")->setParameter('idadmin', $correspSession->getIdUser());
        $results = $query->getArrayResult();
        return ''. json_encode(array('errorCode' => 1, 'response' => $results));
      }
    }
    public function ajoutservice($params) {   
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{        
        $existservice = $this->em->getRepository('WSServerBundle:Services')->findOneBy(array('nom' => $params->nom, 'idadminpdv' => $correspSession->getIdUser(), 'idpdv' => $params->idpdv));
        if(empty($existservice)){
          $newService = new Services();
          $newService->setDateAjout(new \Datetime());
          $newService->setIdadminpdv($correspSession->getIdUser());
          $newService->setDesignations($params->designations);
          $newService->setNom($params->nom);
          $newService->setIdpdv($params->idpdv);
          $this->em->persist($newService);
          $this->em->flush();
        }
        return ''. json_encode(array('errorCode' => 1, 'response' => "ok"));
      }
    }
    
    public function modifierservice($params) {   
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{        
        $existservice = $this->em->getRepository('WSServerBundle:Services')->find($params->idservice);
        $existservice->setDesignations($params->designations);
        $existservice->setNom($params->service);
          
        $this->em->flush(); 

        return ''. json_encode(array('errorCode' => 1, 'response' => 'ok'));
      }
    }
    public function supprimerservice($params) {   
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{        
        $existservice = $this->em->getRepository('WSServerBundle:Services')->find($params->idsupprimer);        
        $this->em->remove($existservice);
        $this->em->flush(); 

        return ''. json_encode(array('errorCode' => 1, 'response' => 'ok'));
      }
    }

    public function userexploitation($params) {
      $result = array('prenom' => 'Tous','nom' => 'Tous', 'idpdv' => -1);
      $results1 = array($result);
      $query = $this->em->createQuery("SELECT DISTINCT u.prenom, u.nom, u.idUser AS idpdv FROM WSServerBundle\Entity\Users u WHERE u.dependsOn=:idadminpdv")->setParameter('idadminpdv', 2);
      $results2 = $query->getArrayResult();
      $results = array_merge ( $results1, $results2);
      return ''. json_encode(array('errorCode' => 1, 'response' => $results));
    }

    public function exploitation($params) {   
      $formatted = array();
      $exploitationvente = $this->em->getRepository('WSServerBundle:Exploitations')->findBy(array('dependsOn' => 2));
      foreach ($exploitationvente as $vente) {
          $formatted[] = [
             'idpdv' => $vente->getIdUser(),
             'designation' => $vente->getProduit(),
             'stocki' => $vente->getStockini(),
             'vente' => $vente->getVente(),
             'stockf' => $vente->getStockfin(),
             'mnt' => $vente->getMontant(),
             'dateajout' => $vente->getDate(),
            ];
      }

      return ''. json_encode(array('errorCode' => 1, 'response' => $formatted));
    }

    public function totaloperationparapi($params) {   
      $reponse = array(
        'typedebouquet' => 'totaloperationparapi'
      );

      return ''. json_encode($reponse);
    }

    public function totalenvoiesparapi($params) {   
      $reponse = array(
        'typedebouquet' => 'totalenvoiesparapi'
      );

      return ''. json_encode($reponse);
    }

    public function totalreceptionsparapi($params) {   
      $reponse = array(
        'typedebouquet' => 'totalreceptionsparapi'
      );

      return ''. json_encode($reponse);
    }

    public function totalfraistransfertpercueparapi($params) {   
      $reponse = array(
        'typedebouquet' => 'totalfraistransfertpercueparapi'
      );

      return ''. json_encode($reponse);
    }

    public function totalcommissionparapi($params) {   
      $reponse = array(
        'typedebouquet' => 'totalcommissionparapi'
      );

      return ''. json_encode($reponse);
    }

    public function totaloperationall($params) {   
      $reponse = array(
        'typedebouquet' => 'totaloperationall'
      );

      return ''. json_encode($reponse);
    }

    public function totalenvoiesall($params) {   
      $reponse = array(
        'typedebouquet' => 'totalenvoiesall'
      );

      return ''. json_encode($reponse);
    }

    public function totalreceptionsall($params) {   
      $reponse = array(
        'typedebouquet' => 'totalreceptionsall'
      );

      return ''. json_encode($reponse);
    }

    public function totalfraistransfertpercuesall($params) {   
      $reponse = array(
        'typedebouquet' => '123'
      );

      return ''. json_encode($reponse);
    }
    
    public function totalcommissionall($params) {   
      $reponse = array(
        'typedebouquet' => 'totalcommissionall'
      );

      return ''. json_encode($reponse);
    }



    
}