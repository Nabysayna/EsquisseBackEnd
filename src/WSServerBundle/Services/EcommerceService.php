<?php

namespace WSServerBundle\Services;

use WSServerBundle\Entity\Articles;
use WSServerBundle\Entity\Commandes;
use WSServerBundle\Entity\Ventes;
use WSServerBundle\Entity\Clients;
use WSServerBundle\Entity\Categories;


class EcommerceService
{
    private $em;

  	public function __construct(\Doctrine\ORM\EntityManager $entityManager){
  		$this->em = $entityManager;
  	}
 
    public function ajoutarticle($params)
    {
        $article = new Articles();
        $article->setIdUser($this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy( array('token' => $params->token))->getIdUser() );
        $article->setDesignation($params->designation);
        $article->setDescription($params->description);
        $article->setPrix($params->prix);
        $article->setStock($params->stock);
        $article->setImgLink($params->img_link);
        $article->setAvis(0);
        $article->setNbreavis(0); 
        $article->setIdcategorie(0);
        $article->setCategorie($params->categorie);
        $article->setDateAjout(new \Datetime());

        $this->em->persist($article);
        $this->em->flush();

        return 'ok';
    }
    
    public function ajoutcommande($params)
    {
        $commande = new Commandes();
        $commande->setIdArticle($params->id_article);
        $commande->setCommanditaire( $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token' => $params->token))->getIdUser() );
        $articleCmd = $this->em->getRepository('WSServerBundle:Articles')->findOneBy(array('id' => $params->id_article)) ;
        $commande->setPourvoyeur( $articleCmd->getIdUser() );
        $commande->setQuantite($params->quantite);
        $commande->setFullname($params->prenomclient." ".$params->nomclient);  
        $commande->setTel($params->telclient);
        $commande->setFourni(0);
        $commande->setLivre(0);
        $commande->setRecu(0);
        $commande->setDateCommande(new \Datetime());

        $articleCmd->setStock($articleCmd->getStock()-$params->quantite) ;

        $rowClient = $this->em->getRepository('WSServerBundle:Clients')->findOneBy(array('telephone' => $params->telclient));

        if (empty($rowClient)){
          $client = new Clients();
          $client->setPrenom($params->prenomclient);  
          $client->setNom($params->nomclient);  
          $client->setTelephone($params->telclient);
          $this->em->persist($client);
        }

        $this->em->persist($commande);
        $this->em->persist($articleCmd);
        $this->em->flush();

        return 'ok';
    }
    
    public function ajoutvente($params)
    {
        $vente = new Ventes();
        $vente->setIdCommande($params->id_commande);
        $vente->setMontant($params->montant);
        $vente->setIdUser(4);
        $vente->setDateVente(new \Datetime());


        $this->em->persist($vente);
        $this->em->flush();

        return 'ok';
    }
    
    public function listerarticle($params)
    {
      $dbarticles = null;
      if ($params->type == "catalogue"){
        $query = $this->em->createQuery("SELECT a.id, a.imgLink as nomImg, a.designation, a.description, a.prix, a.stock FROM WSServerBundle\Entity\Articles a WHERE a.stock>0") ;
        $results = $query->getArrayResult();
        return ''. json_encode($results);
      }

      else {
        $query = $this->em->createQuery("SELECT a.id, a.imgLink as nomImg, a.designation, a.description, a.prix, a.stock FROM WSServerBundle\Entity\Articles a WHERE a.stock>0 and a.idUser=(SELECT aus.idUser from WSServerBundle\Entity\Authorizedsessions aus WHERE aus.token=:userToken) ")->setParameter('userToken', $params->token);
        $results = $query->getArrayResult();
        return ''. json_encode($results);
      }
        
      $formatted = [];
      foreach ($dbarticles as $article) {
          $formatted[] = [
             'id' => $article->getId(),
             'nomImg' => $article->getImgLink(),
             'designation' => $article->getDesignation(),
             'description' => $article->getDescription(),
             'prix' => $article->getPrix(),
             'stock' => $article->getStock()
          ];
      }

      return ''. json_encode($formatted);
    }

    public function listercommande($params)
    {
        $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

        if (!empty($correspSession)){
          $formatted = [];

          if ($params->typeListe=="toReceive"){
            $dbcommandes = $this->em->getRepository('WSServerBundle:Commandes')->findBy(array('commanditaire' => $correspSession->getIdUser(), 'recu'=>0));
            foreach ($dbcommandes as $commande) {
              $formatted[] = [
                 'id' => $commande->getId(),
                 'quantite' => $commande->getQuantite(),
                 'designation' => $commande->getDesignation(),
                 'montant' => $commande->getMontantcommande(),
                 'tel' => $commande->getTelephoneclient(),
                 'fullName' => $commande->getPrenomclient()." ".$commande->getNomclient(),
                 'dateCommande' => $commande->getDateCommande()->format('Y-m-d H:i')
              ];
          }

          }

          if($params->typeListe=="toDeliver"){
            $dbcommandes = $this->em->getRepository('WSServerBundle:Commandes')->findBy(array('pourvoyeur' => $correspSession->getIdUser(), 'fourni'=>0));
            foreach ($dbcommandes as $commande) {
            $article = $this->em->getRepository('WSServerBundle:Articles')->findOneBy(array('id' => $commande->getIdArticle()));

              $formatted[] = [
                 'id' => $commande->getId(),
                 'quantite' => $commande->getQuantite(),
                 'designation' => $commande->getDesignation(),
                 'montant' => $commande->getMontantcommande(),
                 'tel' => $commande->getTelephoneclient(),
                 'fullName' => $commande->getPrenomclient()." ".$commande->getNomclient(),
                 'dateCommande' => $commande->getDateCommande()->format('Y-m-d H:i')
              ];
            } 

          }

          if($params->typeListe=="dispatchDelivering"){
            $dbcommandes = $this->em->getRepository('WSServerBundle:Commandes')->findBy(array('fourni'=>0));
            foreach ($dbcommandes as $commande) {
              $article = $this->em->getRepository('WSServerBundle:Articles')->findOneBy(array('id' => $commande->getIdArticle()));

              $user = $this->em->getRepository('WSServerBundle:Users')->findOneBy(array('idUser' => $commande->getPourvoyeur()) ); 

                $formatted[] = [
                   'id' => $commande->getId(),
                   'quantite' => $commande->getQuantite(),
                   'designation' => $article->getDesignation(),
                   'prixUnitaire' => $article->getPrix(),
                   'tel' => $commande->getTel(), 
                   'fullName' => $user->getPrenom()." ".$user->getNom(),
                   'adress' => $user->getAdresse(),
                   'dateCommande' => $commande->getDateCommande()->format('Y-m-d H:i')
                ];

            }
          }

          if($params->typeListe=="dispatchReception"){
            $dbcommandes = $this->em->getRepository('WSServerBundle:Commandes')->findBy(array('recu'=>0));
            foreach ($dbcommandes as $commande) {
              $article = $this->em->getRepository('WSServerBundle:Articles')->findOneBy(array('id' => $commande->getIdArticle()));

              $user = $this->em->getRepository('WSServerBundle:Users')->findOneBy(array('idUser' => $commande->getPourvoyeur()) ); 

                $formatted[] = [
                   'id' => $commande->getId(),
                   'quantite' => $commande->getQuantite(),
                   'designation' => $article->getDesignation(),
                   'prixUnitaire' => $article->getPrix(),
                   'tel' => $commande->getTel(),
                   'fullName' => $user->getPrenom()." ".$user->getNom(),
                   'adress' => $user->getAdresse(),
                   'dateCommande' => $commande->getDateCommande()->format('Y-m-d H:i')
                ];
            }
          }
          return ''. json_encode($formatted);

        } else
          return json_encode( array('errorCode' => 0, 'message' => 'Utilisateur non authentifié') ) ;
    }
    
    public function listervente($params)
    {
      $dbventes = $this->em->getRepository('WSServerBundle:Ventes')->findBy(array('idUser' => 4));
        
      $formatted = [];
      foreach ($dbventes as $vente) {
          $formatted[] = [
             'id' => $vente->getId(),
             'montant' => $vente->getMontant()
          ];
      }

      return ''. json_encode($formatted);
    }

    public function listerCategorie($params){
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

        if (!empty($correspSession)){
          $categories = $this->em->getRepository('WSServerBundle:Categories')->findAll();            
          $formatted = [];
          foreach ($categories as $categorie) {
              $formatted[] = $categorie->getCategorie() ;
          }
          return ''. json_encode($formatted);
        }
        else
          return 'nothing';
    }


    public function receptionnerCommandes($params)
    {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if (!empty($correspSession)){
  
        $receivedCmd = $this->em->getRepository('WSServerBundle:Commandes')->findOneBy(array('id' => $params->idCommande));

        $receivedCmd->setRecu(1) ;
        $this->em->persist($receivedCmd) ;
        $this->em->flush() ;
        return 'ok';
      }
      return json_encode( array('errorCode' => 0, 'message' => 'Utilisateur non authentifié') ) ;
    }


    public function listerCoursier($params)
    {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if (!empty($correspSession)){
  
        $coursiers = $this->em->getRepository('WSServerBundle:Users')->findBy(array('accesslevel' => 5));
        foreach ($coursiers as $coursier) {
            $formatted[] = [
               'id' => $coursier->getIdUser(),
               'prenom' => $coursier->getPrenom(),
               'nom' => $coursier->getNom()
              ];
        }

        return ''. json_encode($formatted);
      }
      return json_encode( array('errorCode' => 0, 'message' => 'Utilisateur non authentifié') ) ;
    }

    public function fournirCommandes($params)
    {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if (!empty($correspSession)){
        $cmdFournie = $this->em->getRepository('WSServerBundle:Commandes')->findOneBy(array('id' => $params->idCommande));
        $cmdFournie->setFourni(1) ;
        $this->em->persist($cmdFournie) ;
        $this->em->flush() ;
        return 'ok';
      }
      return json_encode( array('errorCode' => 0, 'message' => 'Utilisateur non authentifié') ) ;
    }

    public function modifierArticle($params)
    {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if (!empty($correspSession)){
        $article = json_decode($params->article); 
        $articleToUpdate = $this->em->getRepository('WSServerBundle:Articles')->findOneBy(array('id' => $article->id));
        $articleToUpdate->setDesignation($article->designation) ;
        $articleToUpdate->setDescription($article->description) ;
        $articleToUpdate->setPrix($article->prix) ;
        $articleToUpdate->setImgLink($article->nomImg) ;
        $this->em->persist($articleToUpdate) ;
        $this->em->flush() ;
        return 'ok';
      }else
        return 'bad move';
    }

    public function supprimerArticle($params)
    {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if (!empty($correspSession)){
        $article = json_decode($params->article); 
        $articleToUpdate = $this->em->getRepository('WSServerBundle:Articles')->findOneBy(array('id' => $article->id));
        $this->em->remove($articleToUpdate) ;
        $this->em->flush() ;
        return 'ok';
      }else
        return 'bad move';
    }

    public function prendreCommande($params)
    {
        $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));
        $commande = new Commandes();
        if (!empty($correspSession)){

          $commandetmp = explode("#",$params->article)[1]; 
          $tmpCmd = $this->em->getRepository('WSServerBundle:Tmpcommande')->findOneBy(array('codeCommande' => $commandetmp));  
          $memoire = json_encode($tmpCmd) ;   

          if (!empty($tmpCmd)){    

              if(explode("#",$params->article)[0]=="infocmd"){ 
                return json_encode((array)$tmpCmd) ;
              }else{
                $commande->setIdArticle( $tmpCmd->getIdArticle() );
                $commande->setDesignation( $tmpCmd->getDesignation() );
                $commande->setCommanditaire( $correspSession->getIdUser() );
                $commande->setPourvoyeur( $tmpCmd->getPourvoyeur() );
                $commande->setQuantite( $tmpCmd->getQte() );
                $commande->setIdclient( $tmpCmd->getIdClient() );  
                $commande->setPrenomclient( $tmpCmd->getPrenomclient() );  
                $commande->setNomclient( $tmpCmd->getNomclient() );  
                $commande->setTelephoneclient( $tmpCmd->getTelclient() );
                $commande->setFourni(0);
                $commande->setLivre(0);
                $commande->setRecu(0);
                $commande->setCodepayement(1234);
                $commande->setDependsOn( $correspSession->getDependsOn() );
                $commande->setPointderecuperation("Dakar");
                $commande->setMontantcommande( $tmpCmd->getMntcmd() ) ;
                $commande->setDateCommande(new \Datetime());

                $this->em->persist($commande) ;
                $this->em->remove($tmpCmd) ;
                $this->em->flush() ;
                return json_encode((array)$commande) ;
            }
          }else
            return 'No row found matching the given code.';
      }else
        return 'bad move';
    }

    
}