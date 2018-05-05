<?php
/**
 * Created by PhpStorm.
 * User: JESS
 * Date: 05/05/2018
 * Time: 21:28
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Demande;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DemandeController
 * @package AppBundle\Controller
 * @Route("/demande")
 */
class DemandeController extends Controller
{
    /**
     * @Route("/")
     */
    public function addAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $nom = $request->query->get("nom");
        $raison = $request->query->get("raison");
        if ($nom && $raison) {
            $demande = new Demande();
            $demande->setNom($nom);
            $demande->setRaison($raison);
            $demande->setStatut(0);
            $demande->setDateDemande(new \DateTime());

            $em->persist($demande);
            $em->flush();
            return new Response(1);
        } else {
            return new Response(0);
        }
    }
}