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


  

}

