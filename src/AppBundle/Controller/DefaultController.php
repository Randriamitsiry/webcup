<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render("page/accueil.html.twig");
    }

    /**
     * @Route("/search/{query}", name="search")
     */
    public function searchAction($query)
    {
        return $this->render("page/search.html.twig");
    }
    /**
     * @Route("/zone/rouge", name="zone_rouge")
     */
    public function zonerougeAction()
    {
        return $this->render("page/zonerouge.html.twig");
    }
}
