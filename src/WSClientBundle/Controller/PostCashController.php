<?php

namespace WSClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


class PostCashController extends Controller
{
    private $client = null;
    function __construct(){
        $this->client = new \nusoap_client('http://localhost/EsquisseBackEnd/web/app_dev.php/invest/postcash?wsdl', true);
    }

    public function getcardusernameAction()
    {
        $params = array('token' => '$this->token_api', 'tel' => 'tel');
        $result = $this->client->call('getcardusername', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function getfraispartenaireAction()
    {
        $params = array('token' => '$this->token_api', 'identifiant' => 'identifiant');
        $result = $this->client->call('getfraispartenaire', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function rechargementespeceAction()
    {
        
        // $client = new \nusoap_client("http://www.webservicex.net/stockquote.asmx?WSDL", true);
        // $parameters = array('symbol' => 'IBM');
        // $result = $client->call('GetQuote', array('parameters' => $parameters));

        $params = array('token' => 'assaneka', 'tel_destinataire' => '12', 'montant' => '100000');
        $result = $this->client->call('rechargementespece', array('params' => $params));        
        return new JsonResponse(array('result' => $result));
    }

    public function retraitespeceAction()
    {
        $params = array('token' => 'assaneka', 'code_validation' => '123', 'tel_destinataire' => '1234', 'montant' => '10000');
        $result = $this->client->call('retraitespece', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function debitercarteAction()
    {
        $params = array('token' => '$this->token_api', 'code_validation' => '$params->code_validation', 'tel_destinataire' => '$params->tel_destinataire', 'montant' => '$params->montant');
        $result = $this->client->call('debitercarte', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function debitcartedirectAction()
    {
        $params = array('token' => '$this->token_api', 'tel_destinataire' => '$params->tel_destinataire', 'montant' => '$params->montant', 'clef_secret' => '$params->clef_secret');
        $result = $this->client->call('debitcartedirect', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function codevalidationAction()
    {
        $params = array('token' => '$this->token_api', 'tel_destinataire' => '$params->tel_destinataire', 'montant' => '$params->montant');
        $result = $this->client->call('codevalidation', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function achatcodewoyofalAction()
    {
        $params = array('token' => 'assaneka', 'montant' => 12345, 'compteur' => '11assaneka');
        $result = $this->client->call('achatcodewoyofal', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function reglementsenelecAction()
    {
        $params = array('token' => 'assaneka', 'police' => '1assaneka', 'num_facture' => '1assaneka');
        $result = $this->client->call('reglementsenelec', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function detailfacturesenelecAction()
    {
        $params = array('token' => '$this->token_api', 'police' => '$params->police', 'num_facture' => '$params->num_facture');
        $result = $this->client->call('detailfacturesenelec', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function achatneoAction()
    {
        $params = array('token' => '$this->token_api', 'produit' => '$params->produit', 'montant' => '$params->montant', 'type' => '$params->type');
        $result = $this->client->call('achatneo', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function achatjulaAction()
    {
        $params = array('token' => 'assaneka', 'mt_carte' => '1assaneka', 'nb_carte' => '1assaneka');
        $result = $this->client->call('achatjula', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function getinfosnumberAction()
    {
        $params = array('token' => '$this->token_api', 'telephone' => '$params->telephone');
        $result = $this->client->call('getinfosnumber', array('params' => $params));
        return $result;
    }

    public function getinfosnumberapAction()
    {
        $params = array('token' => '$this->token_api', 'telephone' => '$params->telephone');
        $result = $this->client->call('getinfosnumberap', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function achatcredittelephoniqueAction()
    {
        $params = array('token' => 'assaneka', 'numero_a_recharger' => 'assaneka', 'montant' => '12345');
        $result = $this->client->call('achatcredittelephonique', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function cashtocashsendAction()
    {
        $params = array('token' => '$this->token_api', 'tel_exp' => '$params->tel_exp', 'nom_exp' => '$params->nom_exp', 'prenom_exp' => '$params->prenom_exp', 'cni_exp' => '$params->cni_exp', 'type_piece_exp' => '$params->type_piece_exp', 'pays_exp' => '$params->pays_exp', 'tel_rec' => '$params->tel_rec', 'prenom_rec' => '$params->prenom_rec', 'nom_rec' => '$params->nom_rec', 'montant' => '$params->montant');
        $result = $this->client->call('cashtocashsend', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function cashtocashreceiveAction()
    {
        $params = array('token' => '$this->token_api', 'tel_rec' => '$params->tel_rec', 'cni_rec' => '$params->cni_rec', 'type_piece_rec' => '$params->type_piece_rec', 'pays_rec' => '$params->pays_rec', 'code' => '$params->code', 'montant' => '$params->montant');
        $result = $this->client->call('cashtocashreceive', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function transfertverstamtamAction()
    {
        $params = array('token' => '$this->token_api', 'tel' => '$params->tel', 'montant' => '$params->montant', 'frais' => '$params->frais', 'nom' => '$params->nom', 'prenom' => '$params->prenom', 'telephone_benef' => '$params->telephone_benef', 'code' => '$params->code', 'pays' => '$params->pays', 'rcv_address' => '$params->rcv_address', 'transaction_reason' => '$params->transaction_reason', 'incoming_source' => '$params->incoming_source');
        $result = $this->client->call('transfertverstamtam', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function consultersoldeneoAction()
    {
        $params = array('token' => '$this->token_api');
        $result = $this->client->call('consultersoldeneo', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function debitercompteneoAction()
    {
        $params = array('token' => '$this->token_api', 'montant' => '$params->montant', 'type' => '$params->type');
        $result = $this->client->call('debitercompteneo', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function saveachatneoAction()
    {
        $params = array('token' => '$this->token_api', 'montant' => '$params->montant', 'code_pin' => '$params->code_pin', 'numero_serie' => '$params->numero_serie', 'date_expiration' => '$params->date_expiration', 'type' => '$params->type', 'telephone' => '$params->telephone', 'num_transac' => '$params->num_transac');
        $result = $this->client->call('saveachatneo', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function transfertverstamtamviaapayAction()
    {
        $params = array('token' => '$this->token_api', 'prenom_exp' => '$params->prenom_exp', 'nom_exp' => '$params->nom_exp', 'typecni_exp' => '$params->typecni_exp', 'cni_exp' => '$params->cni_exp', 'tel_exp' => '$params->tel_exp', 'montant' => '$params->montant', 'frais' => '$params->frais', 'nom_dest' => '$params->nom_dest', 'prenom_dest' => '$params->prenom_dest', 'tel_dest' => '$params->tel_dest', 'pays_dest' => '$params->pays_dest', 'adresse_dest' => '$params->adresse_dest');
        $result = $this->client->call('transfertverstamtamviaapay', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function fraistamtamviaapayAction()
    {
        $params = array('token' => '$this->token_api', 'montant' => '$params->montant', 'pays' => '$params->pays');
        $result = $this->client->call('fraistamtamviaapay', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function histotransactmarchandAction()
    {
        $params = array('token' => 'token_api', 'date_debut' => 'date_debut', 'date_fin' => 'date_fin');
        $result = $this->client->call('histotransactmarchand', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }



}