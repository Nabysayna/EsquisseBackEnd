<?php

namespace WSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
   
 
    public function indexAction()
    {
       /* $server = new \SoapServer('webservice.wsdl');
        $server->setObject($this->get('hello_service'));

        $response = new Response();
        $response->headers->set('Content-Type', 'text/xml; charset=ISO-8859-1');

        ob_start();
        $server->handle();
        $response->setContent(ob_get_clean());*/
        
        return new JsonResponse(array('prenom'=>'mag'));
    }

    public function clientoapAction()
    {

        
        $client = new \nusoap_client('http://localhost:8888/EsquisseBackEnd/web/app_dev.php?wsdl', true);
 
        $result = $client->call('hello', array('name' => 'Team'));
 
        return new JsonResponse(array('result' => $result));
    }

    public function bdtestAction()
    {

        // $em = $this->getDoctrine()->getManager();
        // $query = $em->createQuery("SELECT 
        //     a.id AS idarticle,
        //     CONCAT(u.prenom,' ', u.nom) AS createby,
        //     a.description,
        //     u.zone 
        //     FROM 
        //     WSServerBundle\Entity\Articles a, WSServerBundle\Entity\Users u
        //     WHERE 
        //     a.idUser=u.idUser
        // ");
      
      
        // $results = $query->getArrayResult();
        // return new JsonResponse($results);

        $testDB = $this->get('test_server_mailing');
        $results = $testDB->envoifromsite("kasanesn@gmail.com","test","K.FDDGH");
        return new JsonResponse($results);
        

    }
}
