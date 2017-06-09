<?php

namespace WSClientBundle\Services;

class PostCashService
{

    private $client = null;
    private $token_api = 'postcash';
    private $marchand = 546;
    private $keyMarchand = '37e231cce92babd1c4fb7731632bfbf80a238b7a';
    
    public function __construct()
    {
        $this->client = new \nusoap_client('http://abonnement.bbstvnet.com/wsclient/index.php?wsdl', true);
    }


    function getcardusername($params)
    {
        $params = array('token' => $this->token_api, 'marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'tel' => 'tel');
        $result = $this->client->call('getcardusername', array('params' => $params));
        return $result;
    }

    function getfraispartenaire($params)
    {
        $params = array('token' => $this->token_api, 'marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'identifiant' => 'identifiant');
        $result = $this->client->call('getfraispartenaire', array('params' => $params));
        return $result;
    }

    function rechargementespece($params)
    {
        $params = array('token' => $this->token_api, 'marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'tel_destinataire' => $params->tel_destinataire, 'montant' => $params->montant);
        $result = $this->client->call('rechargementespece', array('params' => $params));
        return $result;
    }

    function retraitespece($params)
    {
        $params = array('token' => $this->token_api, 'marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'code_validation' => $params->code_validation, 'tel_destinataire' => $params->tel_destinataire, 'montant' => $params->montant);
        $result = $this->client->call('retraitespece', array('params' => $params));
        return $result;
    }

    function debitercarte($params)
    {
        $params = array('token' => $this->token_api, 'marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'code_validation' => $params->code_validation, 'tel_destinataire' => $params->tel_destinataire, 'montant' => $params->montant);
        $result = $this->client->call('debitercarte', array('params' => $params));
        return $result;
    }

    function debitcartedirect($params)
    {
        $params = array('token' => $this->token_api, 'marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'tel_destinataire' => $params->tel_destinataire, 'montant' => $params->montant, 'clef_secret' => $params->clef_secret);
        $result = $this->client->call('debitcartedirect', array('params' => $params));
        return $result;
    }

    function codevalidation($params)
    {
        $params = array('token' => $this->token_api, 'marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'tel_destinataire' => $params->tel_destinataire, 'montant' => $params->montant);
        $result = $this->client->call('codevalidation', array('params' => $params));
        return $result;
    }

    function achatcodewoyofal($params)
    {
        $params = array('token' => $this->token_api, 'marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'montant' => $params->montant, 'compteur' => $params->compteur);
        $result = $this->client->call('achatcodewoyofal', array('params' => $params));
        return $result;
    }

    function reglementsenelec($params)
    {
        $params = array('token' => $this->token_api, 'marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'police' => $params->police, 'num_facture' => $params->num_facture);
        $result = $this->client->call('reglementsenelec', array('params' => $params));
        return $result;
    }

    function detailfacturesenelec($params)
    {
        $params = array('token' => $this->token_api, 'marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'police' => $params->police, 'num_facture' => $params->num_facture);
        $result = $this->client->call('detailfacturesenelec', array('params' => $params));
        return $result;
    }

    function achatneo($params)
    {
        $params = array('token' => $this->token_api, 'marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'produit' => $params->produit, 'montant' => $params->montant, 'type' => $params->type);
        $result = $this->client->call('achatneo', array('params' => $params));
        return $result;
    }

    function achatjula($params)
    {
        $params = array('token' => $this->token_api, 'marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'mt_carte' => $params->mt_carte, 'nb_carte' => $params->nb_carte);
        $result = $this->client->call('achatjula', array('params' => $params));
        return $result;
    }

    function getinfosnumber($params)
    {
        $params = array('token' => $this->token_api, 'marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'telephone' => $params->telephone);
        $result = $this->client->call('getinfosnumber', array('params' => $params));
        return $result;
    }

    function getinfosnumberap($params)
    {
        $params = array('token' => $this->token_api, 'marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'telephone' => $params->telephone);
        $result = $this->client->call('getinfosnumberap', array('params' => $params));
        return $result;
    }

    function achatcredittelephonique($params)
    {
        $params = array('token' => $this->token_api, 'marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'numero_a_recharger' => $params->numero_a_recharger, 'montant' => $params->montant);
        $result = $this->client->call('achatcredittelephonique', array('params' => $params));
        return $result;
    }

    function cashtocashsend($params)
    {
        $params = array('token' => $this->token_api, 'marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'tel_exp' => $params->tel_exp, 'nom_exp' => $params->nom_exp, 'prenom_exp' => $params->prenom_exp, 'cni_exp' => $params->cni_exp, 'type_piece_exp' => $params->type_piece_exp, 'pays_exp' => $params->pays_exp, 'tel_rec' => $params->tel_rec, 'prenom_rec' => $params->prenom_rec, 'nom_rec' => $params->nom_rec, 'montant' => $params->montant);
        $result = $this->client->call('cashtocashsend', array('params' => $params));
        return $result;
    }

    function cashtocashreceive($params)
    {
        $params = array('token' => $this->token_api, 'marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'tel_rec' => $params->tel_rec, 'cni_rec' => $params->cni_rec, 'type_piece_rec' => $params->type_piece_rec, 'pays_rec' => $params->pays_rec, 'code' => $params->code, 'montant' => $params->montant);
        $result = $this->client->call('cashtocashreceive', array('params' => $params));
        return $result;
    }

    function transfertverstamtam($params)
    {
        $params = array('token' => $this->token_api, 'marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'tel' => $params->tel, 'montant' => $params->montant, 'frais' => $params->frais, 'nom' => $params->nom, 'prenom' => $params->prenom, 'telephone_benef' => $params->telephone_benef, 'code' => $params->code, 'pays' => $params->pays, 'rcv_address' => $params->rcv_address, 'transaction_reason' => $params->transaction_reason, 'incoming_source' => $params->incoming_source);
        $result = $this->client->call('transfertverstamtam', array('params' => $params));
        return $result;
    }

    function consultersoldeneo($params)
    {
        $params = array('token' => $this->token_api, 'marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand);
        $result = $this->client->call('consultersoldeneo', array('params' => $params));
        return $result;
    }

    function debitercompteneo($params)
    {
        $params = array('token' => $this->token_api, 'marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'montant' => $params->montant, 'type' => $params->type);
        $result = $this->client->call('debitercompteneo', array('params' => $params));
        return $result;
    }

    function saveachatneo($params)
    {
        $params = array('token' => $this->token_api, 'marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'montant' => $params->montant, 'code_pin' => $params->code_pin, 'numero_serie' => $params->numero_serie, 'date_expiration' => $params->date_expiration, 'type' => $params->type, 'telephone' => $params->telephone, 'num_transac' => $params->num_transac);
        $result = $this->client->call('saveachatneo', array('params' => $params));
        return $result;
    }

    function transfertverstamtamviaapay($params)
    {
        $params = array('token' => $this->token_api, 'marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'prenom_exp' => $params->prenom_exp, 'nom_exp' => $params->nom_exp, 'typecni_exp' => $params->typecni_exp, 'cni_exp' => $params->cni_exp, 'tel_exp' => $params->tel_exp, 'montant' => $params->montant, 'frais' => $params->frais, 'nom_dest' => $params->nom_dest, 'prenom_dest' => $params->prenom_dest, 'tel_dest' => $params->tel_dest, 'pays_dest' => $params->pays_dest, 'adresse_dest' => $params->adresse_dest);
        $result = $this->client->call('transfertverstamtamviaapay', array('params' => $params));
        return $result;
    }

    function fraistamtamviaapay($params)
    {
        $params = array('token' => $this->token_api, 'marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'montant' => $params->montant, 'pays' => $params->pays);
        $result = $this->client->call('fraistamtamviaapay', array('params' => $params));
        return $result;
    }

    function histotransactmarchand($params)
    {
        $params = array('token' => $this->token_api, 'marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'date_debut' => $params->date_debut, 'date_fin' => $params->date_fin);
        $result = $this->client->call('histotransactmarchand', array('params' => $params));
        return $result;
    }



}
