<?php

namespace App\Controller;

use App\Entity\Activities;
use App\Entity\Members;
use App\Helper\KiwiHelper;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ActiviteController extends AbstractController
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
     * @Route("/activite", name="activite")
     */
    public function index()
    {
        $json = KiwiHelper::list(148, array(
            'order' => 'ordre%2Casc'
        ));

        /** @var Activities $activities */
        $activities = $this->serializer->deserialize($json, Activities::class, 'json');


        return $this->render('activite/index.html.twig', [
            'active' => 'activite',
            'activities' => $activities->getItems()
        ]);
    }
}
