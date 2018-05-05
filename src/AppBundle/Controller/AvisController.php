<?php
/**
 * Created by PhpStorm.
 * User: JESS
 * Date: 05/05/2018
 * Time: 23:40
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Avis;
use AppBundle\Entity\Zone;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AvisController
 * @package AppBundle\Controller
 * @Route("/avis")
 */
class AvisController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     * @Route("/add")
     */
    public function addAction(Request $request)
    {
        $nom = $request->query->get("nom");
        $message = $request->query->get("message");
        $idZone = $request->query->get("zone");

        $em = $this->getDoctrine()->getEntityManager();
        $zone = $em->getRepository(Zone::class)->find($idZone);
        if ($zone) {
            $avis = new Avis();
            $avis->setNom($nom);
            $avis->setMessage($message);
            $avis->setDateAvis(new \DateTime());

            $em->persist($avis);
            $em->flush();

            return new Response("ok");
        }
        return new Response("non-ok");
    }

    /**
     * @param $idZone
     * @return JsonResponse|Response
     */
    public function getAction($idZone)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $zone = $em->getRepository(Zone::class)->find($idZone);
        if ($zone) {
            $items = $em->getRepository(Avis::class)->findBy(["zone"=>$zone]);
            //return new JsonResponse($items);
            $arrayCollection = array();

            foreach($items as $item) {
                $arrayCollection[] = array(
                    'nom'=>$item->getNom(),
                    'message'=>$item->getMessage(),
                    'date'=>$item->getDateAvis()
                );
            }
            return new JsonResponse($arrayCollection);
        }

        return new Response(0);
    }
}