<?php

namespace WSBundle\Services;

class HelloService
{
    private $mailer;

    public function __construct()
    {

    }

    public function hello($name)
    {
        return 'Hello, '.$name;
    }
}