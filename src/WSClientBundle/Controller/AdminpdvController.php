<?php

namespace WSClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use WSClientBundle\Entity\Processdeposit;


class AdminpdvController extends Controller
{
    private $client = null;
    function __construct(){
        $this->client = new \nusoap_client('http://localhost/dev-bbsinvest-plateform/EsquisseBackEnd/web/app_dev.php/invest/adminpdv?wsdl', true);
    }

    public function listuserpdvAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'type' =>  '65443');
        $result = $this->client->call('listuserpdv', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    
    public function nombredereclamationpdvventeAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'type' =>  '65443');
        $result = $this->client->call('nombredereclamationpdvvente', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    
    public function montanttransfertserviceAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'type' =>  '65443');
        $result = $this->client->call('montanttransfertservice', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    
    public function performancepdvAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'type' =>  '65443');
        $result = $this->client->call('performancepdv', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    
    public function notificationsAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'type' =>  '65443');
        $result = $this->client->call('notifications', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    
    public function bilandepositAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'type' =>  '65443');
        $result = $this->client->call('bilandeposit', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    
    public function consommationdepositserviceAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'type' =>  '65443');
        $result = $this->client->call('consommationdepositservice', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    
    public function consommationdepositpdvAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'type' =>  '65443');
        $result = $this->client->call('consommationdepositpdv', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    
    public function historiquerecouvrementAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'type' =>  '65443');
        $result = $this->client->call('historiquerecouvrement', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    
    public function historiquereclamationAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'type' =>  '65443');
        $result = $this->client->call('historiquereclamation', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    public function initierDepositAction()
    {   $params=array('token'=>'bbs','montant'=>50000,'idInitiateur'=>10,'recouvreur'=>3);
		$emr=$this->getDoctrine()->getManager()->getRepository('WSServerBundle:Authorizedsessions');
		$rep=$emr->findOneBy(array('token'=>$params['token']));
		$reps="echec";
		if(!empty($rep)){
			$deposit=new processdeposit();
			$deposit->setIdadminpdv($rep->getIdUser());
			$deposit->setmontantdeposit($params['montant']);
			$deposit->setEtatdemande(1);
			$deposit->setDatedemande(new \DateTime());
			$deposit->setInitiateur($params['idInitiateur']);
			$deposit->setAgentRecouvreur($params['recouvreur']);
			$deposit->setImageqrcode("url");
			$deposit->setAgentPositionneur("agent test");
			$em=$this->getDoctrine()->getManager();
			$em->persist($deposit);
			$em->flush();
			$reps="reussi";
	    }
        /*$params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'type' =>  '65443');
        $result = $this->client->call('historiquereclamation', array('params' => $params));
        return new JsonResponse(array('result' => $result));*/
        return new Response($reps);
    }
    public function accepterDepositAction()
    {
		$params=array('token'=>'agent','id'=>5);
		$em=$this->getDoctrine()->getManager();
		$emr=$em->getRepository('WSServerBundle:Processdeposit');
		$emaut=$em->getRepository('WSServerBundle:Authorizedsessions');
		$rep=$emr->findOneBy(array('id'=>$params['id']));
		$agent=$emaut->findOneBy(array('token'=>$params['token']));
		if(!empty($rep) && !empty($agent)){
			  $rep->setEtatdemande(2);
			  $tontou=$em->flush();
			}
        /*$params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'type' =>  '65443');
        $result = $this->client->call('historiquereclamation', array('params' => $params));*/
        return new JsonResponse(array('result' => $tontou));
    }
    public function positionerDepositAction()
    {
       /* $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'type' =>  '65443');
        $result = $this->client->call('historiquereclamation', array('params' => $params));*/
        return new JsonResponse(array('result' => $result));
    }
    public function validerDepositAction()
    {   
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'type' =>  '65443');
        $result = $this->client->call('historiquereclamation', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }
    

}
