<?php

namespace WSServerBundle\Services;

use WSServerBundle\Entity\Articles;
use WSServerBundle\Entity\Commandes;
use WSServerBundle\Entity\Ventes;


class EcommerceService
{
    private $em;

  	public function __construct(\Doctrine\ORM\EntityManager $entityManager){
  		$this->em = $entityManager;
  	}

   
    public function ajoutarticle($params)
    {
        $article = new Articles();
        $article->setIdUser(5);
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
        $commande->setCommanditaire(4);
        $commande->setPourvoyeur(5);
        $commande->setQuantite($params->quantite);
        $commande->setFullname($params->fullname);
        $commande->setTel($params->tel);
        $commande->setEtat(1);
        $commande->setDateCommande(new \Datetime());

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
        $dbarticles = $this->em->getRepository('WSServerBundle:Articles')->findBy(array('idUser' => 4));
      }
        
      $formatted = [];
      foreach ($dbarticles as $article) {
          $formatted[] = [
             'id' => $article->getId(),
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
      $dbcommandes = $this->em->getRepository('WSServerBundle:Commandes')->findBy(array('etat' => 0));
        
      $formatted = [];
      foreach ($dbcommandes as $commande) {
          $formatted[] = [
             'id' => $commande->getId(),
             'quantite' => $commande->getQuantite(),
             'fullname' => $commande->getFullname(),
             'tel' => $commande->getTel()
          ];
      }

      return ''. json_encode($formatted);
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