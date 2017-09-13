<?php
namespace WSServerBundle\Services;

use Symfony\Component\Validator\Constraints as Assert;

use WSServerBundle\Entity\Tnt;
use WSServerBundle\Entity\Authorizedsessions;
use WSServerBundle\Entity\Abonnements;
use WSServerBundle\Entity\Clients;
use WSServerBundle\Entity\Operations;


class TntService
{
    private $em;
    private $tntClient;
    public function __construct(\Doctrine\ORM\EntityManager $entityManager, \WSClientBundle\Services\TntService $tntClientService)
    {
      $this->em = $entityManager;
      $this->tntClient = $tntClientService;
    }
    public function findByCardOrChip($numero)
    {
     $result = $this->em->getRepository('WSServerBundle:Tnt')->createQueryBuilder('t')
       ->where("t.infosoperation LIKE :numero")
       ->setParameter('numero', '%'.strval($numero).'%')
       ->setMaxResults(1)
       ->getQuery()
       ->getResult();
     return $result ;
    }
    function verifinumeroabonnement($params)
    {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));
      if(empty($correspSession))
        return json_encode( array('errorCode' => 0, 'message' => 'Utilisateur non authentifié') ) ;
      else{      
        $results = $this->findByCardOrChip($params->numeroCarteChip) ;
        if(!empty($results))
          foreach ($results as $result) {
            return $result->getInfosoperation();
          }
        else
          return $this->tntClient->verifinumeroabonnement($params);
      }
    }
    function ajoutabonnement($params)
    {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));
      if(empty($correspSession))
        return json_encode( array('errorCode' => 0, 'message' => 'Utilisateur non authentifié') ) ;
      else{

          $tayy = date("Y-m-d") ;

          $echeance = date ('Y-m-d', strtotime($tayy.'+'.$params->duree.' month')) ;

          $result = $this->tntClient->ajoutabonnement($params);
          $addTime = new \Datetime();
          $paramToRecord = array( 'prenom' => $params->prenom, 'nom' => $params->nom, 'tel' => $params->tel, 'adresse' => $params->adresse, 'region' => $params->region, 'city' => $params->city, 'cni' => $params->cni, 'n_chip' => $params->numerochip, 'n_carte' => $params->numerocarte, 'date_abonnement'=>$addTime->format('Y-m-d H:i'), 'duree' => $params->duree, 'id_typeabonnement' => $params->typedebouquet, 'montant' => $params->montant );
          if(json_decode($result)->response=="ok"){
              $tntRecord = new Tnt();
              $tntRecord->setIduser($correspSession->getIdUser());
              $tntRecord->setTypeoperation("abonnement");
              $tntRecord->setInfosoperation(json_encode($paramToRecord));
              $tntRecord->setDateOperation($addTime);
              $tntRecord->setEcheance(new \DateTime($echeance));
              $tntRecord->setDependsOn($correspSession->getDependsOn());

              $this->em->persist($tntRecord);
              $this->em->flush();
            
          }

          $newAbonnement= new Abonnements();
          $newAbonnement->setNomservice('TNT');
          $infosup=json_encode( array('type'=>json_decode($infoassurance["designation"])->desig) );
          $newAbonnement->setInfosup($infosup);
          $newAbonnement->setPrenom(json_decode($infoassurance["designation"])->prenom);
          $newAbonnement->setNom(json_decode($infoassurance["designation"])->nom);
          $newAbonnement->setTelephone(json_decode($infoassurance["designation"])->telephone);
          $newAbonnement->setDateajout( new \Datetime(json_decode($infoassurance["designation"])->datedebut) );
          $newAbonnement->setEcheance( new \Datetime(json_decode($infoassurance["designation"])->datefin) );
          $newAbonnement->setIdUser( $correspSession->getIdUser());
          $newAbonnement->setDependsOn( $correspSession->getDependsOn());
          $this->em->persist($newAbonnement);

           $client = $this->em->getRepository('WSServerBundle:Clients')->findOneBy(array('telephone'=>$newAbonnement->getTelephone()));
           if(empty($client))
           {
            $newClient= new Clients();
            $newClient->setNom($newAbonnement->getNom());
            $newClient->setPrenom($newAbonnement->getPrenom());
            $newClient->setTelephone($newAbonnement->getTelephone());
            $newClient->setIdUser( $correspSession->getIdUser());
             $newClient->setDependsOn( $correspSession->getDependsOn());
             $addTime = new \Datetime();
             $newClient->setDateAjout($addTime);
             $this->em->persist($newClient);

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
          
        $paramToRecord = array('prenom' => $params->prenom, 'nom' => $params->nom, 'tel' => $params->tel, 'adresse' => $params->adresse, 'region' => $params->region, 'cni' => $params->cni, 'numerochip' => $params->numerochip, 'numerocarte' => $params->numerocarte, 'typedebouquet' => $params->typedebouquet, 'prix' => $params->prix);
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
    function ventecarte($params)
    {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));
      if(empty($correspSession))
        return json_encode( array('errorCode' => 0, 'message' => 'Utilisateur non authentifié') ) ;
      else{
          
        $paramToRecord = array('prenom' => $params->prenom, 'nom' => $params->nom, 'tel' => $params->tel, 'adresse' => $params->adresse, 'region' => $params->region, 'cni' => $params->cni, 'numerocarte' => $params->numerocarte, 'prix' => $params->prix);
        $tntRecord = new Tnt();
        $tntRecord->setIduser($correspSession->getIdUser());
        $tntRecord->setTypeoperation("carte");
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
          if ($correspSession->getAccesslevel() != 1){
            $dbdecodeurs = $this->em->getRepository('WSServerBundle:Tnt')->findBy(array('iduser' => $correspSession->getIdUser(), 'typeoperation' => "decodeur"));  
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
    function listcarte($params)
    {
      $correspSession = $this->em->getRepository('WSServerBundle:Authorizedsessions')->findOneBy(array('token'=>$params->token));
      if(empty($correspSession))
        return json_encode( array('errorCode' => 0, 'message' => 'Utilisateur non authentifié') ) ;
      else{
          if ($correspSession->getAccesslevel() != 1){
            $dbdecodeurs = $this->em->getRepository('WSServerBundle:Tnt')->findBy(array('iduser' => $correspSession->getIdUser(), 'typeoperation' => "carte"));  
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
}