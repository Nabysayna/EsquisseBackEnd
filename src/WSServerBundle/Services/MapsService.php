<?php

namespace WSServerBundle\Services;
use WSServerBundle\Entity\Authorizedsessions;


class MapsService
{

    private $em;

    public function __construct(\Doctrine\ORM\EntityManager $entityManager)
    {
      $this->em = $entityManager;
    }

    function listmaps($params)
    {
        $reponse = [
          array('lat' => 14.693858, 'lng' => -17.445982, 'label' => 'A', 'title' => 'AA', 'content' => 'AA'),
          array('lat' => 14.693958, 'lng' => -16.445882, 'label' => 'B', 'title' => 'B', 'content' => 'B'),
          array('lat' => 15.20998780073036, 'lng' => -15.8697509765625, 'label' => 'C', 'title' => 'C', 'content' => 'C'),
          array('lat' => 14.291000538604875, 'lng' => -16.6195678710937, 'label' => 'D', 'title' => 'D', 'content' => 'D'),
          array('lat' => 14.223858, 'lng' => -16.195982, 'label' => 'E', 'title' => 'E', 'content' => 'E'),
          array('lat' => 14.823858, 'lng' => -16.095982, 'label' => 'E', 'title' => 'E', 'content' => 'E'),
        ];

        return ''. json_encode($reponse);
    }

    function listmapsdepart($params)
    {
      $reponse = [
        array('lat' => 14.6937000, 'lng' => -17.4440600, 'region' => 'Dakar', 'name' => 'Dakar'),
        array('lat' => 14.7645700, 'lng' => -17.3907100, 'region' => 'Dakar', 'name' => 'Pikine'),
        array('lat' => 14.7828199, 'lng' => -17.376013, 'region' => 'Dakar', 'name' => 'Guediawaye'),
        array('lat' => 14.71554, 'lng' => -17.270929, 'region' => 'Dakar', 'name' => 'Rufisque'),
        array('lat' => 14.8341700, 'lng' => -17.1061100, 'region' => 'Thies', 'name' => 'Thies'),
        array('lat' => 14.4228422, 'lng' => -16.9653756, 'region' => 'Thies', 'name' => 'Mbour'),
        array('lat' => 14.70074000, 'lng' => -16.45911000, 'region' => 'Thies', 'name' => 'Bambey'),
      ];

      return ''. json_encode($reponse);
    }

    function listmapspardepart($params)
    {
      $reponse = null;
      if ($params->type = "Dakar") $reponse = [
        array('lat' => 14.6937000, 'lng' => -17.4440600, 'region' => 'Dakar', 'name' => 'Dakar'),
        array('lat' => 14.7645700, 'lng' => -17.3907100, 'region' => 'Dakar', 'name' => 'Pikine'),
        array('lat' => 14.7828199, 'lng' => -17.376013, 'region' => 'Dakar', 'name' => 'Guediawaye'),
        array('lat' => 14.71554, 'lng' => -17.270929, 'region' => 'Dakar', 'name' => 'Rufisque'),
      ];
      else $reponse = [
        array('lat' => 14.8341700, 'lng' => -17.1061100, 'region' => 'Thies', 'name' => 'Thies'),
        array('lat' => 14.4228422, 'lng' => -16.9653756, 'region' => 'Thies', 'name' => 'Mbour'),
        array('lat' => 14.70074000, 'lng' => -16.45911000, 'region' => 'Thies', 'name' => 'Bambey'),
      ];

      return ''. json_encode($reponse);
    }


}