<?php

namespace WSServerBundle\Services;
use WSServerBundle\Entity\Authorizedsessions;


class AdminmultipdvService
{

    private $em;

    public function __construct(\Doctrine\ORM\EntityManager $entityManager)
    {
      $this->em = $entityManager;
    }

    function nombredereclamationagentpdvvente($params) {
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
           count(adminpdv) AS nbreadminpdv
           FROM WSServerBundle\Entity\Users adminpdv
           WHERE adminpdv.accesslevel=2
        ");
        $results2 = $query2->getArrayResult();
        $query3 = $this->em->createQuery("SELECT 
           count(pdv) AS nbrepdv
           FROM WSServerBundle\Entity\Users pdv
           WHERE pdv.accesslevel=3
        ");
        $results3 = $query3->getArrayResult();
        $query4 = $this->em->createQuery("SELECT 
           count(a) AS nbarticlesvendus
           FROM WSServerBundle\Entity\Articles a
        ");
        $results4 = $query4->getArrayResult();

         $reponse = array(
          'nbreclamations' => $results1[0]['nbreclamations'],
          'nbagents' => $results2[0]['nbreadminpdv'],
          'nbpdv' => $results3[0]['nbrepdv'],
          'nbarticlesvendus' => $results4[0]['nbarticlesvendus']
        );

        return ''. json_encode( array('errorCode' => 1, 'response' => $reponse) ) ;
      }
    }

    function bilandeposit($params) {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{      
        $query = $this->em->createQuery("SELECT 
           SUM(apis.caution) AS depositInitial,
           SUM(apis.cautionconsomme) AS depositConsomme
           FROM WSServerBundle\Entity\Apis apis
        ");
        $results = $query->getArrayResult();
        $data = $results[0];
        $reponse = array(
          'depositInitial' => $data['depositInitial'],
          'depositConsomme' => $data['depositConsomme'],
          'depositRestant' => $data['depositInitial'] - $data['depositConsomme'],
        );

        return ''. json_encode( array('errorCode' => 1, 'response' => $reponse) ) ;
      }
    }

    function depositinitialconsommeparservice($params) {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{      
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
    }

    function performanceagent($params) {
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


    function performancesadminpdv($params) {
      $reponse = array(
        'typedata' => 'Performance des adminpdv',
        'typeservice' => ['Faible', 'Passage', 'Assez-bien', 'Bien'],
        'colors' => ['red', 'orange', 'yellow', 'green'],
        'montanttotal' => [900000, 750000, 1350000, 650000]
      );

      return ''. json_encode($reponse);
    }

    function listmap($params){}

    function historiquereclamation($params) {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));
      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{      
        $query = $this->em->createQuery("SELECT 
           recl.dateajout AS datereclamation,
           recl.nomservice AS typeservice,
           recl.etat AS etatreclamation,
           CONCAT(uadminpdv.prenom,' ', uadminpdv.nom) AS adminpdv,
           CONCAT(updv.prenom,' ', updv.nom) AS pdv,
           updv.telephone,
           updv.adresse 
           FROM
           WSServerBundle\Entity\Reclamations recl, WSServerBundle\Entity\Users updv, WSServerBundle\Entity\Users uadminpdv
           WHERE
           recl.iduser=updv.idUser and updv.accesslevel=uadminpdv.idUser
        ");
        $results = $query->getArrayResult();
        return ''. json_encode( array('errorCode' => 1, 'response' => $results) );
      }
    }

    function activiteservices($params) {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));
      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{      
        $query1 = $this->em->createQuery("
          SELECT exp.dateOperation AS data, count(exp.id) AS nbreoperation
          FROM WSServerBundle\Entity\Expressocash exp
          GROUP BY exp.dateOperation
        ");
        $results1 = $query1->getArrayResult();
        $query2 = $this->em->createQuery("
          SELECT joni.dateOperation AS data, count(joni.id) AS nbreoperation
          FROM WSServerBundle\Entity\Jonijoni joni
          GROUP BY joni.dateOperation
        ");
        $results2 = $query2->getArrayResult();
        $query3 = $this->em->createQuery("
          SELECT post.dateOperation AS data, count(post.id) AS nbreoperation
          FROM WSServerBundle\Entity\Postcash post
          GROUP BY post.dateOperation
        ");
        $results3 = $query3->getArrayResult();
        $query4 = $this->em->createQuery("
          SELECT tigo.dateOperation AS data, count(tigo.id) AS nbreoperation
          FROM WSServerBundle\Entity\Tigocash tigo
          GROUP BY tigo.dateOperation
        ");
        $results4 = $query4->getArrayResult();
        $query5 = $this->em->createQuery("
          SELECT tnt.dateOperation AS data, count(tnt.id) AS nbreoperation
          FROM WSServerBundle\Entity\Tnt tnt
          GROUP BY tnt.dateOperation
        ");
        $results5 = $query5->getArrayResult();
        
        $resultsactivite = array_merge_recursive($results1, $results2, $results3, $results4, $results5);
        $dates = [];
        foreach ($resultsactivite as $value) { $dates[] = $value['data']->format('Y-m-d'); }
        $dateactivite = array_unique($dates);
        sort($dateactivite);
        $dataexpresso = []; $datajonijoni = []; $datapost = []; $datatigo = []; $datatnt = [];
        foreach ($dateactivite as $activite) {
          $compteurexpresso = 0; $compteurjonijoni = 0; $compteurpost = 0; $compteurtigo = 0; $compteurtnt = 0;
          foreach ($results1 as $value) { if($activite == $value['data']->format('Y-m-d')) $compteurexpresso++; }
          foreach ($results2 as $value) { if($activite == $value['data']->format('Y-m-d')) $compteurjonijoni++; }
          foreach ($results3 as $value) { if($activite == $value['data']->format('Y-m-d')) $compteurpost++; }
          foreach ($results4 as $value) { if($activite == $value['data']->format('Y-m-d')) $compteurtigo++; }
          foreach ($results5 as $value) { if($activite == $value['data']->format('Y-m-d')) $compteurtnt++; }
          $dataexpresso[] = $compteurexpresso; $datajonijoni[] = $compteurjonijoni;
          $datapost[] = $compteurpost; $datatigo[] = $compteurtigo; $datatnt[] = $compteurtnt;
        }
        
        $reponse = array(
          'typeactivite' => "Nombre d'opérations par jour",
          'datas' => [
            array('data' => $dataexpresso, 'label' => "ExpressoCash"),
            array('data' => $datajonijoni, 'label' => "Joni-Joni"),
            array('data' => $datapost, 'label' => "PosteCash"),
            array('data' => $datatigo, 'label' => "TigoCash"),
            array('data' => $datatnt, 'label' => "TNT"),
          ],
          'dateactivite' => $dateactivite
        );

        return ''. json_encode($reponse);
      }
    }

    function demanderetraitfond($params) {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{      
        $query = $this->em->createQuery("SELECT 
           retrait.id AS iddemanderetrait,
           retrait.datedemande AS datedemanderetrait,
           retrait.montantdemande,
           retrait.etatdemande,
           CONCAT(adminpdv.prenom,' ', adminpdv.nom) AS agent,
           adminpdv.telephone,
           adminpdv.adresse
           FROM 
           WSServerBundle\Entity\Retraitfond retrait, WSServerBundle\Entity\Users adminpdv
           WHERE 
           retrait.idadminpdv=adminpdv.idUser
        ");
        $results = $query->getArrayResult();
        return ''. json_encode($results);
      }
    }

    function validerretrait($params) {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{      
        $caution = $this->em->getRepository('WSServerBundle:Retraitfond')->find($params->idretrait);
        $caution->setEtatdemande(1);
        $this->em->flush();
        return ''. json_encode( array('errorCode' => 1, 'response' => 'ok') ) ;
      }
    }

    function listmajcautions($params) {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{      
        $query = $this->em->createQuery("SELECT 
           caut.idCaution AS idcaution,
           CONCAT(admin.prenom,' ', admin.nom) AS adminpdv,
           admin.adresse,
           admin.telephone,
           caut.caution AS cautioninitiale,
           caut.caution AS montantconsomme
           FROM WSServerBundle\Entity\Cautions caut, WSServerBundle\Entity\Users admin
           WHERE caut.idUser=admin.idUser
        ");
        $results = $query->getArrayResult();
        return ''. json_encode( array('errorCode' => 1, 'response' => $results) );
      }
    }
  
    function modifymajcaution($params) {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{      
        $caution = $this->em->getRepository('WSServerBundle:Cautions')->find($params->idadminpdv);
        $caution->setCaution($params->modifycaution);
        $caution->setDateModif(new \Datetime());
        $this->em->flush();   
        return ''. json_encode( array('errorCode' => 1, 'response' => 'ok') ) ;
      }
    }

}