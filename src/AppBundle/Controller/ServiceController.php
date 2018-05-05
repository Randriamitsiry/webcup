<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @package AppBundle\Controller
 * @Route("/service", name="zone_home")
 */
class ServiceController extends Controller
{
    /**
     * @Route("/get/{$idZone}")
     * @return Response
     */
    public function indexAction($idZone)
    {
       //$em = $this-
    }

}
