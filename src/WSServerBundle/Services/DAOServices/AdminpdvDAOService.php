<?php

namespace WSServerBundle\Services;
use WSServerBundle\Entity\Tnt;
use WSServerBundle\Entity\Expressocash;
use WSServerBundle\Entity\Jonijoni;
use WSServerBundle\Entity\Postcash;
use WSServerBundle\Entity\Tigocash;

class AdminpdvDAOService
{

    private $em;
    public function __construct(\Doctrine\ORM\EntityManager $entityManager)
    {
      $this->em = $entityManager;
    }


    public function findByCardOrChip()
    {
     $result = $this->em->getRepository('WSServerBundle:Tnt')->createQueryBuilder('t')
       ->where("t.infosoperation LIKE :numero")
       ->setParameter('numero', '%'.strval($numero).'%')
       ->setMaxResults(1)
       ->getQuery()
       ->getResult();

     return $result ;
    }

 
}