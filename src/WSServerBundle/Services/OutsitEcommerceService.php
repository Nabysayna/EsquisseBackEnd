<?php

namespace WSServerBundle\Services;
use WSServerBundle\Entity\Authorizedsessions;


class OutsitEcommerceService
{

    private $em;

    private $datamappdv = [
      array('lat' => 14.693858, 'lng' => -17.445982, 'label' => 'A', 'title' => 'AA', 'content' => 'AA'),
      array('lat' => 14.823458, 'lng' => -16.005082, 'label' => 'F', 'title' => 'F', 'content' => 'F'),
    ];

    private $dataarticle = array(
      'categoriesandnbre' => [
        array('categorie' => "accessoires", 'nbre' => 1),
        array('categorie' => "ordinateur", 'nbre' => 2),
        array('categorie' => "telephone", 'nbre' => 2),
        array('categorie' => "chaussures", 'nbre' => 2),
      ], 
      'articles' => [
        array('idarticle' => 12, 'categorie' => "accessoires", 'description' => "ecouteur top", 'label' => "ecouteur green", 'createby' => 'bamba', 'qte' => 100, 'prix' => 2500, 'datepublication' => '2017-06-27', 'imagelink' => 'http://localhost/dev-bbsinvest-plateform/EsquisseBackEnd/server-backend-upload/uploads/shop/ecouteur.jpg'),
        array('idarticle' => 121, 'categorie' => "ordinateur", 'description' => "Le pére des ordinateur portable", 'label' => 'Macbook', 'createby' => 'Ablaye', 'qte' => 10, 'prix' => 800000, 'datepublication' => '2017-06-16', 'imagelink' => 'http://localhost/dev-bbsinvest-plateform/EsquisseBackEnd/server-backend-upload/uploads/shop/macbok.jpg'),
        array('idarticle' => 123, 'categorie' => "ordinateur", 'description' => "Le pére des ordinateur portable mack", 'label' => 'Macbook One', 'createby' => 'Awa', 'qte' => 10, 'prix' => 800000, 'datepublication' => '2017-06-06', 'imagelink' => 'http://localhost/dev-bbsinvest-plateform/EsquisseBackEnd/server-backend-upload/uploads/shop/macbok.jpg'),
        array('idarticle' => 125, 'categorie' => "telephone", 'description' => "samsums portable", 'label' => 'samsums 2pouce', 'createby' => 'Oumy', 'qte' => 10, 'prix' => 800000, 'datepublication' => '2017-06-26', 'imagelink' => 'http://localhost/dev-bbsinvest-plateform/EsquisseBackEnd/server-backend-upload/uploads/shop/samsums.jpg'),
        array('idarticle' => 129, 'categorie' => "telephone", 'description' => "Le portable mere", 'label' => 'samsums', 'createby' => 'Tapha', 'qte' => 10, 'prix' => 80000, 'datepublication' => '2017-06-21', 'imagelink' => 'http://localhost/dev-bbsinvest-plateform/EsquisseBackEnd/server-backend-upload/uploads/shop/samsums.jpg'),
        array('idarticle' => 127, 'categorie' => "chaussures", 'description' => "Le pére des ordinateur portable", 'label' => 'Talon', 'createby' => 'Tapha', 'qte' => 10, 'prix' => 8000, 'datepublication' => '2017-06-22', 'imagelink' => 'http://localhost/dev-bbsinvest-plateform/EsquisseBackEnd/server-backend-upload/uploads/shop/chaussure_women.jpg'),
        array('idarticle' => 132, 'categorie' => "chaussures", 'description' => "Le pére des ordinateur portable", 'label' => 'Bote', 'createby' => 'Ablaye', 'qte' => 10, 'prix' => 8000, 'datepublication' => '2017-06-23', 'imagelink' => 'http://localhost/dev-bbsinvest-plateform/EsquisseBackEnd/server-backend-upload/uploads/shop/chaussure1_men.jpg'),
      ],
    );
    
    public function __construct(\Doctrine\ORM\EntityManager $entityManager)
    {
      $this->em = $entityManager;
    }

    function ajoutcommandeecomoutsite($params)
    {
      $reponse = array(
        'typedebouquet' => 'ajoutcommandeecomoutsite'
      );

      return ''. json_encode($reponse);
    }

    function listerarticleecomoutsite($params)
    {
      $reponse = $this->dataarticle;

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