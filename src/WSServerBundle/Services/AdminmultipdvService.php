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

    function nombredereclamationagentpdvvente($params)
    {
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

        return ''. json_encode( array('errorCode' => 0, 'response' => $reponse) ) ;
      }
    }

    function bilandeposit($params)
    {
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

    function depositinitialconsommeparservice($params)
    {
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

    function performanceagent($params)
    {
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

    function listmap($params){}

    function historiquereclamation($params)
    {
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
        return ''. json_encode( array('errorCode' => 0, 'response' => $results) );
      }
    }

    function activiteservices($params)
    {
        $reponse = array(
          'typeactivite' => $params->type,
          'datas' => [
            array('data' => [65, 59, 80, 81, 56, 55, 40], 'label' => "PosteCash"),
            array('data' => [28, 48, 49, 19, 86, 40, 90], 'label' => "TigoCash"),
            array('data' => [18, 18, 87, 9, 100, 27, 19], 'label' => "ExpressoCash"),
            array('data' => [48, 38, 25, 55, 19, 27, 28], 'label' => "Joni-Joni"),
            array('data' => [35, 66, 70, 9, 100, 40, 30], 'label' => "TNT"),
            array('data' => [26, 28, 71, 9, 19, 27, 65], 'label' => "RIA"),
            array('data' => [16, 98, 17, 39, 10, 37, 6], 'label' => "E-commerce"),
          ],
          'dateactivite' => ['January', 'February', 'March', 'April', 'May', 'June', 'July']
        );

        return ''. json_encode($reponse);
    }

    function demanderetraitfond($params)
    {
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

    function validerretrait($params)
    {
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

    function listmajcautions($params)
    {
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
  
    function modifymajcaution($params)
    {
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