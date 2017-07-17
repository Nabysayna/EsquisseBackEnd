<?php

namespace WSServerBundle\Services;

use WSServerBundle\Entity\Charges;


class ComptapdvService
{
    private $em;

    public function __construct(\Doctrine\ORM\EntityManager $entityManager){
      $this->em = $entityManager;
    }
   
    
    public function listevente($params) {   
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{      
        $formatted = array();
        $exploitationvente = $this->em->getRepository('WSServerBundle:Ventes')->findBy(array('idUser' => 4));
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
        $query = $this->em->createQuery("SELECT serv FROM WSServerBundle\Entity\Services serv WHERE serv.idadminpdv=3");
        $results = $query->getArrayResult();
        return ''. json_encode(array('errorCode' => 1, 'response' => $results));
      }
    }

    public function listecaisse($params) {   
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{      
        $query = $this->em->createQuery("SELECT cais.id, cais.soldeOuvert AS caisse, u.prenom, u.nom, u.idUser FROM WSServerBundle\Entity\Caisse cais, WSServerBundle\Entity\Users u WHERE cais.idadminpdv=3 and cais.idgerantpdv=u.idUser");
        $results = $query->getArrayResult();
        return ''. json_encode(array('errorCode' => 1, 'response' => $results));
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
    
    public function listecharge($params) {   
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{      
        $query = $this->em->createQuery("SELECT charg FROM WSServerBundle\Entity\Charges charg");
        $results = $query->getArrayResult();
        return ''. json_encode(array('errorCode' => 1, 'response' => $results));
      }
    }

    public function listerevenu($params) {   
        $formatted = array();
        $exploitationvente = $this->em->getRepository('WSServerBundle:Ventes')->findBy(array('idUser' => 4));
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

    public function ajoutservice($params) {   
        $reponse = array(
          'typedebouquet' => 'ajoutservice'
        );

        return ''. json_encode($reponse);
    }
    
    public function modifierservice($params) {   
        $reponse = array(
          'typedebouquet' => 'modifierservice'
        );

        return ''. json_encode($reponse);
    }
    public function supprimerservice($params) {   
        $reponse = array(
          'typedebouquet' => 'supprimerservice'
        );

        return ''. json_encode($reponse);
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