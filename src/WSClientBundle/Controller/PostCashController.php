<?php

namespace WSClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


class PostCashController extends Controller
{
    private $client = null;
    function __construct(){
        $this->client = new \nusoap_client('http://localhost:8888/dev-bbsinvest-plateform/EsquisseBackEnd/web/app.php/invest/postcash?wsdl', true);
    }

    public function getcardusernameAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'tel' => '778036757');
        $result = $this->client->call('getcardusername', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function getfraispartenaireAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'identifiant' => 'identifi');
        $result = $this->client->call('getfraispartenaire', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function rechargementespeceAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'tel_destinataire' => '775198699', 'montant' => '500');
        $result = $this->client->call('rechargementespece', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function retraitespeceAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'code_validation' => '123', 'tel_destinataire' => '778036757', 'montant' => '1000');
        $result = $this->client->call('retraitespece', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function debitercarteAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'code_validation' => '$params->code_validation', 'tel_destinataire' => '778036757', 'montant' => '1000');
        $result = $this->client->call('debitercarte', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function debitcartedirectAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'tel_destinataire' => '778036757', 'montant' => '1000', 'clef_secret' => '$params->clef_secret');
        $result = $this->client->call('debitcartedirect', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function codevalidationAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'tel_destinataire' => '778036757', 'montant' => '1000');
        $result = $this->client->call('codevalidation', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function achatcodewoyofalAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'montant' => 200, 'compteur' => '14256330714');
        $result = $this->client->call('achatcodewoyofal', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function reglementsenelecAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'police' => '1assaneka', 'num_facture' => '1assaneka');
        $result = $this->client->call('reglementsenelec', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function detailfacturesenelecAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'police' => '$params->police', 'num_facture' => '$params->num_facture');
        $result = $this->client->call('detailfacturesenelec', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function achatneoAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'produit' => '$params->produit', 'montant' => '1000', 'type' => '$params->type');
        $result = $this->client->call('achatneo', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function achatjulaAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'mt_carte' => '1assaneka', 'nb_carte' => '1assaneka');
        $result = $this->client->call('achatjula', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function getinfosnumberAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'telephone' => '778036757');
        $result = $this->client->call('getinfosnumber', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function getinfosnumberapAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'telephone' => '778036757');
        $result = $this->client->call('getinfosnumberap', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function achatcredittelephoniqueAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'numero_a_recharger' => '775198699', 'montant' => '200');
        $result = $this->client->call('achatcredittelephonique', array('params' => $params));

        return new JsonResponse(array('result' => $result));
    }

    public function cashtocashsendAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'tel_exp' => '778036757', 'nom_exp' => '$params->nom_exp', 'prenom_exp' => '$params->prenom_exp', 'cni_exp' => '$params->cni_exp', 'type_piece_exp' => '$params->type_piece_exp', 'pays_exp' => '$params->pays_exp', 'tel_rec' => '778036757', 'prenom_rec' => '$params->prenom_rec', 'nom_rec' => '$params->nom_rec', 'montant' => '1000');
        $result = $this->client->call('cashtocashsend', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function cashtocashreceiveAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'tel_rec' => '778036757', 'cni_rec' => '$params->cni_rec', 'type_piece_rec' => '$params->type_piece_rec', 'pays_rec' => '$params->pays_rec', 'code' => '$params->code', 'montant' => '$params->montant');
        $result = $this->client->call('cashtocashreceive', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function transfertverstamtamAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'tel' => '778036757', 'montant' => '$params->montant', 'frais' => '$params->frais', 'nom' => '$params->nom', 'prenom' => '$params->prenom', 'telephone_benef' => '778036757', 'code' => '$params->code', 'pays' => '$params->pays', 'rcv_address' => '$params->rcv_address', 'transaction_reason' => '$params->transaction_reason', 'incoming_source' => '$params->incoming_source');
        $result = $this->client->call('transfertverstamtam', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function consultersoldeneoAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0');
        $result = $this->client->call('consultersoldeneo', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function debitercompteneoAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'montant' => '$params->montant', 'type' => '$params->type');
        $result = $this->client->call('debitercompteneo', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function saveachatneoAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'montant' => '$params->montant', 'code_pin' => '$params->code_pin', 'numero_serie' => '$params->numero_serie', 'date_expiration' => '$params->date_expiration', 'type' => '$params->type', 'telephone' => '778036757', 'num_transac' => '$params->num_transac');
        $result = $this->client->call('saveachatneo', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function transfertverstamtamviaapayAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'prenom_exp' => '$params->prenom_exp', 'nom_exp' => '$params->nom_exp', 'typecni_exp' => '$params->typecni_exp', 'cni_exp' => '$params->cni_exp', 'tel_exp' => '778036757', 'montant' => '1000', 'frais' => '$params->frais', 'nom_dest' => '$params->nom_dest', 'prenom_dest' => '$params->prenom_dest', 'tel_dest' => '778036757', 'pays_dest' => '$params->pays_dest', 'adresse_dest' => '$params->adresse_dest');
        $result = $this->client->call('transfertverstamtamviaapay', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function fraistamtamviaapayAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'montant' => '1000', 'pays' => 'senegal');
        $result = $this->client->call('fraistamtamviaapay', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }

    public function histotransactmarchandAction()
    {
        $params = array('token' => '13f6b94c6b93e5a46fee99615abe1717768fd5a0', 'date_debut' => '2017/03/06', 'date_fin' => '2017/03/07');
        $result = $this->client->call('histotransactmarchand', array('params' => $params));
        return new JsonResponse(array('result' => $result));
    }



}
