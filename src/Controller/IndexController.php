<?php

namespace App\Controller;

use App\Entity\Jobs;
use App\Entity\Members;
use App\Entity\References;
use App\Helper\KiwiHelper;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /** @var SerializerInterface */
    private $serializer;

    /**
     * IndexController constructor.
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @Route("/", name="index")
     */
    public function index()
    {

        $json = KiwiHelper::list(147, array(
            'order' => 'ordre%2Casc'
        ));

        /** @var Members $members */
        $members = $this->serializer->deserialize($json, Members::class, 'json');

        return $this->render('index/index.html.twig', [
            'active' => 'index',
            'members' => $members->getItems()
        ]);
    }

    /**
     * @Route("/mentions-legales", name="mentions_legales")
     */
    public function mentionsLegales(){
        return $this->render('index/mentions_legales.html.twig', [
            'active' => 'index'
        ]);
    }
}
