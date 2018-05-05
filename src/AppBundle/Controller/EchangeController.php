<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Zone;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

class EchangeController extends Controller
{
    /**
     * @Route("/get")
     */
    public function getAction()
    {
       $em = $this->getDoctrine()->getEntityManager();
    }

    /**
     * @Route("/add")
     * @Method({"POST"})
     */
    public function addAction(Request $request)
    {

        $esource = $request->request->get("source");
        $edest = $request->request->get("dest");
        $type = $request->request->get("type");
        $em = $this->getDoctrine()->getEntityManager();

        switch ($type) {
            //service --- service
            case "1" :
                //service offert
                $service1 = $request->request->get("service1");
                $service2 = $request->request->get("service2");
                
                
                
        }

        $esource = $em->getRepository(Zone::class)->find($source);
        $edest = $em->getRepository(Zone::class)->find($dest);

        if ($esource && $edest) {

        }
    }

}
