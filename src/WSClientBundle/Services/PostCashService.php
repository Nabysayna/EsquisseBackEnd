<?php

namespace WSClientBundle\Services;

class PostCashService
{

    private $client = null;
    private $marchand = 546;
    private $keyMarchand = '37e231cce92babd1c4fb7731632bfbf80a238b7a';
    
    public function __construct()
    {
        //$this->client = new \nusoap_client('http://abonnement.bbstvnet.com/wsclient/index.php?wsdl', true);
        // $this->client = new \nusoap_client('http://numherit-labs.com/pmp-admingtp/webservice/indexTamTam.php?wsdl', true);
    }

    
    function getcardusername($params)
    {
        $paramss = array('marchand'  => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'tel' => $params->tel );
        $result = ''.json_encode($params);
        return $result;
    }

    function getinfosnumber($params)
    {
        $params = array('marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'telephone' => $params->telephone);
        $result = ''.json_encode($params);
        return $result;
    }

    function getinfosnumberap($params)
    {
        $params = array('marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'telephone' => $params->telephone);
        $result = ''.json_encode($params);
        return $result;
    }

    function achatcodewoyofal($params)
    {
        $params = array('marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'montant' => $params->montant, 'compteur' => $params->compteur);
        // $result = $this->client->call('AchatCodeWoyofal', array('params' => $params));
        $result = ''.json_encode($params);
        return $result;
    }

    function achatcredittelephonique($params)
    {
        $params = array('marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'numero_a_recharger' => $params->numero_a_recharger, 'montant' => $params->montant);
        // $result = $this->client->call('AchatCreditTelephonique', array('params' => $params));
        $result = ''.json_encode($params);
        return $result;
    }

    function consultersoldeneo($params)
    {
        $params = array('marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand);
        $result = ''.json_encode($params);
        return $result;
    }

    function fraistamtamviaapay($params)
    {
        $params = array('marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'montant' => $params->montant, 'pays' => $params->pays);
        $result = ''.json_encode($params);
        return $result;
    }

    function histotransactmarchand($params)
    {
        $params = array('marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'date_debut' => $params->date_debut, 'date_fin' => $params->date_fin);
        $result = ''.json_encode($params);
        return $result;
    }




    // function getcardusername($params)
    // {
    //     $paramss = array('marchand'  => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'tel' => $params->tel );
    //     $result = $this->client->call('GetCardUserName', array('params' => $paramss));
    //     return $result;
    // }

    // function getfraispartenaire($params)
    // {
    //     $params = array('marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'identifiant' => $params->identifiant);
    //     $result = $this->client->call('GetFraisPartenaire', array('params' => $params));
    //     return $result;
    // }

    // function rechargementespece($params)
    // {
    //     $params = array('marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'tel_destinataire' => $params->tel_destinataire, 'montant' => $params->montant);
    //     $result = $this->client->call('RechargementEspece', array('params' => $params));
    //     return $result;
    // }

    // function retraitespece($params)
    // {
    //     $params = array('marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'code_validation' => $params->code_validation, 'tel_destinataire' => $params->tel_destinataire, 'montant' => $params->montant);
    //     $result = $this->client->call('RetraitEspece', array('params' => $params));

    //     return $result;
    // }

    // function debitercarte($params)
    // {
    //     $params = array('marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'code_validation' => $params->code_validation, 'tel_destinataire' => $params->tel_destinataire, 'montant' => $params->montant);
    //     $result = $this->client->call('DebiterCarte', array('params' => $params));
    //     return $result;
    // }

    // function debitcartedirect($params)
    // {
    //     $params = array('marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'tel_destinataire' => $params->tel_destinataire, 'montant' => $params->montant, 'clef_secret' => $params->clef_secret);
    //     $result = $this->client->call('DebitCarteDirect', array('params' => $params));
    //     return $result;
    // }

    // function codevalidation($params)
    // {
    //     $params = array('marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'tel_destinataire' => $params->tel_destinataire, 'montant' => $params->montant);
    //     $result = $this->client->call('CodeValidation', array('params' => $params));
    //     return $result;
    // }

    // function achatcodewoyofal($params)
    // {
    //     $params = array('marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'montant' => $params->montant, 'compteur' => $params->compteur);
    //     $result = $this->client->call('AchatCodeWoyofal', array('params' => $params));
    //     return $result;
    // }

    // function reglementsenelec($params)
    // {
    //     $params = array('marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'police' => $params->police, 'num_facture' => $params->num_facture);
    //     $result = $this->client->call('ReglementSenelec', array('params' => $params));
    //     return $result;
    // }

    // function detailfacturesenelec($params)
    // {
    //     $params = array('marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'police' => $params->police, 'num_facture' => $params->num_facture);
    //     $result = $this->client->call('DetailFactureSenelec', array('params' => $params));
    //     return $result;
    // }

    // function achatneo($params)
    // {
    //     $params = array('marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'produit' => $params->produit, 'montant' => $params->montant, 'type' => $params->type);
    //     $result = $this->client->call('AchatNeo', array('params' => $params));
    //     return $result;
    // }

    // function achatjula($params)
    // {
    //     $params = array('marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'mt_carte' => $params->mt_carte, 'nb_carte' => $params->nb_carte);
    //     $result = $this->client->call('AchatJula', array('params' => $params));
    //     return $result;
    // }

    // function getinfosnumber($params)
    // {
    //     $params = array('marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'telephone' => $params->telephone);
    //     $result = $this->client->call('GetInfosNumber', array('params' => $params));
    //     return $result;
    // }

    // function getinfosnumberap($params)
    // {
    //     $params = array('marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'telephone' => $params->telephone);
    //     $result = $this->client->call('GetInfosNumberAp', array('params' => $params));
    //     return $result;
    // }

    // function achatcredittelephonique($params)
    // {
    //     $params = array('marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'numero_a_recharger' => $params->numero_a_recharger, 'montant' => $params->montant);
    //     $result = $this->client->call('AchatCreditTelephonique', array('params' => $params));
    //     return $result;
    // }

    // function cashtocashsend($params)
    // {
    //     $params = array('marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'tel_exp' => $params->tel_exp, 'nom_exp' => $params->nom_exp, 'prenom_exp' => $params->prenom_exp, 'cni_exp' => $params->cni_exp, 'type_piece_exp' => $params->type_piece_exp, 'pays_exp' => $params->pays_exp, 'tel_rec' => $params->tel_rec, 'prenom_rec' => $params->prenom_rec, 'nom_rec' => $params->nom_rec, 'montant' => $params->montant);
    //     $result = $this->client->call('CashToCashSend', array('params' => $params));
    //     return $result;
    // }

    // function cashtocashreceive($params)
    // {
    //     $params = array('marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'tel_rec' => $params->tel_rec, 'cni_rec' => $params->cni_rec, 'type_piece_rec' => $params->type_piece_rec, 'pays_rec' => $params->pays_rec, 'code' => $params->code, 'montant' => $params->montant);
    //     $result = $this->client->call('CashToCashReceive', array('params' => $params));
    //     return $result;
    // }

    // function transfertverstamtam($params)
    // {
    //     $params = array('marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'tel' => $params->tel, 'montant' => $params->montant, 'frais' => $params->frais, 'nom' => $params->nom, 'prenom' => $params->prenom, 'telephone_benef' => $params->telephone_benef, 'code' => $params->code, 'pays' => $params->pays, 'rcv_address' => $params->rcv_address, 'transaction_reason' => $params->transaction_reason, 'incoming_source' => $params->incoming_source);
    //     $result = $this->client->call('TransfertVersTamtam', array('params' => $params));
    //     return $result;
    // }

    // function consultersoldeneo($params)
    // {
    //     $params = array('marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand);
    //     $result = $this->client->call('ConsulterSoldeNeo', array('params' => $params));
    //     return $result;
    // }

    // function debitercompteneo($params)
    // {
    //     $params = array('marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'montant' => $params->montant, 'type' => $params->type);
    //     $result = $this->client->call('DebiterCompteNeo', array('params' => $params));
    //     return $result;
    // }

    // function saveachatneo($params)
    // {
    //     $params = array('marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'montant' => $params->montant, 'code_pin' => $params->code_pin, 'numero_serie' => $params->numero_serie, 'date_expiration' => $params->date_expiration, 'type' => $params->type, 'telephone' => $params->telephone, 'num_transac' => $params->num_transac);
    //     $result = $this->client->call('SaveAchatNeo', array('params' => $params));
    //     return $result;
    // }

    // function transfertverstamtamviaapay($params)
    // {
    //     $params = array('marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'prenom_exp' => $params->prenom_exp, 'nom_exp' => $params->nom_exp, 'typecni_exp' => $params->typecni_exp, 'cni_exp' => $params->cni_exp, 'tel_exp' => $params->tel_exp, 'montant' => $params->montant, 'frais' => $params->frais, 'nom_dest' => $params->nom_dest, 'prenom_dest' => $params->prenom_dest, 'tel_dest' => $params->tel_dest, 'pays_dest' => $params->pays_dest, 'adresse_dest' => $params->adresse_dest);
    //     $result = $this->client->call('TransfertVersTamtamViaApay', array('params' => $params));
    //     return $result;
    // }

    // function fraistamtamviaapay($params)
    // {
    //     $params = array('marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'montant' => $params->montant, 'pays' => $params->pays);
    //     $result = $this->client->call('FraisTamtamViaApay', array('params' => $params));
    //     return $result;
    // }

    // function histotransactmarchand($params)
    // {
    //     $params = array('marchand' => $this->marchand, 'keyMarchand' => $this->keyMarchand, 'date_debut' => $params->date_debut, 'date_fin' => $params->date_fin);
    //     $result = $this->client->call('HistoTransactMarchand', $params);

    //     return $result;
    // }



}
