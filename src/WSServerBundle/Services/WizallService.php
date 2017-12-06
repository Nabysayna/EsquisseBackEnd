<?php

namespace WSServerBundle\Services;


class WizallService
{


  public function __construct()
  {
  }

  function intouchCashin($params)
  {
    return ''. json_encode( array('errorCode' => 1, 'response' => $params) );
  }
  
  function intouchCashout($params)
  {
    return ''. json_encode( array('errorCode' => 1, 'response' => $params) );
  }
  
  function intouchPayerFactureSde($params)
  {
    return ''. json_encode( array('errorCode' => 1, 'response' => $params) );
  }
  
  function intouchRecupereFactureSde($params)
  {
    return ''. json_encode( array('errorCode' => 1, 'response' => $params) );
  }
  
  function intouchPayerFactureSenelec($params)
  {
    return ''. json_encode( array('errorCode' => 1, 'response' => $params) );
  }
  
  function intouchRecupereFactureSenelec($params)
  {
    return ''. json_encode( array('errorCode' => 1, 'response' => $params) );
  }


  

}

