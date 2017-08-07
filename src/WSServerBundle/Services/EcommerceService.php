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

      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));
      if(empty($correspSession))
        return ''. json_encode( array('errorCode' => 0, 'response' => 'Utilisateur non authentifié') ) ;
      else{      
        $existclient = $this->em->getRepository('WSServerBundle:Clients')->findOneBy(array('telephone'=>$params->telephoneclient));
        $currentUser = $this->em->getRepository('WSServerBundle:Users')->findOneBy(array('idUser'=>$correspSession->getIdUser() ) );

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
          
          $commande = new Commandes();
          $addTime = new \Datetime();
          $commande->setDateCommande($addTime);
          $commande->setIdclient($newclient->getId());
          $commande->setPrenomclient($params->prenomclient);
          $commande->setNomclient($params->nomclient);
          $commande->setTelephoneclient($params->telephoneclient);
          $commande->setCodepayement($codepayement);
          $commande->setMontantcommande($params->montant);
          $commande->setOrderedArticles($params->orderedarticles);

          $pointderecuperation = array( "address"=>$currentUser->getAdresse(),"souszone"=>$currentUser->getSousZone(),"zone"=>$currentUser->getZone() ) ;
          $commande->setPointderecuperation( json_encode($pointderecuperation) );
          $commande->setDependsOn($correspSession->getDependsOn());
          $commande->setCommanditaire($correspSession->getIdUser());
          
          $this->em->persist($commande);
          $this->em->flush();
        }
        else{      
          $commande = new Commandes();
          $addTime = new \Datetime();
          $commande->setDateCommande($addTime);
          $commande->setIdclient($existclient->getId());
          $commande->setPrenomclient($params->prenomclient);
          $commande->setNomclient($params->nomclient);
          $commande->setTelephoneclient($params->telephoneclient);
          $commande->setCodepayement($codepayement);
          $commande->setMontantcommande($params->montant);
          $commande->setOrderedArticles($params->orderedarticles);

          $pointderecuperation = array( "address"=>$currentUser->getAdresse(),"souszone"=>$currentUser->getSousZone(),"zone"=>$currentUser->getZone() ) ;
          $commande->setPointderecuperation( json_encode($pointderecuperation) );
          $commande->setDependsOn($correspSession->getDependsOn());
          $commande->setCommanditaire($correspSession->getIdUser());
          
          $this->em->persist($commande);
          $this->em->flush();

        }
        
        // $sendMail = $this->mailservice->alerttoclientsite($params->emailclient, "votre code de paiement", "Veuillez utiliser ce code ". $codepayement ." pour le paiement de la commande ".$params->designation);
        return ''. json_encode( array('errorCode' => 1, 'response' => 'ok') );
      }
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
                 'orderedArticles' => $commande->getOrderedArticles(),
                 'montant' => $commande->getMontantcommande(),
                 'tel' => $commande->getTelephoneclient(),
                 'fullName' => $commande->getPrenomclient()." ".$commande->getNomclient(),
                 'dateCommande' => $commande->getDateCommande()->format('Y-m-d H:i')
              ];
            }
            return ''. json_encode($formatted);
          }

          if($params->typeListe=="toDeliver"){
              $query = $this->em->createQuery("SELECT c FROM WSServerBundle\Entity\Commandes c WHERE c.fourni=0 and c.orderedArticles LIKE '%\"pourvoyeur\":".strval($correspSession->getIdUser()).",%'") ;
              $dbcommandes = $query->getArrayResult();

            $retour = array( "borom"=>strval($correspSession->getIdUser()), "order"=>$dbcommandes ) ;
            return json_encode($retour);
          }

          if($params->typeListe=="dispatchDelivering"){
            $dbcommandes = $this->em->getRepository('WSServerBundle:Commandes')->findBy(array('fourni'=>0));

            foreach ($dbcommandes as $commande) {

                $formatted[] = [
                   'id' => $commande->getId(),
                   'orderedArticles' => $commande->getOrderedArticles(),
                   'montant' => $commande->getMontantcommande(),
                   'tel' => $commande->getTelephoneclient(), 
                   'pointderecuperation' => $commande->getpointderecuperation(), 
                   'fullName' => $commande->getPrenomclient()." ".$commande->getNomclient(),
                   'dateCommande' => $commande->getDateCommande()->format('Y-m-d H:i')
                ];

            }
            return ''. json_encode($formatted);
          }

          if($params->typeListe=="dispatchReception"){
            $dbcommandes = $this->em->getRepository('WSServerBundle:Commandes')->findBy(array('recu'=>0));
            foreach ($dbcommandes as $commande) {
                $formatted[] = [
                   'id' => $commande->getId(),
                   'orderedArticles' => $commande->getOrderedArticles(),
                   'montant' => $commande->getMontantcommande(),
                   'tel' => $commande->getTelephoneclient(),
                   'pointderecuperation' => $commande->getpointderecuperation(), 
                   'fullName' => $commande->getPrenomclient()." ".$commande->getNomclient(),
                   'dateCommande' => $commande->getDateCommande()->format('Y-m-d H:i')
                ];
            }
            return ''. json_encode($formatted);
          }

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
        $orderedArticles = json_decode($cmdFournie->getOrderedArticles()) ;
        $suppliedCount = 0 ;
        foreach ($orderedArticles as $orderedArticle) {
          if( $orderedArticle->supplied == 1 )
            $suppliedCount = $suppliedCount + 1 ;
          if( $orderedArticle->pourvoyeur == $correspSession->getIdUser() ){
            $orderedArticle->supplied = 1 ;
            $suppliedCount = $suppliedCount + 1 ;
          }
        }
        if( $suppliedCount == count($orderedArticles) )
          $cmdFournie->setFourni(1) ;

        $cmdFournie->setOrderedArticles( json_encode($orderedArticles) ) ;
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


    public function formateOrders($tmporderedArticles, $currentUser){
        $orderedArticles = json_decode($tmporderedArticles) ;
        $formatedOrder=[] ;
        foreach ($orderedArticles as $orderedArticle) {
          $formatedOrder[] = [
             'idarticle' => $orderedArticle->idarticle,
             'qte' =>$orderedArticle->qte,
             'prix' => $orderedArticle->prix,
             'montant' => $orderedArticle->montant,
             'designation' => $orderedArticle->designation,  
             'description' => $orderedArticle->description,
             'imagelink' => $orderedArticle->imagelink,
             'pourvoyeur' => $orderedArticle->pourvoyeur,
             'supplied' => 0,
             'address' => $currentUser->getAdresse(),
             'souszone' => $currentUser->getSousZone(),
             'zone' => $currentUser->getZone()
          ];              
        }
        return json_encode($formatedOrder) ;
    }

    public function prendreCommande($params)
    {
        $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));
        $commande = new Commandes();
        if (!empty($correspSession)){

          $currentUser = $this->em->getRepository('WSServerBundle:Users')->findOneBy(array('idUser'=>$correspSession->getIdUser() ) );

          $commandetmp = explode("#",$params->article)[1]; 
          $tmpCmd = $this->em->getRepository('WSServerBundle:Tmpcommande')->findOneBy(array('codeCommande' => $commandetmp));  
          $memoire = json_encode($tmpCmd) ;   

          if (!empty($tmpCmd)){    

              if(explode("#",$params->article)[0]=="infocmd"){ 
                $formatted[] = [
                   'id' => $tmpCmd->getId(),
                   'orderedArticles' =>$tmpCmd->getOrderedArticles(),
                   'montant' => $tmpCmd->getMntcmd(),
                   'prenomclient' => $tmpCmd->getPrenomclient(),
                   'nomclient' => $tmpCmd->getNomclient(),
                   'telclient' => $tmpCmd->getTelclient(),
                   'dateCommande' => $tmpCmd->getDateCommande()->format('Y-m-d H:i')
                ];

                return json_encode($formatted) ;
              }else{
                $commande->setOrderedArticles($this->formateOrders($tmpCmd->getOrderedArticles(), $currentUser)) ;
                $commande->setCommanditaire( $correspSession->getIdUser() );
                $commande->setIdclient( $tmpCmd->getIdClient() );  
                $commande->setPrenomclient( $tmpCmd->getPrenomclient() );  
                $commande->setNomclient( $tmpCmd->getNomclient() );  
                $commande->setTelephoneclient( $tmpCmd->getTelclient() );
                $commande->setFourni(0);
                $commande->setLivre(0);
                $commande->setRecu(0);
                $commande->setCodepayement(time());
                $commande->setDependsOn( $correspSession->getDependsOn() );

                $pointderecuperation = array( "address"=>$currentUser->getAdresse(),"souszone"=>$currentUser->getSousZone(),"zone"=>$currentUser->getZone() ) ;

                $commande->setPointderecuperation( json_encode($pointderecuperation) );
                $commande->setMontantcommande( $tmpCmd->getMntcmd() ) ;
                $commande->setDateCommande(new \Datetime());

                $this->em->persist($commande) ;
                $this->em->remove($tmpCmd) ;
                $this->em->flush() ;

                return "ok" ;
            }
          }else
            return 'No row found matching the given code.';
      }else
        return 'bad move';
    }

    
} 