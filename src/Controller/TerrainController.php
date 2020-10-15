<?php

namespace App\Controller;

use App\Entity\Activities;
use App\Entity\Jobs;
use App\Entity\TerrainsDeJeu;
use App\Helper\KiwiHelper;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TerrainController extends AbstractController
{

    /** @var SerializerInterface */
    private $serializer;

    /**
     * PosteController constructor.
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }


    /**
     * @Route("/terrain-de-jeu", name="terrain_de_jeu")
     */
    public function index()
    {

        $json = KiwiHelper::list(161, array(
            'order' => 'ordre%2Casc'
        ));

        /** @var TerrainsDeJeu $terrainsDeJeu */
        $terrainsDeJeu = $this->serializer->deserialize($json, TerrainsDeJeu::class, 'json');

        return $this->render('terrain/index.html.twig', [
            'active' => 'terrain_de_jeu',
            'terrainsDeJeu' => $terrainsDeJeu->getItems()
        ]);
    }
}
