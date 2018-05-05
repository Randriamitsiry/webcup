<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Produit;
use AppBundle\Entity\ProduitToProduit;
use AppBundle\Entity\ProduitToService;
use AppBundle\Entity\Service;
use AppBundle\Entity\ServiceToProduit;
use AppBundle\Entity\ServiveToService;
use AppBundle\Entity\Zone;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class EchangeController
 * @package AppBundle\Controller
 * @Route("/echange")
 */
class EchangeController extends Controller
{
    /**
     * @Route("/get")
     */
    public function getAction()
    {
       //$em = $this->getDoctrine()->getEntityManager();
    }

    /**
     * @Route("/add")
     * @Method({"POST"})
     */
    public function addAction(Request $request)
    {

        $esource = $request->query->get("source");
        $edest = $request->query->get("dest");
        $type = $request->query->get("type");
        $em = $this->getDoctrine()->getEntityManager();
        //return new Response($type);
        switch ($type) {
            //service --- service
            case 1 :
                //service offert

                $service_to_service = new ServiveToService();
                $service_to_service->setDateEchange(new \DateTime());
                $source = $em->getRepository(Service::class)->find($esource);
                $dest = $em->getRepository(Service::class)->find($edest);
                if ($source && $dest) {
                    $service_to_service->setSource($source);
                    $service_to_service->setDestination($dest);
                    $em->persist($service_to_service);
                    $em->flush();
                    return new Response("OK");
                }
                else {
                    return new Response("Tsa hita");
                }
                break;
            case 2:
                return new Response($type);
                $service_to_produit = new ServiceToProduit();
                $service_to_produit->setDateEchange(new \DateTime());
                $source = $em->getRepository(Service::class)->find($esource);
                $dest = $em->getRepository(Produit::class)->find($edest);
                if ($source && $dest) {
                    $service_to_produit->setProduit($dest);
                    $service_to_produit->setService($source);
                    $em->persist($service_to_produit);
                    $em->flush();
                    return new Response("OK");
                }
                break;
            case 3:
                return new Response($type);
                $produit_to_service = new ProduitToService();
                $produit_to_service->setDateEchange(new \DateTime());
                $source = $em->getRepository(Produit::class)->find($esource);
                $dest = $em->getRepository(Service::class)->find($edest);
                if ($source && $dest) {
                    $produit_to_service->setProduit($source);
                    $produit_to_service->setService($dest);
                    $em->persist($produit_to_service);
                    $em->flush();
                    return new Response("OK");
                }
                break;
            case 4:
                return new Response($type);
                $produit_to_produit = new ProduitToProduit();
                $produit_to_produit->setDateEchange(new \DateTime());
                $source = $em->getRepository(Produit::class)->find($esource);
                $dest = $em->getRepository(Produit::class)->find($edest);
                if ($source && $dest) {
                    $produit_to_produit->setSource($source);
                    $produit_to_produit->setDestination($dest);
                    $em->persist($produit_to_produit);
                    $em->flush();
                    return new Response("OK");
                }
                break;
            default:
                return new Response("default");
                break;
        }
        return new Response("mahagaga");
    }

}
