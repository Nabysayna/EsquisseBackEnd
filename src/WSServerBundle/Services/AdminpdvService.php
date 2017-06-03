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



}