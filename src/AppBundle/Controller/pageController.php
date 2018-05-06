<?php
/**
 * Created by PhpStorm.
 * User: JESS
 * Date: 06/05/2018
 * Time: 00:55
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Categorie;
use AppBundle\Entity\Zone;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class pageController
 * @package AppBundle\Controller
 * @Route("/")
 */
class pageController extends Controller
{
    /**
     * @param $page
     * @return Response
     * @Route("/{page}", name="page_route")
     */
    public function pageAction($page)
    {
        $em = $this->getDoctrine()->getEntityManager();
        switch ($page) {
            case "chasseur":
                $categorie = $em->getRepository(Categorie::class)->find(1);
                $zone = $em->getRepository(Zone::class)->findBy(["categorie"=>$categorie]);
                return $this->render("page/".$page.".html.twig", array("categorie"=>$categorie, "zone"=>$zone, "page"=>"chasseur"));
                break;
            case "pecheur":
                $categorie = $em->getRepository(Categorie::class)->find(2);
                $zone = $em->getRepository(Zone::class)->findBy(["categorie"=>$categorie]);
                return $this->render("page/".$page.".html.twig", array("categorie"=>$categorie, "zone"=>$zone, "page"=>"Pecheur"));
                break;
            case "guerisseur":
                $categorie = $em->getRepository(Categorie::class)->find(3);
                $zone = $em->getRepository(Zone::class)->findBy(["categorie"=>$categorie]);
                return $this->render("page/".$page.".html.twig", array("categorie"=>$categorie, "zone"=>$zone , "page"=>"Guerisseur"));
                break;
            case "batisseur":
                $categorie = $em->getRepository(Categorie::class)->find(4);
                $zone = $em->getRepository(Zone::class)->findBy(["categorie"=>$categorie]);
                return $this->render("page/".$page.".html.twig", array("categorie"=>$categorie, "zone"=>$zone , "page"=>"batisseur"));
                break;
            case "agriculteur":
                $categorie = $em->getRepository(Categorie::class)->find(5);
                $zone = $em->getRepository(Zone::class)->findBy(["categorie"=>$categorie]);
                return $this->render("page/".$page.".html.twig", array("categorie"=>$categorie, "zone"=>$zone , "page"=>"agriculteur"));
                break;
            case "mineur":
                $categorie = $em->getRepository(Categorie::class)->find(6);
                $zone = $em->getRepository(Zone::class)->findBy(["categorie"=>$categorie]);
                return $this->render("page/".$page.".html.twig", array("categorie"=>$categorie, "zone"=>$zone , "page"=>"mineur"));
                break;
            case "zig":
                break;
            default:
                return $this->redirectToRoute("homepage");
        }
    }
}