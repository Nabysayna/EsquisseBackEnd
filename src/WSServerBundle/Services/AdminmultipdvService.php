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
          if($value['caution'] != 0){
            $services[] = $value['nomApi'];
            $depositinitial[] = $value['caution'];
            $depositconsomme[] = $value['cautionconsomme'];
          }
        }
        $reponse = array(
          'services' => $services,
          'depositinitial' => $depositinitial,
          'depositconsomme' => $depositconsomme
        );

        return ''. json_encode( array('errorCode' => 1, 'response' => $reponse) ) ;
      }
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

        return ''. json_encode( array('errorCode' => 1, 'response' => $reponse) ) ;
      }
    }

    function performancesadminclasserbydate($params) {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));
      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{
        $datenow = null;
        if($params->typedate == "journee"){
          $datenow = date('Y-m-d');
        }
        if($params->typedate == "semaine"){
          $datenow = date('Y-m-d',strtotime("last Monday"));
        }
        if($params->typedate == "mois"){
          $datenow = date('Y-m-01');
        }
        
        $query = $this->em->createQuery("SELECT 
          op.dependsOn,
          SUM(op.montant) AS montanttotal
          FROM WSServerBundle\Entity\Operations op 
          WHERE op.dateoperation>=:typedate
          GROUP BY op.dependsOn
          ORDER BY montanttotal DESC
        ")->setParameter('typedate',$datenow);
        $results = $query->getArrayResult();
        $compteurfaible = 0; 
        $compteurpassable = 0; 
        $compteurassezbien = 0; 
        $compteurbien = 0;
        foreach ($results as $value) {
          if($value['montanttotal'] <= 50000){
            $compteurfaible += $value['montanttotal'];
          }
          elseif( ($value['montanttotal'] > 50000 ) && ($value['montanttotal'] <= 250000 ) ){
            $compteurpassable += $value['montanttotal'];
          }
          elseif( ($value['montanttotal'] > 250000 ) && ($value['montanttotal'] <= 500000 ) ){
            $compteurassezbien += $value['montanttotal'];
          }
          elseif( $value['montanttotal'] > 500000 ){
            $compteurbien += $value['montanttotal'];
          }
        }
        $reponse = array(
          'typedata' => 'Performance des adminpdv',
          'typeservice' => ['Faible', 'Passage', 'Assez-bien', 'Bien'],
          'montanttotal' => [$compteurfaible, $compteurpassable, $compteurassezbien, $compteurbien]
        );
        return ''. json_encode( array('errorCode' => 1, 'response' => $reponse) ) ;
      }
    }

    function performancesadminclasserbylotbydate($params) {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));
      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{
        $datenow = date('Y-m-d');
        if($params->typedate == "semaine"){
          $datenow = date('Y-m-d',strtotime("last Monday"));
        }
        if($params->typedate == "mois"){
          $datenow = date('Y-m-01');
        }
        
        if($params->typelot == "Faible"){
          $query = $this->em->createQuery("SELECT 
            u.idUser AS idadminpdv, 
            CONCAT(u.prenom,' ', u.nom) AS fullname,
            u.telephone, 
            COUNT(op.id) AS nbreoperation, 
            SUM(op.montant) AS montanttotal
            FROM WSServerBundle\Entity\Users u, WSServerBundle\Entity\Operations op 
            WHERE u.idUser=op.dependsOn and op.dateoperation>=:typedate
            GROUP BY idadminpdv, fullname
            HAVING montanttotal<=50000
            ORDER BY montanttotal DESC, nbreoperation DESC
          ")->setParameter('typedate',$datenow);
          $results = $query->getArrayResult();
          return ''. json_encode(array('errorCode' => 1, 'response' => $results));
        }
        if($params->typelot == "Passable"){
          $query = $this->em->createQuery("SELECT 
            u.idUser AS idadminpdv, 
            CONCAT(u.prenom,' ', u.nom) AS fullname,
            u.telephone, 
            COUNT(op.id) AS nbreoperation, 
            SUM(op.montant) AS montanttotal
            FROM WSServerBundle\Entity\Users u, WSServerBundle\Entity\Operations op 
            WHERE u.idUser=op.dependsOn and op.dateoperation>=:typedate
            GROUP BY idadminpdv, fullname
            HAVING montanttotal>50000 and montanttotal<=250000 
            ORDER BY montanttotal DESC, nbreoperation DESC
          ")->setParameter('typedate',$datenow);
          $results = $query->getArrayResult();
          return ''. json_encode(array('errorCode' => 1, 'response' => $results));
        }
        if($params->typelot == "Assez-bien"){
          $query = $this->em->createQuery("SELECT 
            u.idUser AS idadminpdv, 
            CONCAT(u.prenom,' ', u.nom) AS fullname,
            u.telephone, 
            COUNT(op.id) AS nbreoperation, 
            SUM(op.montant) AS montanttotal
            FROM WSServerBundle\Entity\Users u, WSServerBundle\Entity\Operations op 
            WHERE u.idUser=op.dependsOn and op.dateoperation>=:typedate
            GROUP BY idadminpdv, fullname
            HAVING montanttotal>250000 and montanttotal<=500000 
            ORDER BY montanttotal DESC, nbreoperation DESC
          ")->setParameter('typedate',$datenow);
          $results = $query->getArrayResult();
          return ''. json_encode(array('errorCode' => 1, 'response' => $results));
        }
        if($params->typelot == "Bien"){
          $query = $this->em->createQuery("SELECT 
            u.idUser AS idadminpdv, 
            CONCAT(u.prenom,' ', u.nom) AS fullname,
            u.telephone, 
            COUNT(op.id) AS nbreoperation, 
            SUM(op.montant) AS montanttotal
            FROM WSServerBundle\Entity\Users u, WSServerBundle\Entity\Operations op 
            WHERE u.idUser=op.dependsOn and op.dateoperation>=:typedate
            GROUP BY idadminpdv, fullname
            HAVING montanttotal>500000
            ORDER BY montanttotal DESC, nbreoperation DESC
          ")->setParameter('typedate',$datenow);
          $results = $query->getArrayResult();
          return ''. json_encode(array('errorCode' => 1, 'response' => $results));
        }
      }
    }

    function detailperformancesadminclasserbydate($params) {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));
      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{
        $datenow = date('Y-m-d');
        if($params->typedate == "semaine"){
          $datenow = date('Y-m-d',strtotime("last Monday"));
        }
        if($params->typedate == "mois"){
          $datenow = date('Y-m-01');
        }
        $query = $this->em->createQuery("SELECT 
          u.idUser AS idadminpdv, 
          CONCAT(u.prenom,' ', u.nom) AS fullname,
          u.telephone, 
          op.operateur,
          op.traitement,
          SUM(op.montant) AS montanttotal
          FROM WSServerBundle\Entity\Users u, WSServerBundle\Entity\Operations op 
          WHERE op.dependsOn=:idadminpdv and op.idpdv=u.idUser and op.dependsOn=u.dependsOn and op.dateoperation>='".$datenow."'
          GROUP BY op.operateur, op.traitement
          ORDER BY op.dateoperation DESC, montanttotal DESC
        ")->setParameter('idadminpdv',$params->idadminpdv);
        $results = $query->getArrayResult();
        return ''. json_encode(array('errorCode' => 1, 'response' => $results));
      }
    }
    
    

}