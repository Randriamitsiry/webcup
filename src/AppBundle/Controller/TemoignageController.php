<?php
/**
 * Created by PhpStorm.
 * User: JESS
 * Date: 05/05/2018
 * Time: 21:36
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Temoignage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TemoignageController
 * @package AppBundle\Controller
 * @Route("/temoignage")
 */
class TemoignageController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $items = $em->getRepository(Temoignage::class)->findAll();
        //return new JsonResponse($items);
        $arrayCollection = array();

        foreach($items as $item) {
            $arrayCollection[] = array(
                'nom'=>$item->getNom(),
                'photo'=>$item->getPhoto(),
                'contenu'=>$item->getContenu()
                // ... Same for each property you want
            );
        }
        return new JsonResponse($arrayCollection);
    }
}