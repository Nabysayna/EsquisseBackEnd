<?php

namespace WSServerBundle\Services;

use WSServerBundle\Entity\Articles;
use WSServerBundle\Entity\Commandes;
use WSServerBundle\Entity\Ventes;
use WSServerBundle\Entity\Clients;


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
        $commande->setPourvoyeur( $this->em->getRepository('WSServerBundle:Articles')->findOneBy(array('id' => $params->id_article))->getIdUser() );
        $commande->setQuantite($params->quantite);
        $commande->setFullname($params->prenomclient." ".$params->nomclient);  
        $commande->setTel($params->telclient);
        $commande->setFourni(0);
        $commande->setLivre(0);
        $commande->setRecu(0);
        $commande->setDateCommande(new \Datetime());

        $rowClient = $this->em->getRepository('WSServerBundle:Clients')->findOneBy(array('telephone' => $params->telclient));

        if (empty($rowClient)){
          $client = new Clients();
          $client->setPrenom($params->prenomclient);  
          $client->setNom($params->nomclient);  
          $client->setTelephone($params->telclient);
          $this->em->persist($client);
        }

        $this->em->persist($commande);
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
        $dbarticles = $this->em->getRepository('WSServerBundle:Articles')->findAll();
      }
      else {
        $currentUser = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token' => $params->token));
        $dbarticles = $this->em->getRepository('WSServerBundle:Articles')->findBy(array('idUser' => $currentUser->getIdUser()));
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
        $dbcommandes = $this->em->getRepository('WSServerBundle:Commandes')->findBy(array('commanditaire' => $correspSession->getIdUser()));
          
        $formatted = [];
        foreach ($dbcommandes as $commande) {
          $article = $this->em->getRepository('WSServerBundle:Articles')->findOneBy(array('id' => $commande->getIdArticle()));

            $formatted[] = [
               'id' => $commande->getId(),
               'quantite' => $commande->getQuantite(),
               'designation' => $article->getDesignation(),
               'prixUnitaire' => $article->getPrix(),
               'tel' => $commande->getTel(),
               'fullName' => $commande->getFullname(),
               'dateCommande' => $commande->getDateCommande()->format('Y-m-d H:i')
            ];
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



    
}