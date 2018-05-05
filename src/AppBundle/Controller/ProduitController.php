<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class ProduitController
 * @package AppBundle\Controller
 * @Route("/produit")
 */
class ProduitController extends Controller
{
    /**
     * @Route("/{idZone/produit")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Produit:index.html.twig', array(
            // ...
        ));
    }

}
