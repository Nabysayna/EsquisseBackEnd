<?php

namespace WSServerBundle\Services;


class ComptapdvService
{
    private $em;

    public function __construct(\Doctrine\ORM\EntityManager $entityManager){
      $this->em = $entityManager;
    }
   
    
    public function listerevenu($params) {   
        $reponse = array(
          'typedebouquet' => 'listerevenu'
        );

        return ''. json_encode($reponse);
    }

    public function listeservice($params) {   
        $query = $this->em->createQuery("SELECT serv FROM WSServerBundle\Entity\Services serv WHERE serv.idadminpdv=3");
        $results = $query->getArrayResult();
        return ''. json_encode(array('errorCode' => 1, 'response' => $results));
    }

    public function listecaisse($params) {   
        $query = $this->em->createQuery("SELECT cais FROM WSServerBundle\Entity\Caisse cais WHERE cais.idadminpdv=3");
        $results = $query->getArrayResult();
        return ''. json_encode(array('errorCode' => 1, 'response' => $results));
    }

    public function approvisionner($params) {   
        $reponse = array(
          'typedebouquet' => 'approvisionner'
        );

        return ''. json_encode($reponse);
    }

    public function ajoutservice($params) {   
        $reponse = array(
          'typedebouquet' => 'ajoutservice'
        );

        return ''. json_encode($reponse);
    }
    
    public function modifierservice($params) {   
        $reponse = array(
          'typedebouquet' => 'modifierservice'
        );

        return ''. json_encode($reponse);
    }
    public function supprimerservice($params) {   
        $reponse = array(
          'typedebouquet' => 'supprimerservice'
        );

        return ''. json_encode($reponse);
    }

    public function ajoutcharge($params) {   
        $reponse = array(
          'typedebouquet' => 'ajoutcharge'
        );

        return ''. json_encode($reponse);
    }
    
    public function listecharge($params) {   
        $reponse = array(
          'typedebouquet' => 'listecharge'
        );

        return ''. json_encode($reponse);
    }

    // Define the method as a PHP function
    public function totaloperationparapi($params) {   
      $reponse = array(
        'typedebouquet' => 'totaloperationparapi'
      );

      return ''. json_encode($reponse);
    }

    public function totalenvoiesparapi($params) {   
      $reponse = array(
        'typedebouquet' => 'totalenvoiesparapi'
      );

      return ''. json_encode($reponse);
    }

    public function totalreceptionsparapi($params) {   
      $reponse = array(
        'typedebouquet' => 'totalreceptionsparapi'
      );

      return ''. json_encode($reponse);
    }

    public function totalfraistransfertpercueparapi($params) {   
      $reponse = array(
        'typedebouquet' => 'totalfraistransfertpercueparapi'
      );

      return ''. json_encode($reponse);
    }

    public function totalcommissionparapi($params) {   
      $reponse = array(
        'typedebouquet' => 'totalcommissionparapi'
      );

      return ''. json_encode($reponse);
    }

    public function totaloperationall($params) {   
      $reponse = array(
        'typedebouquet' => 'totaloperationall'
      );

      return ''. json_encode($reponse);
    }

    public function totalenvoiesall($params) {   
      $reponse = array(
        'typedebouquet' => 'totalenvoiesall'
      );

      return ''. json_encode($reponse);
    }

    public function totalreceptionsall($params) {   
      $reponse = array(
        'typedebouquet' => 'totalreceptionsall'
      );

      return ''. json_encode($reponse);
    }

    public function totalfraistransfertpercuesall($params) {   
      $reponse = array(
        'typedebouquet' => '123'
      );

      return ''. json_encode($reponse);
    }
    
    public function totalcommissionall($params) {   
      $reponse = array(
        'typedebouquet' => 'totalcommissionall'
      );

      return ''. json_encode($reponse);
    }



    
}