<?php

namespace WSServerBundle\Services;

use WSServerBundle\Entity\Authorizedsessions;


class AdminpdvService
{

    private $em;

    public function __construct(\Doctrine\ORM\EntityManager $entityManager)
    {
      $this->em = $entityManager;
    }

    function historiquereclamation($params) {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));
      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{      
        $query = $this->em->createQuery("SELECT 
           recl.dateajout AS datereclamation,
           recl.nomservice AS typeservice,
           recl.etat AS etatreclamation,
           CONCAT(updv.prenom,' ', updv.nom) AS pdv,
           updv.telephone, updv.adresse 
           FROM
           WSServerBundle\Entity\Users updv, WSServerBundle\Entity\Reclamations recl
           WHERE
           updv.dependsOn=:idadmin and recl.iduser=updv.idUser 
        ")->setParameter('idadmin', $correspSession->getIdUser());
        $results = $query->getArrayResult();
        return ''. json_encode( array('errorCode' => 1, 'response' => $results) );
      }
    }

    function listuserpdv($params) {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));
      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{      
        $query = $this->em->createQuery("SELECT u FROM WSServerBundle\Entity\Users u WHERE u.dependsOn=:ondepends")->setParameter('ondepends',$correspSession->getIdUser());
        $results = $query->getArrayResult();
        $datapdv = [];
        foreach ($results as $value) {
          $openSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('idUser'=>$value['idUser']));
          $datapdv[] = array(
            'idpdv' => $value['idUser'],
            'pdv' => $value['prenom']." ".$value['nom'],
            'adresse' => $value['adresse'],
            'telephone' => $value['telephone'],
            'isconnect' => $openSession
          );
        }
        
        return ''. json_encode($datapdv);
      }
    }

    function modifypdv($params) {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));
      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{   
        $user = $this->em->getRepository('WSServerBundle:Users')->find($params->idpdv);
        $user->setPwd($params->modifydata);
        $this->em->flush();
           
        return ''. json_encode( array('errorCode' => 1, 'response' => "ok") );
      }
    }

    function deconnectpdv($params)
    {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));
      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{   
        $openSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('idUser'=>$params->idpdv));
        if(!empty($openSession)){
          $this->em->remove($openSession);
          $this->em->flush(); 
        }   
        return ''. json_encode( array('errorCode' => 1, 'response' => 'ok') );
      }
    }

    function bilandeposit($params) {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));
      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{      
        $depositetat = $this->em->getRepository('WSServerBundle:Cautions')->findOneBy(array('idUser'=>$correspSession->getIdUser()));
        $response = array(
            'depositinitial' => $depositetat->getCaution(),
            'depositconsomme' => $depositetat->getCautionconsomme(),
            'commission' => $depositetat->getCautionconsomme() - $depositetat->getCaution()
        );
        return ''. json_encode($response);
      }
    }

    function nombredereclamationpdvvente($params) {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{      
        $query1 = $this->em->createQuery("SELECT 
           count(recl) AS nbreclamations
           FROM WSServerBundle\Entity\Reclamations recl
        ");
        $results1 = $query1->getArrayResult();
        $query2 = $this->em->createQuery("SELECT 
           count(a) AS nbarticlesvendus
           FROM WSServerBundle\Entity\Articles a
        ");
        $results2 = $query2->getArrayResult();

        $reponse = array(
          'nbreclamations' => $results1[0]['nbreclamations'],
          'nbarticlesvendus' => $results2[0]['nbarticlesvendus']
        );

        return ''. json_encode( array('errorCode' => 1, 'response' => $reponse) ) ;
      }
    }

    function consommationdepositservice($params) {
      $reponse = [
        array(
          'service' => 'Tnt',
          'montantconsomme' => 500000,
          'commission' => 50000
        ),
        array(
          'service' => 'Post-Cash',
          'montantconsomme' => 300000,
          'commission' => 30000
        ),
        array(
          'service' => 'Joni-Joni',
          'montantconsomme' => 200000,
          'commission' => 20000
        ),
      ];

      return ''. json_encode($reponse);
    }

    function montanttransfertservice($params) {
      $reponse = array(
        'id' => 1,
        'typeservice' => ['Post-Cash', 'Joni-Joni', 'TNT', 'Expresso-Cash'],
        'montanttotal' => [900000, 750000, 1350000, 650000]
      );

      return ''. json_encode($reponse);
    }

    function performancepdv($params) {
      $reponse = [
        array(
          'idpdv' => 4,
          'fullname' => "Assane KA",
          'telephone' => 7777123,
          'nbreoperation' => 123,
          'montanttotal' => 123000,
        ),
        array(
          'idpdv' => 5,
          'fullname' => "Bamba GNING",
          'telephone' => 7777100,
          'nbreoperation' => 100,
          'montanttotal' => 100000,
        ),
      ];

      return ''. json_encode($reponse);
    }

    function notifications($params) {
      $reponse = [
        array(
          'id' => 1,
          'type' => "Nouvelle Reclamation",
          'datenotification' => "12/3/2020 11:11:11",
        ),
        array(
          'id' => 2,
          'type' => "Etat deposit",
          'datenotification' => "12/3/2020 22:11:11",
        ),
        array(
          'id' => 3,
          'type' => "Nouveau Recouvrement",
          'datenotification' => "12/3/2020 20:11:11",
        ),
      ];

      return ''. json_encode($reponse);
    }

    function consommationdepositpdv($params) {
      $reponse = [
        array(
          'pdv' => 'Assane KA',
          'adresse' => "Pikine",
          'montantconsomme' => 500000,
          'commission' => 50000
        ),
        array(
          'pdv' => 'Naby NDIAYE',
          'adresse' => "Parcelle",
          'montantconsomme' => 300000,
          'commission' => 30000
        ),
        array(
          'pdv' => 'Bamba GNING',
          'adresse' => "Diamalaye",
          'montantconsomme' => 200000,
          'commission' => 20000
        ),
      ];

      return ''. json_encode($reponse);
    }

}