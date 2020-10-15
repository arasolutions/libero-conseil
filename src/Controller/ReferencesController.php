<?php

namespace App\Controller;

use App\Entity\Activities;
use App\Entity\Members;
use App\Entity\References;
use App\Entity\Temoignages;
use App\Helper\KiwiHelper;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ReferencesController extends AbstractController
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
     * @Route("/references", name="references")
     */
    public function index()
    {

        $json = KiwiHelper::list(154, array(
            'order' => 'ordre%2Casc'
        ));

        /** @var References $references */
        $references = $this->serializer->deserialize($json, References::class, 'json');


        $json = KiwiHelper::list(162, array(
            'order' => 'ordre%2Casc'
        ));

        /** @var Temoignages $temoignages */
        $temoignages = $this->serializer->deserialize($json, Temoignages::class, 'json');

        return $this->render('references/index.html.twig', [
            'active' => 'references',
            'references' => $references->getItems(),
            'temoignages' => $temoignages->getItems()
        ]);
    }
}
