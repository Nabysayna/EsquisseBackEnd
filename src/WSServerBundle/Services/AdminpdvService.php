<?php

namespace WSServerBundle\Services;

use WSServerBundle\Entity\Tnt;
use WSServerBundle\Entity\Authorizedsessions;


class AdminpdvService
{

    private $em;

    public function __construct(\Doctrine\ORM\EntityManager $entityManager)
    {
      $this->em = $entityManager;
    }

    function listuserpdv($params) {
      $adminpdv = $this->em->createQuery("SELECT u FROM WSServerBundle\Entity\Users u WHERE u.idUser=3");
      $results1 = $adminpdv->getArrayResult();
      if(empty($results1))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{      
        $query = $this->em->createQuery("SELECT u FROM WSServerBundle\Entity\Users u WHERE u.dependsOn=:ondepends")->setParameter('ondepends', $results1[0]['idUser']);
        $results = $query->getArrayResult();
        $datapdv = [];
        foreach ($results as $value) {
          $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('idUser'=>$value['idUser']));
          $datapdv[] = array(
            'idpdv' => $value['idUser'],
            'pdv' => $value['prenom']." ".$value['nom'],
            'adresse' => $value['adresse'],
            'telephone' => $value['telephone'],
            'statusconnect' => empty($correspSession)
          );
        }
        
        return ''. json_encode($datapdv);
      }
    }

    function modifypdv($params) {
      $reponse = [
        array(
          'datereclamation' => "2007-05-10"
        ),
      ];

      return ''. json_encode($reponse);
    }

    function historiquereclamation($params) {
      // $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));
      // if(empty($correspSession))
      //   return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      // else{      
        $query = $this->em->createQuery("SELECT 
           recl.dateajout AS datereclamation,
           recl.nomservice AS typeservice,
           recl.etat AS etatreclamation,
           CONCAT(uadminpdv.prenom,' ', uadminpdv.nom) AS adminpdv,
           CONCAT(updv.prenom,' ', updv.nom) AS pdv,
           updv.telephone, updv.adresse 
           FROM
           WSServerBundle\Entity\Reclamations recl, WSServerBundle\Entity\Users updv, WSServerBundle\Entity\Users uadminpdv
           WHERE
           recl.iduser=updv.idUser and updv.accesslevel=uadminpdv.idUser
        ");
        $results = $query->getArrayResult();
        return ''. json_encode( array('errorCode' => 1, 'response' => $results) );
      // }
    }

    function nombredereclamationpdvvente($params) {
      
      // $authorized_apis = $this->em->getRepository('WSServerBundle:Prerogatives')->find(2);
      // $apis_auth = explode("-", $authorized_apis->getAuthorizedApis());

      // $reponse = array(
      //   'typedebouquet' => 'nombredereclamationpdvvente',
      //   'response' => $apis_auth
      // );

      // return ''. json_encode($reponse);

        $query = $this->em->createQuery("SELECT apis FROM WSServerBundle\Entity\Apis apis");
        $results = $query->getArrayResult();
        $services = [];
        $depositinitial = [];
        $depositconsomme = [];
        foreach ($results as $value) {
          $services[] = $value['nomApi'];
          $depositinitial[] = $value['caution'];
          $depositconsomme[] = $value['cautionconsomme'];
        }
        $reponse = array(
          'services' => $services,
          'depositinitial' => $depositinitial,
          'depositconsomme' => $depositconsomme
        );
        return ''. json_encode( array('errorCode' => 1, 'response' => $reponse) ) ;

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
          'id' => 1,
          'fullname' => "Assane KA",
          'nbreoperation' => 123,
          'montanttotal' => 123000,
        ),
        array(
          'id' => 2,
          'fullname' => "Naby NDIAYE",
          'nbreoperation' => 120,
          'montanttotal' => 120000,
        ),
        array(
          'id' => 3,
          'fullname' => "Bamba GNING",
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

    function bilandeposit($params) {
      $reponse = array(
        'depositInitial' => 1000000,
        'depositConsomme' => 300000,
        'depositRestant' => 700000,
        'commission' => 30000
      );

      return ''. json_encode($reponse);
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

    // function historiquerecouvrement($params) {
    //   $reponse = [
    //     array(
    //       'pdv' => 'Assane KA',
    //       'montantconsomme' => 500000,
    //       'commission' => 50000,
    //       'montantrecouvre' => 50000,
    //       'montantrestant' => 50000,
    //       'daterecouvrement' => "2007-05-10"
    //     ),
    //     array(
    //       'pdv' => 'Naby NDIAYE',
    //       'montantconsomme' => 300000,
    //       'commission' => 30000,
    //       'montantrecouvre' => 50000,
    //       'montantrestant' => 50000,
    //       'daterecouvrement' => "2007-05-10"
    //     ),
    //     array(
    //       'pdv' => 'Bamba GNING',
    //       'montantconsomme' => 200000,
    //       'commission' => 20000,
    //       'montantrecouvre' => 50000,
    //       'montantrestant' => 50000,
    //       'daterecouvrement' => "2007-05-10"
    //     ),
    //   ];

    //   return ''. json_encode($reponse);
    // }

    // function historiquereclamation($params) {
    //   $reponse = [
    //     array(
    //       'pdv' => 'Assane KA',
    //       'reclamation' => "Pas de lait",
    //       'datereclamation' => "2007-05-10"
    //     ),
    //     array(
    //       'pdv' => 'Naby NDIAYE',
    //       'reclamation' => "Trop à lese",
    //       'datereclamation' => "2007-05-10"
    //     ),
    //     array(
    //       'pdv' => 'Bamba GNING',
    //       'reclamation' => "Parité",
    //       'datereclamation' => "2007-05-10"
    //     ),
    //   ];

    //   return ''. json_encode($reponse);
    // }

    

}