<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class CategorieController
 * @package AppBundle\Controller
 * @Route("categorie")
 */
class CategorieController extends Controller
{
    /**
     * @Route("/index")
     * @return JsonResponse
     */
    public function indexAction()
    {
        $repo = $this->getDoctrine()->getRepository(Categorie::class);
        $data = $repo->createQueryBuilder('q')
            ->getQuery()
            ->getArrayResult();
        return new JsonResponse($data);
    }

}
