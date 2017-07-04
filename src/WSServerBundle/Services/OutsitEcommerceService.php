<?php

namespace WSServerBundle\Services;

use WSServerBundle\Entity\Clients;
use WSServerBundle\Entity\Commandes;


class OutsitEcommerceService
{

    private $em;
    private $mailservice;
    
    
    public function __construct(\Doctrine\ORM\EntityManager $entityManager, \WSServerBundle\Services\MailingService $mailService)
    {
      $this->em = $entityManager;
      $this->mailservice = $mailService;
    }

    function listerarticleecomoutsite($params)
    {
      $query = $this->em->createQuery("SELECT 
          a.id AS idarticle,
          CONCAT(u.prenom,' ', u.nom) AS createby,
          a.description,
          a.prix,
          a.stock AS qte,
          a.imgLink AS imagelink,
          a.dateAjout AS datepublication,
          a.avis,
          a.nbreavis,
          a.designation,
          a.categorie,
          u.zone 
          FROM 
          WSServerBundle\Entity\Articles a, WSServerBundle\Entity\Users u 
          WHERE 
          a.idUser=u.idUser
      ");
      $results = $query->getArrayResult();
      return ''. json_encode($results);

    }

    function listercategorieecomoutsite($params)
    {
      $query = $this->em->createQuery("SELECT  
        a.categorie,
        COUNT(a.id) AS nbre
        FROM 
        WSServerBundle\Entity\Articles a 
        GROUP BY a.categorie
      ");
      $results = $query->getArrayResult();

      return ''. json_encode($results);
    }

    function listerzoneecomoutsite($params)
    {
      $query = $this->em->createQuery("SELECT  
        u.zone,
        COUNT(u.idUser) AS nbre
        FROM 
        WSServerBundle\Entity\Articles a, WSServerBundle\Entity\Users u 
        WHERE 
        a.idUser=u.idUser
        GROUP BY u.zone
      ");
      $results = $query->getArrayResult();
      
      return ''. json_encode($results);
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

    function ajoutcommandeecomoutsite($params)
    {
      $existclient = $this->em->getRepository('WSServerBundle:Clients')->findOneBy(array('telephone'=>$params->telephoneclient));
      if(empty($existclient)){
        $newclient = new Clients();
        $newclient->setPrenom($params->prenomclient);
        $newclient->setNom($params->nomclient);
        $newclient->setTelephone($params->telephoneclient);
        $newclient->setEmail($params->emailclient);
        $addTime = new \Datetime();
        $newclient->setDateAjout($addTime);
        $this->em->persist($newclient);
        $this->em->flush();

        $newCommande = new Commandes();
        $newCommande->setIdArticle($params->id_article);
        $newCommande->setCommanditaire(-1);
        $newCommande->setIdclient($newclient->getId());
        $newCommande->setPrenomclient($params->prenomclient);
        $newCommande->setNomclient($params->nomclient);
        $newCommande->setTelephoneclient($params->telephoneclient);
        $newCommande->setQuantite($params->quantite);
        $addTime = new \Datetime();
        $newCommande->setDateCommande($addTime);
        $newCommande->setCodepayement(time());
        $this->em->persist($newCommande);
        $this->em->flush();
      }
      else{      
        $newCommande = new Commandes();
        $newCommande->setIdArticle($params->id_article);
        $newCommande->setCommanditaire(-1);
        $newCommande->setIdclient($existclient->getId());
        $newCommande->setPrenomclient($params->prenomclient);
        $newCommande->setNomclient($params->nomclient);
        $newCommande->setTelephoneclient($params->telephoneclient);
        $newCommande->setQuantite($params->quantite);
        $addTime = new \Datetime();
        $newCommande->setDateCommande($addTime);
        $newCommande->setCodepayement(time());
        $this->em->persist($newCommande);
        $this->em->flush();
      }
      $reponse = array(
        'response' => 'ok'
      );
      return ''. json_encode($reponse);
    }

    function ajoutabonneecomoutsite($params)
    {
      $existclient = $this->em->getRepository('WSServerBundle:Clients')->findOneBy(array('email' => $params->infoclient));
      if(empty($existclient)){
        $newclient = new Clients();
        $newclient->setEmail($params->infoclient);
        $addTime = new \Datetime();
        $newclient->setDateAjout($addTime);
        $this->em->persist($newclient);
        $this->em->flush();
      }
      $reponse = array(
        'response' => 'ok'
      );
      return ''. json_encode($reponse);
    }

    function ecrireecomoutsite($params)
    {
      $existclient = $this->em->getRepository('WSServerBundle:Clients')->findOneBy(array('email' => $params->email));
      if(empty($existclient)){
        $newclient = new Clients();
        $newclient->setFullname($params->fullname);
        $newclient->setEmail($params->email);
        $addTime = new \Datetime();
        $newclient->setDateAjout($addTime);
        $this->em->persist($newclient);
        $this->em->flush();
      }
      
      $sendMail = $this->mailservice->envoifromsite($params->email, $params->sujet, $params->message);
      $reponse = array(
        'response' => $sendMail
      );
      return ''. json_encode($reponse);
    }
    
    function ajoutauthecomoutsite($params)
    {
        $reponse = array(
          'api' => 1,
          'token' => 'as12',
          'typedebouquet' => '123'
        );

        return ''. json_encode($reponse);
    }
    
    function listercommandeecomoutsite($params)
    {
      $reponse = array(
        'typedebouquet' => 'listercommandeecomoutsite'
      );

      return ''. json_encode($reponse);
    }

    
    
    
}