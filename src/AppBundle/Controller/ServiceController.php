<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Service;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @package AppBundle\Controller
 * @Route("/service", name="zone_home")
 */
class ServiceController extends Controller
{
    /**
     * @Route("/get/{idZone}")
     * @return JsonResponse
     */
    public function indexAction($idZone)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $items = $em->getRepository(Service::class)->findBy(["zone"=>$idZone]);
        //return new JsonResponse($items);
        $arrayCollection = array();

        foreach($items as $item) {
            $arrayCollection[] = array(
                'designation'=>$item->getDesignation(),
                'photo'=>$item->getPhoto(),
                'details'=>$item->getDetails(),
                // ... Same for each property you want
            );
        }
        return new JsonResponse($arrayCollection);
    }

}
