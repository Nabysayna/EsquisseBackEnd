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
        $reponse = array(
          'nbreclamations' => 100,
          'nbrecouvrements' => 200,
          'nbagents' => 300,
          'nbpdv' => 250,
          'nbarticlesvendus' => 300
        );

        return ''. json_encode($reponse);
    }

    function bilandeposit($params)
    {
        $reponse = array(
          'depositInitial' => 3000000,
          'depositConsomme' => 1096000,
          'depositRestant' => 1904000,
        );

        return ''. json_encode($reponse);
    }

    function depositinitialconsommeparservice($params)
    {
        $reponse = array(
          'services' => ['Poste Cash', 'Tigo Cash', 'Expresso Cash', 'TNT', 'Joni Joni', 'Orange Money'],
          'depositinitial' => [1000000, 900000, 200000, 500000, 300000, 100000],
          'depositconsomme' => [280000, 480000, 40000, 190000, 96000, 10000]
        );

        return ''. json_encode($reponse);
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

    function listmap($params)
    {
        $reponse = [
          array(
            'lat' => 14.693858,
            'lng' => -17.445982,
            'label' => 'A',
            'title' => 'AA',
            'content' => 'AA'
          ),
          array(
            'lat' => 14.693958,
            'lng' => -16.445882,
            'label' => 'B',
            'title' => 'B',
            'content' => 'B'
          ),
          array(
            'lat' => 15.20998780073036,
            'lng' => -15.8697509765625,
            'label' => 'C',
            'title' => 'C',
            'content' => 'C'
          ),
          array(
            'lat' => 14.291000538604875,
            'lng' => -16.61956787109375,
            'label' => 'D',
            'title' => 'D',
            'content' => 'D'
          ),
          array(
            'lat' => 14.223858,
            'lng' => -16.195982,
            'label' => 'E',
            'title' => 'E',
            'content' => 'E'
          ),
          array(
            'lat' => 14.823858,
            'lng' => -16.095982,
            'label' => 'E',
            'title' => 'E',
            'content' => 'E'
          ),
        ];

        return ''. json_encode($reponse);
    }

    function historiquerecouvrement($params)
    {
        $reponse = [
          array(
            'daterecouvrement' => "2007-05-10",
            'agent' => 'Assane KA',
            'telephone' => 'Assane KA',
            'adresse' => 'Assane KA',
            'montantconsomme' => 500000,
            'commission' => 50000,
            'montantrecouvre' => 50000,
            'montantrestant' => 50000,
          ),
          array(
            'daterecouvrement' => "2007-05-10",
            'agent' => 'Naby NDIAYE',
            'telephone' => 'Assane KA',
            'adresse' => 'Assane KA',
            'montantconsomme' => 300000,
            'commission' => 30000,
            'montantrecouvre' => 50000,
            'montantrestant' => 50000,
          ),
          array(
            'daterecouvrement' => "2007-05-10",
            'agent' => 'Bamba GNING',
            'telephone' => 'Assane KA',
            'adresse' => 'Assane KA',
            'montantconsomme' => 200000,
            'commission' => 20000,
            'montantrecouvre' => 50000,
            'montantrestant' => 50000,
          ),
        ];

        return ''. json_encode($reponse);
    }

    function historiquereclamation($params)
    {
        $reponse = [
          array(
            'datereclamation' => "2007-05-10",
            'agent' => 'Assane KA',
            'pdv' => 'Assane KA',
            'telephone' => 'Assane KA',
            'adresse' => 'Assane KA',
            'typeservice' => "TNT",
            'reclamation' => "Pas de lait",
            'etatreclamation' => "regle"
          ),
          array(
            'datereclamation' => "2007-05-10",
            'agent' => 'Naby NDIAYE',
            'pdv' => 'Naby NDIAYE',
            'telephone' => 'Assane KA',
            'adresse' => 'Assane KA',
            'typeservice' => "E-commerce",
            'reclamation' => "Trop à lese",
            'etatreclamation' => "regle"
          ),
          array(
            'datereclamation' => "2007-05-10",
            'agent' => 'Bamba GNING',
            'pdv' => 'Bamba GNING',
            'telephone' => 'Assane KA',
            'adresse' => 'Assane KA',
            'typeservice' => "Poste Cash",
            'reclamation' => "Parité",
            'etatreclamation' => "regle"
          ),
        ];

        return ''. json_encode($reponse);
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
        $reponse = [
          array(
            'datedemanderetrait' => "2007-05-10",
            'agent' => 'Assane KA',
            'telephone' => 'Assane KA',
            'adresse' => 'Assane KA',
            'montantdemande' => 500000,
            'etatdemande' => 'validé',
          ),
          array(
            'datedemanderetrait' => "2007-05-10",
            'agent' => 'Naby NDIAYE',
            'telephone' => 'Assane KA',
            'adresse' => 'Assane KA',
            'montantdemande' => 300000,
            'etatdemande' => 'validé',
          ),
          array(
            'datedemanderetrait' => "2007-05-10",
            'agent' => 'Bamba GNING',
            'telephone' => 'Assane KA',
            'adresse' => 'Assane KA',
            'montantdemande' => 200000,
            'etatdemande' => 'validé',
          ),
        ];

        return ''. json_encode($reponse);
    }
    
    function listmajcautions($params)
    {
        $reponse = [
          array(
            'idagent' => 1,
            'agent' => 'Assane KA',
            'telephone' => 'Assane KA',
            'adresse' => 'Assane KA',
            'cautioninitiale' => 500000,
            'montantconsomme' => 100000,
          ),
          array(
            'idagent' => 2,
            'agent' => 'Naby NDIAYE',
            'telephone' => 'Assane KA',
            'adresse' => 'Assane KA',
            'cautioninitiale' => 600000,
            'montantconsomme' => 300000,
          ),
          array(
            'idagent' => 3,
            'agent' => 'Bamba GNING',
            'telephone' => 'Assane KA',
            'adresse' => 'Assane KA',
            'cautioninitiale' => 400000,
            'montantconsomme' => 200000,
          ),
        ];

        return ''. json_encode($reponse);
    }
  
    function modifymajcaution($params)
    {
        $reponse = array(
          'response' => "ok",
        );

        return ''. json_encode($reponse);
    }



}