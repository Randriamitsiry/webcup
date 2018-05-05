<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Categorie;
use AppBundle\Entity\Zone;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Serializer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * Class ZoneController
 * @package AppBundle\Controller
 * @Route("/zone", name="zone_home")
 */
class ZoneController extends Controller
{
    /**
     * @param $cat
     * @return JsonResponse
     * @Route("/get/{cat}", name="categorie_zones")
     */
    public function getforAction($cat)
    {
        $em = $this->getDoctrine()->getManager();
        $categorie = $em->getRepository(Categorie::class)->find($cat);
        $items = $em->getRepository(Zone::class)->findBy(["categorie"=>$categorie]);
        $arrayCollection = array();

        foreach($items as $zone) {
            $arrayCollection[] = array(
                'id' => $zone->getId(),
                'designation'=>$zone->getDesignation(),
                'description'=>$zone->getDescription()
                // ... Same for each property you want
            );
        }
        return new JsonResponse($arrayCollection);
    }

    /**
     * @param $idZone
     * @Route("/{idZone}/produit")
     * @return JsonResponse
     */
    public function getProduit($idZone)
    {
        $em = $this->getDoctrine()->getManager();
        $zone = $em->getRepository(Zone::class)->find($idZone);
        $produits = $zone->getProduits();
        $array = array();
        foreach ($produits as $p) {
            //echo $p->getId() ."". $p->getDesignation();
            $array[] = array(
                "designation"=>$p->getDesignation(),
                "details"=>$p->getDetails(),
                "photo"=>$p->getPhoto()
            );
        }
        return new JsonResponse($array);
    }
    
}
