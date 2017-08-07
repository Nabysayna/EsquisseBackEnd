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
        return ''. json_encode( array('errorCode' => 1, 'response' => $datapdv) );
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
        return ''. json_encode( array('errorCode' => 1, 'response' => $response) );
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

    function performancepdv($params) {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));
      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{
        if($params->type == "journee"){
            $query = $this->em->createQuery("SELECT 
            u.idUser AS idpdv, 
            CONCAT(u.prenom,' ', u.nom) AS fullname,
            u.telephone, 
            op.dateoperation,
            COUNT(op.id) AS nbreoperation, 
            SUM(op.montant) AS montanttotal
            FROM WSServerBundle\Entity\Users u, WSServerBundle\Entity\Operations op 
            WHERE u.dependsOn=:ondepends and u.dependsOn=op.dependsOn and u.idUser=op.idpdv and op.dateoperation>=CURRENT_DATE()
            GROUP BY idpdv, fullname
            ORDER BY montanttotal DESC, nbreoperation DESC
          ")->setParameter('ondepends',$correspSession->getIdUser());

          $results = $query->getArrayResult();
          return ''. json_encode(array('errorCode' => 1, 'response' => $results));
        }
        if($params->type == "semaine"){
          $semainedate = date('Y-m-d',strtotime("last Monday"));
          $query = $this->em->createQuery("SELECT 
            u.idUser AS idpdv, 
            CONCAT(u.prenom,' ', u.nom) AS fullname,
            u.telephone, 
            op.dateoperation,
            COUNT(op.id) AS nbreoperation, 
            SUM(op.montant) AS montanttotal
            FROM WSServerBundle\Entity\Users u, WSServerBundle\Entity\Operations op 
            WHERE u.dependsOn=:ondepends and u.dependsOn=op.dependsOn and u.idUser=op.idpdv and op.dateoperation>='".$semainedate."'
            GROUP BY idpdv, fullname
            ORDER BY montanttotal DESC, nbreoperation DESC
          ")->setParameter('ondepends',$correspSession->getIdUser());
          $results = $query->getArrayResult();
          return ''. json_encode(array('errorCode' => 1, 'response' => $results));
        }
        if($params->type == "mois"){
          $moisdate = date('Y-m-01');
          $query = $this->em->createQuery("SELECT 
            u.idUser AS idpdv, 
            CONCAT(u.prenom,' ', u.nom) AS fullname,
            u.telephone, 
            op.dateoperation,
            COUNT(op.id) AS nbreoperation, 
            SUM(op.montant) AS montanttotal
            FROM WSServerBundle\Entity\Users u, WSServerBundle\Entity\Operations op 
            WHERE u.dependsOn=:ondepends and u.dependsOn=op.dependsOn and u.idUser=op.idpdv and op.dateoperation>='".$moisdate."'
            GROUP BY idpdv, fullname
            ORDER BY montanttotal DESC, nbreoperation DESC
          ")->setParameter('ondepends',$correspSession->getIdUser());
          $results = $query->getArrayResult();
          return ''. json_encode(array('errorCode' => 1, 'response' => $results));
        }
      }
    }

    function detailperformancepdv($params) {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));
      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{
        if($params->type == "journee"){
          $query = $this->em->createQuery("SELECT 
            op.dateoperation,
            op.operateur,
            op.traitement,
            op.montant
            FROM WSServerBundle\Entity\Operations op 
            WHERE op.dependsOn=:ondepends and op.idpdv=".$params->idpdv." and op.dateoperation>=CURRENT_DATE()
            ORDER BY op.dateoperation DESC
          ")->setParameter('ondepends',$correspSession->getIdUser());

          $results = $query->getArrayResult();
          return ''. json_encode(array('errorCode' => 1, 'response' => $results));
        }
        if($params->type == "semaine"){
          $semainedate = date('Y-m-d',strtotime("last Monday"));
          $query = $this->em->createQuery("SELECT 
            op.dateoperation,
            op.operateur,
            op.traitement,
            op.montant
            FROM WSServerBundle\Entity\Operations op 
            WHERE op.dependsOn=:ondepends and op.idpdv=".$params->idpdv." and op.dateoperation>='".$semainedate."'
            ORDER BY op.dateoperation DESC
          ")->setParameter('ondepends',$correspSession->getIdUser());

          $results = $query->getArrayResult();
          return ''. json_encode(array('errorCode' => 1, 'response' => $results));
        }
        if($params->type == "mois"){
          $moisdate = date('Y-m-01');
          $query = $this->em->createQuery("SELECT 
            op.dateoperation,
            op.operateur,
            op.traitement,
            op.montant
            FROM WSServerBundle\Entity\Operations op 
            WHERE op.dependsOn=:ondepends and op.idpdv=".$params->idpdv." and op.dateoperation>='".$moisdate."'
            ORDER BY op.dateoperation DESC
          ")->setParameter('ondepends',$correspSession->getIdUser());

          $results = $query->getArrayResult();
          return ''. json_encode(array('errorCode' => 1, 'response' => $results));
        }
      }
    }

}