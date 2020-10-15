<?php

namespace App\Controller;

use App\Entity\Activities;
use App\Entity\Members;
use App\Helper\KiwiHelper;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RecruterController extends AbstractController
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
     * @Route("/recruter-avec-libero", name="recruter_avec_libero")
     */
    public function index()
    {
        $json = KiwiHelper::list(148, array(
            'order' => 'ordre%2Casc'
        ));

        /** @var Activities $activities */
        $activities = $this->serializer->deserialize($json, Activities::class, 'json');


        return $this->render('recruter/index.html.twig', [
            'active' => 'recruter_avec_libero',
            'activities' => $activities->getItems()
        ]);
    }
}
