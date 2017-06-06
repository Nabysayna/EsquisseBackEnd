<?php

namespace WSServerBundle\Services;
use WSServerBundle\Entity\Tnt;
use WSServerBundle\Entity\Authorizedsessions;


class AdminpdvService
{

    private $em;

    public function __construct(\Doctrine\ORM\EntityManager $entityManager)
    {
      $this->em = $entityManager;
    }

    function montanttransfertservice($params)
    {
        $reponse = array(
          'id' => 1,
          'typeservice' => ['Post-Cash', 'Joni-Joni', 'TNT', 'Expresso-Cash'],
          'montanttotal' => [900000, 750000, 1350000, 650000]
        );

        return ''. json_encode($reponse);
    }

    function performancepdv($params)
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

    function notifications($params)
    {
        $reponse = [
          array(
            'id' => 1,
            'type' => "Nouvelle Reclamation",
            'datenotification' => "12/3/2020 11:11:11",
          ),
          array(
            'id' => 2,
            'type' => "Etat deposit",
            'datenotification' => "12/3/2020 22:11:11",
          ),
          array(
            'id' => 3,
            'type' => "Nouveau Recouvrement",
            'datenotification' => "12/3/2020 20:11:11",
          ),
        ];

        return ''. json_encode($reponse);
    }

    function bilandeposit($params)
    {
        $reponse = array(
          'depositInitial' => 1000000,
          'depositConsomme' => 300000,
          'depositRestant' => 700000,
          'commission' => 30000
        );

        return ''. json_encode($reponse);
    }

    function consommationdepositservice($params)
    {
        $reponse = [
          array(
            'service' => 'Tnt',
            'montantconsomme' => 500000,
            'commission' => 50000
          ),
          array(
            'service' => 'Post-Cash',
            'montantconsomme' => 300000,
            'commission' => 30000
          ),
          array(
            'service' => 'Joni-Joni',
            'montantconsomme' => 200000,
            'commission' => 20000
          ),
        ];

        return ''. json_encode($reponse);
    }

    function consommationdepositpdv($params)
    {
        $reponse = [
          array(
            'pdv' => 'Assane KA',
            'adresse' => "Pikine",
            'montantconsomme' => 500000,
            'commission' => 50000
          ),
          array(
            'pdv' => 'Naby NDIAYE',
            'adresse' => "Parcelle",
            'montantconsomme' => 300000,
            'commission' => 30000
          ),
          array(
            'pdv' => 'Bamba GNING',
            'adresse' => "Diamalaye",
            'montantconsomme' => 200000,
            'commission' => 20000
          ),
        ];

        return ''. json_encode($reponse);
    }

    function historiquerecouvrement($params)
    {
        $reponse = [
          array(
            'pdv' => 'Assane KA',
            'montantconsomme' => 500000,
            'commission' => 50000,
            'montantrecouvre' => 50000,
            'montantrestant' => 50000,
            'daterecouvrement' => "2007-05-10"
          ),
          array(
            'pdv' => 'Naby NDIAYE',
            'montantconsomme' => 300000,
            'commission' => 30000,
            'montantrecouvre' => 50000,
            'montantrestant' => 50000,
            'daterecouvrement' => "2007-05-10"
          ),
          array(
            'pdv' => 'Bamba GNING',
            'montantconsomme' => 200000,
            'commission' => 20000,
            'montantrecouvre' => 50000,
            'montantrestant' => 50000,
            'daterecouvrement' => "2007-05-10"
          ),
        ];

        return ''. json_encode($reponse);
    }

    function historiquereclamation($params)
    {
        $reponse = [
          array(
            'pdv' => 'Assane KA',
            'reclamation' => "Pas de lait",
            'datereclamation' => "2007-05-10"
          ),
          array(
            'pdv' => 'Naby NDIAYE',
            'reclamation' => "Trop à lese",
            'datereclamation' => "2007-05-10"
          ),
          array(
            'pdv' => 'Bamba GNING',
            'reclamation' => "Parité",
            'datereclamation' => "2007-05-10"
          ),
        ];

        return ''. json_encode($reponse);
    }

function listuserpdv($params)
    {
        $reponse = [
          array(
            'idpdv' => 1,
            'fullname' => 'Assane KA',
            'email' => 'Assane KA',
            'adresse' => 'Assane KA',
            'telephone' => "Pas de lait"
          ),
          array(
            'idpdv' => 2,
            'fullname' => 'Naby NDIAYE',
            'email' => "Trop à lese",
            'adresse' => "Trop à lese",
            'telephone' => "Trop à lese"
          ),
          array(
            'idpdv' => 3,
            'fullname' => 'Bamba GNING',
            'email' => "Parité",
            'adresse' => "Parité",
            'telephone' => "Parité"
          ),
        ];

        return ''. json_encode($reponse);
    }

function modifypdv($params)
    {
        $reponse = [
          array(
            'pdv' => 'Assane KA',
            'reclamation' => "Pas de lait",
            'datereclamation' => "2007-05-10"
          ),
          array(
            'pdv' => 'Naby NDIAYE',
            'reclamation' => "Trop à lese",
            'datereclamation' => "2007-05-10"
          ),
          array(
            'pdv' => 'Bamba GNING',
            'reclamation' => "Parité",
            'datereclamation' => "2007-05-10"
          ),
        ];

        return ''. json_encode($reponse);
    }


}