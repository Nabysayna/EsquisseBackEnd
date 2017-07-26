<?php

namespace WSServerBundle\Services;

use WSServerBundle\Entity\Clients;
use WSServerBundle\Entity\Infonews;
use WSServerBundle\Entity\Commandes;
use WSServerBundle\Entity\Tmpcommande;


class OutsitEcommerceService
{
  private $em;
  private $mailservice;
  
  
  public function __construct(\Doctrine\ORM\EntityManager $entityManager, \WSServerBundle\Services\MailingService $mailService)
  {
    $this->em = $entityManager;
    $this->mailservice = $mailService;
  }

    function listerarticlepdv($params)
    {
      $datas = explode('.', $params->slugpdv);
      if (count($datas) < 3){
        return ''. json_encode( array('errorCode' => 0, 'response' => $datas) );
      }
      else{
        $query1 = $this->em->createQuery("SELECT 
          CONCAT(u.prenom,' ', u.nom) AS createby, 
          u.login AS email, 
          u.telephone,
          UPPER(u.adresse) AS adresse, 
          UPPER(u.sousZone) AS souszone,
          UPPER(z.zone) AS zone 
          FROM WSServerBundle\Entity\Users u, WSServerBundle\Entity\Zones z 
          WHERE u.idUser=:idpdv and u.accesslevel=3 and u.idsousZone=z.id")->setParameter('idpdv', $datas[2]);
        $results1 = $query1->getArrayResult();
        
        if (count($results1) == 0) {
          return ''. json_encode( array('errorCode' => 0, 'response' => $results1) );
        }
        else{
          $query2 = $this->em->createQuery("SELECT 
              a.id AS idarticle,
              CONCAT(u.prenom,' ', u.nom) AS createby,
              u.idUser AS pourvoyeur,
              a.description,
              a.prix,
              a.stock AS qte,
              a.imgLink AS imagelink,
              a.dateAjout AS datepublication,
              a.avis,
              a.nbreavis,
              a.designation,
              a.categorie,
              z.zone 
              FROM 
              WSServerBundle\Entity\Articles a, WSServerBundle\Entity\Users u, WSServerBundle\Entity\Zones z
              WHERE a.idUser=u.idUser and a.idUser=:idpdv and u.idsousZone=z.id
          ")->setParameter('idpdv', $datas[2]);
          $results2 = $query2->getArrayResult();

          $query3 = $this->em->createQuery("SELECT 
              a.categorie,
              COUNT(a.id) AS nbre
              FROM 
              WSServerBundle\Entity\Articles a 
              WHERE a.idUser=:idpdv
              GROUP BY a.categorie
          ")->setParameter('idpdv', $datas[2]);
          $results3 = $query3->getArrayResult();
          
          $intervalleprix = array_column($results2, 'prix');
          sort($intervalleprix);
          
          $formatted = array(
            'pdv' => $results1[0], 
            'articles' => $results2, 
            'categories' => $results3, 
            'intervalleprix' => $intervalleprix, 
          );
          return ''. json_encode( array('errorCode' => 1, 'response' => $formatted) );
        }

      }

    }

    function listerarticle($params)
    {
      $query1 = $this->em->createQuery("SELECT 
          a.id AS idarticle,
          CONCAT(u.prenom,' ', u.nom) AS createby,
          u.idUser AS pourvoyeur,
          a.description,
          a.prix,
          a.stock AS qte,
          a.imgLink AS imagelink,
          a.dateAjout AS datepublication,
          a.avis,
          a.nbreavis,
          a.designation,
          a.categorie,
          z.zone 
          FROM 
          WSServerBundle\Entity\Articles a, WSServerBundle\Entity\Users u, WSServerBundle\Entity\Zones z 
          WHERE 
          a.idUser=u.idUser and u.idsousZone=z.id
      ");
      $results1 = $query1->getArrayResult();
      
      $query2 = $this->em->createQuery("SELECT  
        a.categorie,
        COUNT(a.id) AS nbre
        FROM 
        WSServerBundle\Entity\Articles a 
        GROUP BY a.categorie
      ");
      $results2 = $query2->getArrayResult();

      $query3 = $this->em->createQuery("SELECT  
        z.zone,
        COUNT(z.id) AS nbre
        FROM 
        WSServerBundle\Entity\Articles a, WSServerBundle\Entity\Users u, WSServerBundle\Entity\Zones z 
        WHERE 
        a.idUser=u.idUser and u.idsousZone=z.id
        GROUP BY z.zone
      ");
      $results3 = $query3->getArrayResult();
      
      $intervalleprix = array_column($results1, 'prix');
      sort($intervalleprix);
      $formatted = array(
        'articles' => $results1, 
        'categories' => $results2, 
        'zones' => $results3, 
        'intervalleprix' => $intervalleprix, 
      );
      return ''. json_encode( $formatted );
    }

    function ajoutavisecomoutsite($params)
    {
        $article = $this->em->getRepository('WSServerBundle:Articles')->find($params->id_article);
        $nbreavis = $article->getNbreavis() + 1;
        $newavis = $article->getAvis() + $params->avis;
        $article->setNbreavis($nbreavis);
        $article->setAvis($newavis);
        $this->em->flush();
        
        $reponse = array(
          'response' => 'ok'
        );
        return ''. json_encode($reponse);
    }

    function ajoutabonneecomoutsite($params)
    {
      $existabonne = $this->em->getRepository('WSServerBundle:Infonews')->findOneBy(array('email' => $params->infoclient));
      if(empty($existabonne)){
        $newabonne = new Infonews();
        $newabonne->setEmail($params->infoclient);
        $addTime = new \Datetime();
        $newabonne->setDateajout($addTime);
        $this->em->persist($newabonne);
        $this->em->flush();
      }
      $reponse = array('response' => 'ok');
      return ''. json_encode($reponse);
    }

    function ajoutcommandeecomoutsite($params)
    {
      $existclient = $this->em->getRepository('WSServerBundle:Clients')->findOneBy(array('telephone'=>$params->telephoneclient));
      $codepayement = time();
      if(empty($existclient)){
        $newclient = new Clients();
        $newclient->setPrenom($params->prenomclient);
        $newclient->setNom($params->nomclient);
        $newclient->setFullname($params->prenomclient." ".$params->nomclient);
        $newclient->setTelephone($params->telephoneclient);
        $newclient->setEmail($params->emailclient);
        $addTime = new \Datetime();
        $newclient->setDateAjout($addTime);
        $this->em->persist($newclient);
        $this->em->flush();

        $newCommande = new Tmpcommande();
        $newCommande->setIdArticle($params->id_article);
        $newCommande->setDesignation($params->designation);
        $newCommande->setQte($params->quantite);
        $newCommande->setIdClient($newclient->getId());
        $newCommande->setPrenomclient($params->prenomclient);
        $newCommande->setNomclient($params->nomclient);
        $newCommande->setTelclient($params->telephoneclient);
        $addTime = new \Datetime();
        $newCommande->setDateCommande($addTime);
        $newCommande->setCodeCommande($codepayement);
        $newCommande->setMntcmd($params->montant);
        $newCommande->setPourvoyeur($params->pourvoyeur);
        $this->em->persist($newCommande);
        $this->em->flush();
      }
      else{      
        $newCommande = new Tmpcommande();
        $newCommande->setIdArticle($params->id_article);
        $newCommande->setDesignation($params->designation);
        $newCommande->setQte($params->quantite);
        $newCommande->setIdClient($existclient->getId());
        $newCommande->setPrenomclient($params->prenomclient);
        $newCommande->setNomclient($params->nomclient);
        $newCommande->setTelclient($params->telephoneclient);
        $addTime = new \Datetime();
        $newCommande->setDateCommande($addTime);
        $newCommande->setCodeCommande($codepayement);
        $newCommande->setMntcmd($params->montant);
        $newCommande->setPourvoyeur($params->pourvoyeur);
        $this->em->persist($newCommande);
        $this->em->flush();
      }
      $sendMail = $this->mailservice->alerttoclientsite($params->emailclient, "votre code de paiement", "Veuillez utiliser ce code ". $codepayement ." pour le paiement de la commande ".$params->designation);
      return ''. json_encode( array('errorCode' => 1, 'response' => $codepayement) );
    }

    function ecrireecomoutsite($params) {
      $sendMail = $this->mailservice->envoifromsite($params->email, $params->sujet, $params->message);
      $reponse = array(
        'response' => $sendMail
      );
      return ''. json_encode($reponse);
    }
        
}