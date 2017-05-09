<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends Controller
{
    /**
     * @Route("/lucky/number", name="NumberOfLuck")
     */
    public function numberAction()
    {
        // replace this example code with whatever you need
        $number = mt_rand(0,100) ;    
        return new Response('<html><body>Here we go ! Your Lucky number is ... '.$number.'</body></html>') ;
    }
}
