<?php

namespace WSServerBundle\Services;
use WSServerBundle\Entity\Tnt;
use WSServerBundle\Entity\Authorizedsessions;


class TntService
{

    private $em;
    private $tntClient;

    public function __construct(\Doctrine\ORM\EntityManager $entityManager, \WSClientBundle\Services\TntService $tntClientService)
    {
      $this->em = $entityManager;
      $this->tntClient = $tntClientService;

    }

    function verifinumeroabonnement($params)
    {
      $result = $this->em->getRepository('WSServerBundle:Tnt')->findByinfosoperation($params->numeroCarteChip) ;
     //$result = $this->tntClient->verifinumeroabonnement($params);
     //$result = $this->em->getRepository('WSServerBundle:Tnt')->findAll();  

      if(empty($result))
        return 'retour vide';
      return json_encode($result);
    }


    function ajoutabonnement($params)
    {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if(empty($correspSession))
        return json_encode( array('errorCode' => 0, 'message' => 'Utilisateur non authentifié') ) ;
      else{
          $result = $this->tntClient->ajoutabonnement($params);
          $addTime = new \Datetime();
          $paramToRecord = array( 'prenom' => $params->prenom, 'nom' => $params->nom, 'tel' => $params->tel, 'adresse' => $params->adresse, 'region' => $params->region, 'city' => $params->city, 'cni' => $params->cni, 'n_chip' => $params->numerochip, 'n_carte' => $params->numerocarte, 'date_abonnement'=>$addTime->format('Y-m-d H:i'), 'duree' => $params->duree, 'id_typeabonnement' => $params->typedebouquet, 'montant' => $params->montant );

          if(json_decode($result)->response=="ok"){
              $tntRecord = new Tnt();
              $tntRecord->setIduser($correspSession->getIdUser());
              $tntRecord->setTypeoperation("abonnement");
              $tntRecord->setInfosoperation(json_encode($paramToRecord));
              $tntRecord->setDateOperation($addTime);

              $this->em->persist($tntRecord);
              $this->em->flush();
            
          }
          return $result;
      }
    }


    function listabonnement($params)
    {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if(empty($correspSession))
        return json_encode( array('errorCode' => 0, 'message' => 'Utilisateur non authentifié') ) ;
      else{
        if ($correspSession->getAccesslevel() != 1){
          $dbdecodeurs = $this->em->getRepository('WSServerBundle:Tnt')->findBy(array('iduser' => $correspSession->getIdUser(), 'typeoperation' => "abonnement"));  
          $formatted = [] ; $i=0 ;
          foreach ($dbdecodeurs as $decodeur) {
                 $formatted[$i] = json_decode($decodeur->getInfosoperation()) ;
                 $i++ ;
          }
          return ''. json_encode($formatted);
        }
        else {
          $result = $this->tntClient->listabonnement($params);
          return $result;
        }
      }
    }

    function ventedecodeur($params)
    {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if(empty($correspSession))
        return json_encode( array('errorCode' => 0, 'message' => 'Utilisateur non authentifié') ) ;
      else{
          
        $paramToRecord = array('prenom' => $params->prenom, 'nom' => $params->nom, 'tel' => $params->tel, 'adresse' => $params->adresse, 'region' => $params->region, 'city' => $params->city, 'cni' => $params->cni, 'numerochip' => $params->numerochip, 'numerocarte' => $params->numerocarte, 'typedecodeur' => $params->typedecodeur, 'prix' => $params->prix);

        $tntRecord = new Tnt();
        $tntRecord->setIduser($correspSession->getIdUser());
        $tntRecord->setTypeoperation("decodeur");
        $tntRecord->setInfosoperation(json_encode($paramToRecord));
        $tntRecord->setDateOperation(new \Datetime());

        $this->em->persist($tntRecord);
        $this->em->flush();
          
        return 'ok';
      }
    }

    function listdecodeur($params)
    {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));

      if(empty($correspSession))
        return json_encode( array('errorCode' => 0, 'message' => 'Utilisateur non authentifié') ) ;
      else{
        $dbdecodeurs = $this->em->getRepository('WSServerBundle:Tnt')->findBy(array('iduser' => $correspSession->getIdUser(), 'typeoperation' => "decodeur"));  
        $formatted = [];
        foreach ($dbdecodeurs as $decodeur) {
            $formatted[] = [
               'id' => $decodeur->getId(),
               'typeOperation' => $decodeur->getTypeoperation()
            ];
        }
        return ''. json_encode($formatted);
      }
        
    }

}