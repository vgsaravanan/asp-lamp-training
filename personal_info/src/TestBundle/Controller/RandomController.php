<?php

namespace TestBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class RandomController extends Controller
{
	
	public function showAction()
    {
        $number = mt_rand(0, 10);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }
}